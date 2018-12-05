<?php

namespace App\Http\Middleware;

use Closure;

class checkIfEmailVerified
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
        //路由中间件
        if(!$request->user()->email_verified){
            //如果是ajax请求，返回json信息
            if($request->expectsJson()){
                return response()->json(['msg' => '请先验证邮箱']);
            }
            //重定向到邮箱提示页
            return redirect(route('email_verify_notice'));
        }

        return $next($request);
    }
}
