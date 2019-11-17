<?php

namespace App\Mail;

use Elephant\Foundation\Mail\Kernel as MailKernel;

class Kernel extends MailKernel
{
    protected $filters = [

        /**
         * A list of filters to apply upon connection.
         *
         * @var array
         */
        'connect' => [
            \App\Mail\Filters\Connect\SetOutbound::class,
        ],

        /**
         * A list of filters to apply when HELO/EHLO command is called.
         *
         * @var array
         */
        'helo' => [
            \App\Mail\Filters\Helo\LogHelo::class,
        ],

        /**
         * A list of filters to call when the MAIL FROM command is called.
         *
         * @var array
         */
        'mail_from' => [
            \App\Mail\Filters\MailFrom\LogEnvelopeFrom::class,
        ],

        /**
         * A list of filters to call upon each call of RCPT TO command.
         *
         * @var array
         */
        'rcpt_to' => [
            \App\Mail\Filters\RcptTo\LogRecipient::class,
        ],

        /**
         * A list of filters to apply at the end of the DATA command.
         *
         * @var array
         */
        'data' => [
            \App\Mail\Filters\Data\LogSubject::class,
        ],

        /**
         * A list of filters to apply to queued mail.
         *
         * @var array
         */
        'queued' => [
            \App\Mail\Filters\Queued\LogQueueId::class,
        ],
    ];
}
