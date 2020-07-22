<?php

namespace App\indexModel;

use Illuminate\Database\Eloquent\Model;

class User_code extends Model
{
    protected $table="user_code";
    protected $primaryKey = "id";
    public $timestamps = false;
}
