<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customer';
    public $timestamps = false;




    public function getFullName(){


    return	$this->fname." ".$this->mname.". ".$this->lastname." ";


    }


    public function address(){

            
    	 return  $this->hasOne('App\Address', 'loc_id', 'loc_id');

    }


    
    public function transaction(){

    	 return $this->hasMany('App\Transaction', 'cust_id', 'cust_id');

    }
   

}
