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
        $url=$request->url();
        $user=$request->cookie("user");
//        echo $user;die;
        $user_pwd=$request->cookie("user_pwd");
        \session(["user_name"=>$user,"user_pwd"=>$user_pwd]);
        if($url==="http://www.king.com/index/persion/personal"){
            if (!$user) {
                echo "<script>alert('请登录');location.href='/index/login/login'</script>";die;
            } else {
                return $next($request);
            }
        }
        return $next($request);
    }
}
