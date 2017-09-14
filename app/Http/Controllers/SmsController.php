<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sms;

class SmsController extends Controller
{
    //

    public function smsParse(Request $request){




    	$sms = Sms::where('id',$request->id)->first();

    	
    	return view('main.pages.smsparse',['sms'=>$sms]);

    }
}
