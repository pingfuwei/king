<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Admin_Role extends Model
{
    public $timestamps=false;
    public $table="admin_role";
    protected $primaryKey="id";
}
