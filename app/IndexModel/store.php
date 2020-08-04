<?php

namespace App\IndexModel;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    public $table="store";
    protected $primaryKey="store_id";
    public $timestamps=false;
}
