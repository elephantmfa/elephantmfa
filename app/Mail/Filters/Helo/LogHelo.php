<?php

namespace App\Mail\Filters\Helo;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class LogHelo implements Filter
{
    public function filter(Mail $email, $next)
    {
        info($email->envelope->helo);
        return $next($email);
    }
}
