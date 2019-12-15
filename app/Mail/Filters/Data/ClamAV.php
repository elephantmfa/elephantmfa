<?php

namespace App\Mail\Filters\Data;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;
use Elephant\Filtering\Exception\QuarantineException;
use Elephant\Filtering\Scanners\ClamAV as ClamAVClient;

class ClamAV implements Filter
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
        $clamAV = new ClamAVClient($email);
        // Scan, and if failed, report the error.
        if (! $clamAV->scan()) {
            error("ClamAV error: $clamAV->error");

            return $next($email);
        }

        // Get results.
        $results = $clamAV->getResults();

        $infected = $results['infected'];

        $names = '';
        if ($infected) {
            $names = implode(', ', array_map(function (string $k, string $v): string {
                return "[$k:$v]";
            }, array_keys($results['viruses']), $results['viruses']));
        }

        // Generate headers
        $xVirusScannerHeader = ($infected ? 'INFECTED' : 'CLEAN') . " $names";

        if ($results['error']) {
            $names = implode(', ', array_map(function (string $k, string $v): string {
                return "[$k:$v]";
            }, array_keys($results['errors']), $results['errors']));

            $xVirusScannerHeader = "ERROR $names";
        }

        // Log the headers being added.
        info("X-Virus-Scanner: $xVirusScannerHeader");

        // Append the headers.
        $email->appendHeader('X-Virus-Scanner', $xVirusScannerHeader);

        // Quarantine if infected.
        if ($infected) {
            throw new QuarantineException();
        }

        return $next($email);
    }
}
