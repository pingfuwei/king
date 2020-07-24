<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        $adminuser = $request->session()->get("user");
        $aa='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//        echo $aa;
        if(!$adminuser){
            // echo "123";exit;
            return redirect("/admin/login");
        }else{
//            $data=
        }
        // echo "234";exit;
        return $next($request);
    }
}
