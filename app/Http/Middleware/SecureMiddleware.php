<?php

namespace CrazyQuiz\Http\Middleware;

use Closure;

class SecureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app()->environment('production')) {
            \URL::forceSchema('https');
            if($request->header('x-forwarded-proto') <> 'https' && !$request->is('rest/*')) {
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }
}
