<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    public $timestamps=false;
    public $table="role";
    protected $primaryKey="role_id";
}
