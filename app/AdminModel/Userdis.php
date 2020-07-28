<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Userdis extends Model
{
    protected $table="user_discount";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
