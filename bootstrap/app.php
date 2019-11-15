<?php

$app = new Elephant\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

$app->singleton(
    Elephant\Contracts\Mail\Kernel::class,
    App\Mail\Kernel::class
);

return $app;
