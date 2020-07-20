<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table='brand';
	protected $primaryKey = 'brand_id';
    public $timestamps = false;
}
