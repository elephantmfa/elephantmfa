<?php

namespace App\Mail\Filters\Data;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class LogSubject implements Filter
{
    public function filter(Mail $email, $next)
    {
        info("subject = " . $email->getHeader('subject')[0]);
        return $next($email);
    }
}
