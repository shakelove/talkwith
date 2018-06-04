<?php

namespace App\Http\Middleware;

use Closure;

class CheckHttps
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
        return $next($request);
        
        if (!$request->isSecure()) {
            return redirect()->secure($request->path())->withInput();
        }
    }
}
