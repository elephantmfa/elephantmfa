<?php

namespace App\Mail\Filters\Connect;

use Elephant\Contracts\Filter;
use Elephant\Mail\Mail;

class LogConnect implements Filter
{
    public function filter(Mail $email, $next)
    {
        $email->outbound = $email->connection->received_port == config('app.ports.outbound');
        return $next($email);
    }
}
