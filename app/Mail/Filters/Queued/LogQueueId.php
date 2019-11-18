<?php

namespace App\Mail\Filters\Queued;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class LogQueueId implements Filter
{
    public function filter(Mail $email, $next)
    {
        info($email->getQueueId());
        return $next($email);
    }
}
