<?php

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Storage;

class InstallMiddleware
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
        if (!Storage::disk('local')->exists('database_created')){
            return redirect('/install');
        }

        if (Storage::disk('local')->exists('database_created')){
            if (setting('profile_complete') !== 'COMPLETED'){
                return redirect('install');
            }
        }
        return $next($request);
    }
}
