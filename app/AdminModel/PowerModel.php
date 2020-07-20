<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class PowerModel extends Model
{
    public $timestamps=false;
    public $table="power";
    protected $primaryKey="power_id";
}
