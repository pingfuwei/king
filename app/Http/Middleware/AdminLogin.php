<?php

namespace App\Http\Middleware;

use App\AdminModel\Admin_Role;
use App\AdminModel\PowerModel;
use App\AdminModel\Role_PowerModel;
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
        if (!$adminuser) {
            return redirect("/admin/login");
        } else {
//            $user_url=$request->path();
            $user_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $str=strpos ($user_url,"?");
            if($str){
                $len=strlen($user_url);
                $user_url=substr($user_url,0,$str);
            }

//            echo $user_url;die;
            if($user_url == "http://www.king.com/admin/index" || $user_url == "http://www.king.com/admin/indexs"){
                return $next($request);
            }
            $admin_role_model = new Admin_Role();
            $role_power_model = new Role_PowerModel();
            $where = [
                ['status', '=', 1],
                ['admin_id', '=', $adminuser['admin_id']]
            ];
            $role_info = $admin_role_model::where($where)->get();
            $aa="";
            foreach ($role_info as $k => $v) {
                $role_id=$v['role_id'];
//                echo $role_id;
                $wherea = [
                    ['status', '=', 1],
                    ['role_id', '=', $v['role_id']]
                ];
                $role_power_info = $role_power_model::where($wherea)->get();
//                echo $role_power_info;
                foreach ($role_power_info as $kk => $vv) {
//                    echo $vv['power_id'];echo "</br>";
                    $whereb = [
                        ['power_status', '=', 1],
                        ['power_id', '=', $vv['power_id']]
                    ];
                    $power_model = new PowerModel();
                    $power_info = $power_model::where($whereb)->get();
                    foreach ($power_info as $kkk => $vvv) {
//                          echo $vvv['power_url'];echo "<br>";
//                           echo $user_url;
                            if ($user_url == $vvv['power_url']) {
                                $aa="true";
                            }
                    }
                }
            }
            if($aa==="true"){
                return $next($request);
            }else{
                echo "<script>alert('你没有权限');location.href='/admin/index'</script>";
            }
        }
    }
}
