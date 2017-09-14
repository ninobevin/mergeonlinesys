<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    //
        public function __construct()
    {
        $this->middleware('auth');
    }





    public function claimform(Request $request){

/*
    	
    	$id =  $request->tran;

  		$transaction = Transaction::where('tran_id',$id)->first();  	

  		
  		$transaction->claim();
  		$transaction->save();


  		return redirect()->back();

*/
  			$id =  $request->tran;

  			$transaction = Transaction::where('tran_id',$id)->first();  	

  			return view('main.pages.claim',['Transaction'=>$transaction]);


    }
}
