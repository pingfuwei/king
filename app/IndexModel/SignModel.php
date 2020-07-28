<?php

namespace App\IndexModel;

use Illuminate\Database\Eloquent\Model;

class SignModel extends Model
{
    protected $table="sign";
    protected $primaryKey = "id";
    public $timestamps = false;
}
