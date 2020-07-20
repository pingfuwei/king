<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    //
    protected $table='news';
    protected $primaryKey = 'n_id';
    public $timestamps = false;

}
