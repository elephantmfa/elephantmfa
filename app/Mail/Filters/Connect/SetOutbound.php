<?php

namespace App\Mail\Filters\Connect;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class SetOutbound implements Filter
{
    public function filter(Mail $email, $next)
    {
        $email->outbound = $email->getConnection()->received_port == config('app.ports.outbound');
        info("is outbound = " . ($email->outbound ? 'true' : 'false'));
        return $next($email);
    }
}
