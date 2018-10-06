<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class SuperAdminMiddleware
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
      if ($request->user()->role!='Super Admin') {
        return new Response(view('unauthorized')->with('role', 'Super Admin'));

      }

        return $next($request);
    }
}
