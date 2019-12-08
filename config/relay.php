<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Greeting Banner
    |--------------------------------------------------------------------------
    |
    | The banner to respond with when a connection is made.
    */
    'greeting_banner' => env('GREETING_BANNER', 'Greetings from ElephantMFA'),

    /*
    |--------------------------------------------------------------------------
    | Ports
    |--------------------------------------------------------------------------
    |
    | The ports to be listening on. This is in 127.0.0.1:25 format, however if
    | the IP isn't provided, it will default to 127.0.0.1. These can be
    | names, so that distinctions can be made with filters.
    */
    'ports' => [
        'inbound' => env('INBOUND_PORT', 10023),
        'outbound' => env('OUTBOUND_PORT', 10024),
    ],

    /*
    |--------------------------------------------------------------------------
    | Timeout
    |--------------------------------------------------------------------------
    |
    | The timeout until the connection is closed automatically. This prevents
    | dangling connections which use up system resources. This is measured in
    | seconds.
    */
    'timeout' => (int) env('RELAY_TIMEOUT', 60 * 5),

    /*
    |--------------------------------------------------------------------------
    | Unfold MIME Headers
    |--------------------------------------------------------------------------
    |
    | If true, MIME headers will be unfolded when stored. Folding is the
    | process of taking a really long header and putting it on multiple lines.
    | The lines are usually then prefixed with spaces or tabs. Unfolding the
    | headers will remove those spaces/tabs and bring the header all on line.
    */
    'unfold_headers' => true,

    /*
    |--------------------------------------------------------------------------
    | Queue Processor
    |--------------------------------------------------------------------------
    |
    | This determines how queued mail should be handled. Mail can either be
    | handled with the event loop, or with queues. If handled with queues,
    | management of processing queued mail can be handled separately from
    | handling mail coming in. Alternatively, queuing of files can be disabled
    | altogether by setting this to none. This means the message will skip the
    | queued step of mail processing, and will continue onto it's final
    | destination.
    |
    | Options: none, process, queue
    */
    'queue_processor' => 'process',



    /*
    |--------------------------------------------------------------------------
    | Default Relay
    |--------------------------------------------------------------------------
    |
    | If no final destination is set for a mail, this will be used as the final
    | destination. It must be of IPv4:Port format or [IPv6]:Port format.
    |
    */
    'default_relay' => '127.0.0.1:10031',
];
