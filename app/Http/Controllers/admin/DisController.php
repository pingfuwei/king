<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Goods;

class DisController extends Controller
{
    public  function create(){
        $data = Goods::all();
        var_dump($data);
    }
    public function createDO(){

    }
    public  function index(){

    }
    public function upd(){

    }
    public function updDo(){

    }
}
