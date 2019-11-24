<?php

namespace App\Mail\Filters\RcptTo;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class LogRecipient implements Filter
{
    public function filter(Mail $email, $next)
    {
        info("recipient = " . $email->getRecipients()[0]);
        return $next($email);
    }
}
