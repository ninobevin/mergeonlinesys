<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Sms_config_static extends Model
{
    //
        protected $table = 'sms_config_static';
    private static $tablename = 'sms_config_static';
    
    public $timestamps = false;
}
