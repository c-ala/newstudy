<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginCheck
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
        //如果没有登陆，跳转到游客页面
        if(!Auth::guard('admin')->check()){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
