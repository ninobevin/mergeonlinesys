<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //


    protected $table='location';
    protected $primaryKey = 'loc_id';




    public function getAddress(){


    	 if($this->barangay." ".$this->city." ".$this->province){
    		return $this->barangay." ".$this->city." ".$this->province;

    	}else{

    		return "";
    	}

    }



}
