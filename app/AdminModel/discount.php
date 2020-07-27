<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
        protected $table="discount";
        protected $primaryKey = "discount_id";
        public $timestamps = false;
        protected $guarded = [];
}
