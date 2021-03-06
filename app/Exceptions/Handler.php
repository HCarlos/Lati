<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
    public function render($request, Exception $e)
    {
//        if ($e instanceof ModelNotFoundException) {
////            return parent::render($request, new NotFoundHttpException);
//            return view('errors.401');
//        }
//        if ( ! config('app.debug') && ! $this->isHttpException($e)) {
//            return response(null, 500)->view('errors.500');
//        }
//        return parent::render($request, $e);

        if( ! config('app.debug') )
        {
            // MethodNotAllowedHttpException
            if( $e instanceof MethodNotAllowedHttpException )
                $e = new HttpException( 405, $e->getMessage() );

            // TokenMismatchException
            if( $e instanceof TokenMismatchException )
                $e = new HttpException( 400, $e->getMessage() );

            if ($e instanceof ModelNotFoundException)
                $e = new HttpException( 401, $e->getMessage() );

            if (  ! $this->isHttpException($e))
                $e = new HttpException( 500, $e->getMessage() );
        }
        return parent::render($request, $e);
    }




}
