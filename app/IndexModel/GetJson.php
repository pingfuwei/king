<?php

namespace App\indexModel;

use Illuminate\Database\Eloquent\Model;

class GetJson
{
   static function getJson($code,$font,$res=[]){
      return json_encode(["code"=>$code,"font"=>$font,"res"=>$res],JSON_UNESCAPED_UNICODE);
    }
}
