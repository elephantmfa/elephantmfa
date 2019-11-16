<?php

namespace App\Mail\Filters\Queued;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class LogQueueId implements Filter
{
    public function filter(Mail $email, $next)
    {
        info($email->queue_id);
        return $next($email);
    }
}
