<?php

namespace App\Mail\Filters\Data;

use Elephant\Contracts\Filter;
use Elephant\Mail\Mail;

class LogSubject implements Filter
{
    public function filter(Mail $email, $next)
    {
        info($email->headers['subject'][0]);
        return $next($email);
    }
}
