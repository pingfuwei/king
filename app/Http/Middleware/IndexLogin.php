<?php

namespace App\Http\Middleware;

use Closure;

class IndexLogin
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
        $user=$request->cookie("user");
        $user_pwd=$request->cookie("user_pwd");

        if (!$user) {
            return redirect("index/login/login");
        } else {
            return $next($request);
        }
        \session(["user_name"=>$user,"user_pwd"=>$user_pwd]);




    }
}
