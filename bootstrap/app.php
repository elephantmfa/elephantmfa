<?php

$app = new Elephant\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

$app->singleton(
    Elephant\Contracts\EventLoop\Kernel::class,
    Elephant\Foundation\EventLoop\Kernel::class
);

$app->singleton(
    Elephant\Contracts\Mail\Kernel::class,
    App\Mail\Kernel::class
);

$app->singleton(
    Elephant\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

return $app;
