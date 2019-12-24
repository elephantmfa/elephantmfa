<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'ElephantMFA'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages
    | will be shown on every error that occurs within your
    | application. If disabled, a simple generic error is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Subprocess management
    |--------------------------------------------------------------------------
    |
    | This controls the number of subprocesses to be running. Min is the minimum
    | number of processes to be keeping around at all times, while max is the
    | maximum number of processes to open. A process will die after handling
    | `max_requests`. Alternatively, if a process hasn't gotten a message in
    | `timeoutz amount of times (in seconds), it will automatically close.
    |
    */

    'processes' => [
        'min' => env('MIN_PROCESSES', 5),
        'max' => env('MAX_PROCESSES', 20),
        'max_requests' => env('MAX_REQUESTS', 1000),
        'timeout' => 60 * 5, // 5 minutes
    ],

    /*
    |--------------------------------------------------------------------------
    | DNS
    |--------------------------------------------------------------------------
    |
    | Specify the DNS settings to use for DNS lookups. The timeout is how long
    | will be given before giving up on a lookup. This is in seconds.
    | Server is whats to be used to resolve dns requests. This has to
    | be a string. For best results, this should be a local caching server.
    |
    */

    'dns' => [
        'timeout' => 10, // seconds
        'server' => '8.8.8.8',
    ],

    /*
    |--------------------------------------------------------------------------
    | Command Path
    |--------------------------------------------------------------------------
    |
    */

    'command_path' => base_path('elephant'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,

        /*
         * ElephantMFA Framework Service Providers...
         */
        Elephant\EventLoop\EventLoopServiceProvider::class,
        Elephant\Mail\MailServiceProvider::class,
        Elephant\Foundation\Providers\ConsoleSupportServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\EventServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,

    ],
];
