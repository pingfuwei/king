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
        if(!$adminuser){
            // echo "123";exit;
            return redirect("/admin/login");
        }
        // echo "234";exit;
        return $next($request);
    }
}
