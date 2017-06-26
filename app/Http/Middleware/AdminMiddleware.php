<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        //判断是否登录
        if($request->session()->has('aid')){
            return $next($request);
        } else {
            //未登录,跳转到后台登录界面
            return redirect('/admin/login')->with('error', '请先登录！！！');
        }
    }
}
