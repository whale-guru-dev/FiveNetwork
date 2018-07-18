<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

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
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            // Grab the HTTP status code from the Exception
            $status = $exception->getStatusCode();

            switch ($status) {
                case 400:
                    return response()->view('errors.400');
                    break;
                case 403:
                    return response()->view('errors.403');
                    break;
                case 404:
                    return response()->view('errors.404');
                    break;
                case 500:
                    return response()->view('errors.500');
                    break;
                case 503:
                    return response()->view('errors.503');
                    break;
                default:
                    return response()->view('errors.default');
                    break;
            }
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException  $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard = array_get($exception->guards(), 0);
        $login = 'login';
        
        if ($guard == 'admin') $login = 'admin.login';
        
        return redirect()->guest(route($login));
    }
}
