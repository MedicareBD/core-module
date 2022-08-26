<?php

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstalledMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Storage::disk('local')->exists('database_create')){
            if (setting('profile_complete') === 'COMPLETED'){
                return redirect('login');
            }
        }
        return $next($request);
    }
}
