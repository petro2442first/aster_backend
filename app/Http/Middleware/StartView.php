<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StartView
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
        if($request->session()->get('started') == null or $request->session()->get('started') == '') {
            $request->session([
                'started' => false,
                'count' => 1
            ]);
        }
        $count = $request->session()->get('count');
        if((int)$count > 1) {
            $request->session(['started' => true]);
        }
        $request->session()->increment('count');
        return $next($request);
    }
}
