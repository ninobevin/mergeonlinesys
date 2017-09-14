<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Sms_config_value extends Model
{
    //
        protected $table = 'sms_config_value';
    private static $tablename = 'sms_config_value';
    
    public $timestamps = false;
}
