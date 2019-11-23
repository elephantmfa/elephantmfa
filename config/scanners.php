<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SpamAssassin
    |--------------------------------------------------------------------------
    |
    | Configuration for utilizing SpamAssassin as a scanner. SpamAssassin must
    | by running as SpamD, and Elephant will communicate with it.
    |
    | https://spamassassin.apache.org/full/3.1.x/doc/spamd.html
    |
    */
    'spamassassin' => [
        // Host or path to socket where spamd is running.
        //   Use ipv4:// for an IPv4 address. Must be IP:port format.
        //   Use ipv6:// for an IPv6 address. Must be [IP]:port format.
        //   Use unix:// for a Unix socket.
        'socket' => env('SPAMASSASSIN_PORT', 'ipv4://127.0.0.1:783'),
        // The total bytes sent to SpamAssassin
        'max_size' => 128 * 1000, // 128 Kb
        // The timeout until connection to SpamAssassin is given up.
        'connect_timeout' => 5, // seconds
        // The timeout waiting for results until given up.
        'results_timeout' => 300, // seconds
        'spamd' => [
            // If `manage` is enabled, SpamD will be started with ElephantMFA,
            //    and will be killed when ElephantMFA is killed. Additionally,
            //    log output from SpamD will be handled by ElephantMFA.
            'manage' => false,
            'parameters' => [
                '-u ubuntu'
            ],
        ],
    ],
];
