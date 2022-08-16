<?php
namespace Modules\Core\Http\Middleware;

use Closure;
use Modules\Core\Events\MenuWasCreated;
use Illuminate\Http\Request;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return $next($request);
        }

        \Menu::create('sidebar', function ($menu) {
            $menu->style('stisla-sidebar');
            $menu->enableOrdering();
            event(new MenuWasCreated($menu));
        });

        return $next($request);
    }
}
