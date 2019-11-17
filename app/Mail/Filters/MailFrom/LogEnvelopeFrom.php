<?php

namespace App\Mail\Filters\MailFrom;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class LogEnvelopeFrom implements Filter
{
    public function filter(Mail $email, $next)
    {
        info($email->envelope->sender);
        return $next($email);
    }
}
