<?php

namespace App\Http\Middleware;

use Closure;

class BackEndAccessMiddleware
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
        // $allowedRoles=collect(['Super Admin', 'Admin', 'Trainer']);
        // if ($request->user()->role!='Super Admin') {
        //     return new Response(view('unauthorized')->with('role', 'Super Admin'));
    
        //   }
        return $next($request);
    }
}
