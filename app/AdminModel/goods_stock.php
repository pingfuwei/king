<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class goods_stock extends Model
{
    protected $table="goods_stock";
    protected $primaryKey = "goods_stock_id";
    public $timestamps = false;
}
