<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $userInfo=session('userInfo');
        if(empty($userInfo)){
            return redirect("/")->with("msg","请先登录");
        }
        return $next($request);
    }
}
