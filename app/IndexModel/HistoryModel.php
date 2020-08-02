<?php

namespace App\IndexModel;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    protected $table="history";
    protected $primaryKey = "his_id";
    public $timestamps = false;
}
