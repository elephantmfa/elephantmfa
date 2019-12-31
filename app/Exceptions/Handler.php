<?php

namespace App\Exceptions;

use Exception;
use React\Stream\WritableStreamInterface;
use Elephant\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception to the console.
     *
     * @param \React\Stream\WritableStreamInterface $connection
     * @param \Exception                            $exception
     * @return void
     */
    public function renderForMail(WritableStreamInterface $connection, Exception $exception): void
    {
        parent::renderForMail($connection, $exception);
    }
}
