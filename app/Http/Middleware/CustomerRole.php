<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class customerRole
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
        if(isset(Auth::user()->role_id) && Auth::user()->role_id == 2) {
            return $next($request);
        }
        return redirect('/admin/pages');
    }
}
