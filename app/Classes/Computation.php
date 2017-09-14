<?php

namespace App\Classes;

use App\AgentCharge;

class Computation{
    //



    public static function getAgentCharge($amount){



    		$result = AgentCharge::where('amount','>=',$amount)->first();



    		if(count($result) <= 0){

    				$result = AgentCharge::orderBy('amount','asc')->get()->last();
    				

    		}

    		return $result->charge;


    }
}
