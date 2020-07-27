<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignController extends Controller
{
    public function sign(){
        echo 11;
    }
    public function personal(){
        return view('index.persion.pers');
    }
    public function pers(){
        return view('index.persion.persion');
    }
}
