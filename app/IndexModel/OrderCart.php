<?php

namespace App\IndexModel;

use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model
{
    protected $table="orderCart";
    protected $primaryKey = "id";
    public $timestamps = false;
}
