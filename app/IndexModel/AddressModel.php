<?php

namespace App\IndexModel;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    protected $table="address";
    protected $primaryKey = "address_id";
    public $timestamps = false;
}
