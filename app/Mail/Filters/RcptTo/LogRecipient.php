<?php

namespace App\Mail\Filters\RcptTo;

use Elephant\Contracts\Filter;
use Elephant\Mail\Mail;

class LogRecipient implements Filter
{
    public function filter(Mail $email, $next)
    {
        info($email->envelope->recipient);
        return $next($email);
    }
}
