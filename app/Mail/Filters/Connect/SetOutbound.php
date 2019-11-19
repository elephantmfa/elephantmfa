<?php

namespace App\Mail\Filters\Connect;

use Elephant\Contracts\Filter;
use Elephant\Contracts\Mail\Mail;

class SetOutbound implements Filter
{
    public function filter(Mail $email, $next)
    {
        $email->supplementalData['outbound'] = $email->getConnection()->receivedPort == config('relay.ports.outbound');
        info("is outbound = " . ($email->supplementalData['outbound'] ? 'true' : 'false'));
        return $next($email);
    }
}
