<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Sms_config;
use App\model\Sms_config_value;
use App\model\Sms_config_static;
use App\Transaction;
use App\Sms;
class FilterController extends Controller
{
    //



    public function smsfilter(Request $request){




    	$config = new Sms_config;


    	$config->name = $request->config_name;
    	$config->status = $request->status;
    	$config->direction = $request->direction;
        $config->save();


    	foreach ((array)$request->indexes as $k => $v) {
    	 
    			if(empty($v))
    				continue;

    			$con_value = new Sms_config_value;

    			$con_value->stripl = $request->stripl[$k];
    			$con_value->stripr = $request->stripr[$k];
    			$con_value->slot = $v;
    			$con_value->num = $request->type[$k];
    			$con_value->sms_config_id = $config->id;
                $con_value->exp = $request->explode[$k];
                $con_value->exp_index = $request->explode_index[$k];
                $con_value->colname = $request->col[$k];
    			$con_value->save();

              
    	 }

    	foreach ((array)$request->static_index as $k => $v) {
    	 
    			if(empty($v))
    				continue;

    			$con_static = new Sms_config_static;

    			$con_static->sms_config_id = $config->id;
    			$con_static->word = $request->static_word[$k];
    			$con_static->word_index =  $request->static_index[$k];


    			
    			$con_static->save();

    	 }


    	//return $arr;


    	//return $request->static_value;


    }


    public function smsinsert(Request $request){




            try 
            {
                
                        $ssms = new SMS();

                        $ssms->body = $request->body;

                        $ssms->date =  $request->date;

                        $ssms->address = $request->address;

                        $ssms->save();  

            }
            catch(\Illuminate\Database\QueryException $e){
                // do what you want here with $e->getMessage();
            }


            
           

    		$sms =  explode(" ",$request->body);


            foreach ( Sms_config::all() as $x => $y) {
                




                foreach ($y->sms_config_static as $k => $v) {
                    

                    if($sms[$v->word_index] == $v->word){
                                
                        continue;

                    }else{

                        break;
                    }

                }

                if((count($y->sms_config_static) - 1) == $k)
                {
                    $col =  $y->sms_config_value;

                    $str = '';



                    foreach ($col as $u => $o) {
                       

                         $strDb = $sms[$o->slot];



                        if($o->exp){



                            $strDb = explode($o->exp,$strDb)[$o->exp_index];
                        
                        } 


                        if($o->stripl){

                            $strDb = substr($strDb,$o->stripl);

                        }

                      
                          if($o->num == 1)
                           $strDb =  preg_replace("/[,]/", '', $strDb);
                       
                        

                          if($o->colname == 'body_sms'){
                            $strDb = $request->body;
                          }

                          $colarr[$o->colname] =   $strDb;


                    }

                       //json_encode($colarr);
                   

                  

                    return Transaction::create($colarr)->tran_id;


                }






            }

            return 'END';




    }

    public function sample(Request $request){


    	return view('main.pages.sample');


    }
     public function test(Request $request){


        return 'hey';


    }

    private function refExist(){

        

    }
}
