<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Carbon\Carbon;

use Auth;

use DB;
class Transaction extends Model
{
    //





    protected $table = 'transaction_sm';
    private static $tablename = 'transaction_sm';
    protected $primaryKey = 'tran_id';
    public $timestamps = false;

    protected $fillable = ['ref_no', 'amount', 'service_charge'];


     public function customer(){

    	 return $this->hasOne('App\Customer', 'loc_id', 'loc_id');

    }
    public function getStatus(){

    	 return $this->hasOne('App\Status', 'sm_status_no', 'status');

    }


    public function claim(){

    	$this->status = "2";
    	$this->date_claimed = Carbon::now();
    	$this->user_id = Auth::user()->id;

    

    }


    public static function getColumnNames(){

        return  DB::select('show columns from '.self::$tablename);
    }


}


