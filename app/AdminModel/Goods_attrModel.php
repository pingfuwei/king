<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Goods_attrModel extends Model
{
    protected $table="goods_attr";
    protected $primaryKey = "attr_id";
    public $timestamps = false;
}
