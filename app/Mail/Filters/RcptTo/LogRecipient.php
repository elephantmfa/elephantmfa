<?php

namespace App\Mail\Filters\RcptTo;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class LogRecipient implements Filter
{
    public function filter(Mail $email, $next)
    {
        info($email->envelope->recipients[0]);
        return $next($email);
    }
}
