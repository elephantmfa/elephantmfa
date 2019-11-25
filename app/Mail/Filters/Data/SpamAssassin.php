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
     * Run a filter against the mail.
     *
     * @param Mail $mail
     * @param callable $next
     * @return void
     */
    public function filter(Mail $email, $next)
    {
        $sa = new SpamAssassinClient($email);
        if (! $sa->scan()) {
            error("SpamAssassin error: $sa->error");
            return $next($email);
        }
        $results = $sa->getResults();

        $totalScore = collect($results['tests'])->map(function ($test) {
            return $test['score'];
        })->sum();
        $tests = collect($results['tests'])->map(function ($test) {
            return "{$test['name']}={$test['score']}";
        })->implode(',');

        $spamStatus = $totalScore > 5 ? 'Yes' : 'No';

        info("X-Spam-Status: $spamStatus score=$totalScore tests=$tests");
        info("X-SpamChecker-Version: SpamAssassin v{$results['version']}; ElephantMFA v" . Application::VERSION);

        $email->appendHeader('X-Spam-Status', "$spamStatus score=$totalScore tests=$tests");
        $email->appendHeader(
            'X-SpamChecker-Version',
            "SpamAssassin v{$results['version']}; ElephantMFA v" . Application::VERSION
        );

        if ($totalScore > 5) {
            throw new QuarantineException();
        }

        return $next($email);
    }
}
