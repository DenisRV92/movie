<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Contracts\Routing\Middleware as Middleware;

class AddHeaders
{
    public function handle($request, Closure $next)
    {

        $request->headers->set('User-Id',$request->id);

        return $next($request);
    }
}
