<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
//    protected $except = [
//        //
//    ];

    protected $except = [
        'logout'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

//    public function handle($request, Closure $next)
//    {
//        if ($this->isReading($request) || $this->tokensMatch($request)) {
//            return $this->addCookieToResponse($request, $next($request));
//        }
//        return redirect("/")->with("alert", "Ha ocurrido un error");
//        #throw new TokenMismatchException;
//    }


}
