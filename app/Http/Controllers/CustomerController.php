<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;


class CustomerController extends Controller
{
    //
    public function saveQuickAddCustomer(Request $request){

    	


    	$c = new Customer();
    	$r = $request;

    	$c->fname = strtoupper($r->firstname);
    	$c->mname = strtoupper($r->middleinitial);
    	$c->lastname = strtoupper($r->lastname);
        $c->loc_id = $r->address;



        foreach( $c->getAttributes()  as $f){

            if(is_null($f))
                return "<p class='text-danger'><i class='fa fa-exclamation-triangle'></i> Empty field detected. Please fill out all fields.<p>";

        }

        $cCount = Customer::where('fname',$c->fname)
                ->where('mname',$c->mname)
                ->where('lastname',$c->lastname)
                ->count();


        if($cCount){
            return "<p class='text-danger'><i class='fa fa-exclamation-triangle'></i> Customer Name is already taken.<p>";
        }

        

		$result = $c->save();

		if($result){

			return "<p class='text-success'><i class='fa fa-check'></i> Customer successfully saved.<p>";
		}else{

			return "<p class='text-danger'><i class='fa fa-exclamation-triangle'></i> Customer not saved.<p>";
		}    	
 
    }
}
