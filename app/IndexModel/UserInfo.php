<?php

namespace App\IndexModel;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table="user_info";
    protected $primaryKey = "id";
    public $timestamps = false;
}
