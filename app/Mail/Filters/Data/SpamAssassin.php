<?php

namespace App\Mail\Filters\Data;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;
use Elephant\Filtering\Exception\QuarantineException;
use Elephant\Filtering\SpamAssassin as SpamAssassinClient;
use Elephant\Foundation\Application;

class SpamAssassin implements Filter
{
    /**
     * Check the mail using SpamAssassin.
     *
     * @param Mail $mail
     * @param callable $next
     * @return void
     */
    public function filter(Mail $email, $next)
    {
        // Create a new SpamAssassin client.
        $sa = new SpamAssassinClient($email);
        // Scan, and if failed, report the error.
        if (! $sa->scan()) {
            error("SpamAssassin error: $sa->error");

            return $next($email);
        }

        // Get results.
        $results = $sa->getResults();

        // Calculate the total score.
        $totalScore = $results['total_score'];

        // Format for the headers.
        $tests = collect($results['tests'])->map(function ($test) {
            return "{$test['name']}={$test['score']}";
        })->implode(',');

        $spamStatus = $totalScore > 5 ? 'Yes' : 'No';

        // Generate headers
        $xSpamStatusHeader = "$spamStatus score=$totalScore tests=$tests";
        $xSpamCheckerVersion = "SpamAssassin v{$results['version']}; ElephantMFA v" . Application::VERSION;

        // Log the headers being added.
        info("X-Spam-Status: $xSpamStatusHeader");
        info("X-SpamChecker-Version: $xSpamCheckerVersion");

        // Append the headers.
        $email->appendHeader('X-Spam-Status', $xSpamStatusHeader);
        $email->appendHeader('X-SpamChecker-Version', $xSpamCheckerVersion);

        // Quarantine if considered Spam.
        if ($totalScore > 5) {
            throw new QuarantineException();
        }

        return $next($email);
    }
}
