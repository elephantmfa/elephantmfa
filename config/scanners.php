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
        // Host or path to socket where SpamD is running.
        //   Use ipv4:// for an IPv4 address. Must be IP:port format.
        //   Use ipv6:// for an IPv6 address. Must be [IP]:port format.
        //   Use unix:// for a Unix socket.
        'socket' => env('SPAMASSASSIN_DSN', 'ipv4://127.0.0.1:783'),
        // The total bytes sent to SpamAssassin. Set to 0 to send full email.
        //   Sending full email will cause SpamAssassin scanning to take much
        //   longer.
        'max_size' => 128 * 1000, // 128 Kb
        // The timeout until reading from SpamAssassin is given up.
        'timeout' => 60, // seconds
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

    /*
    |--------------------------------------------------------------------------
    | ClamAV
    |--------------------------------------------------------------------------
    |
    | Configuration for utilizing ClamAV as a scanner. ClamAV must
    | by running as clamd, and Elephant will communicate with it.
    |
    */
    'clamav' => [
        // Host or path to socket where ClamAV is running.
        //   Use ipv4:// for an IPv4 address. Must be IP:port format.
        //   Use ipv6:// for an IPv6 address. Must be [IP]:port format.
        //   Use unix:// for a Unix socket.
        'socket' => env('CLAMAV_DSN', 'ipv4://127.0.0.1:3310'),
        // Only send files that are smaller than `max_size` in bytes.
        //   Note: Unless an Attachment's size is specified, the size will
        //   be estimated. Thus, larger files may be sent, so smaller is faster.
        'max_size' => 64 * 1000, // 64 Kb
        // Whether or not to send the full email to ClamAV.
        //   This is useful for scanning for phishing signatures from ClamAV.
        'send_email' => [
            'enabled' => true,
            // The total bytes sent to ClamAV. Set to 0 to send full email.
            //   Sending full email will cause ClamAV scanning to take much
            //   longer.
            'max_size' => 128 * 1000, // 128 Kb
        ]
    ],
];
