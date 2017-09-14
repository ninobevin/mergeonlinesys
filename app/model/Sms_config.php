<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Sms_config extends Model
{
    //
    protected $table = 'sms_config';
    private static $tablename = 'sms_config';
    
    public $timestamps = false;



    public function sms_config_static(){

    	return $this->hasMany('App\model\Sms_config_static');

    }

     public function sms_config_value(){

    	return $this->hasMany('App\model\Sms_config_value');

    }
}
