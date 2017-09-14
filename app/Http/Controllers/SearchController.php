<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\Customer;
use App\Address;
use App\Sms;
class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function searchMain(Request $request)
    {
      

      	if(trim($request->term) ==""){

      		return   $arr[] = "";
      	}

    	$q = "%".implode("%%", explode(" ", $request->term))."%";

        switch ($request->cb_option) {
            case 1:
                $result = Transaction::take(10)->select('ref_no as resultvar')->where('ref_no','like',"%".$q."%")->get();
            break;
            case 2:
                 //$result = Customer::take(10)->where('ref_no','like',"%".$request->term."%")->get();

                $result = Customer::take(10)->select(DB::raw("CONCAT(fname,' ',mname,'. ',lastname) AS resultvar"))
                ->where(DB::raw("CONCAT(fname,' ',mname,' ',lastname)"),'like',"%".$q."%")->get();
                     //$result = Customer::take(10)->select("CONCAT(fname,mname,lastname) AS resultvar")
                    // ->where("CONCAT(fname,mname,lastname)",'like',"'%".$request->term."%'")->get();
                     //return $request->term;
                     //return $result->toSql();
                break;
            case 3:
                     //$result = Customer::take(10)->where('ref_no','like',"%".$request->term."%")->get();

             
            break;


        }


       

        if(count($result) <= 0)
            $arr[] = "";

          

        foreach ($result as $key) {
            $arr[] =  $key['resultvar'];
        }

        
        

        return $arr;
    }

    public function searchCustomer(Request $request)
    {
      

       

                $q = $request->term;


                 $result = Customer::where(DB::raw("CONCAT(fname,' ',mname,'. ',lastname)"),"$q")->first();
             
                return view('main.panels.customerDetails',['Customer' => $result]);

    }

    public function view(Request $request){


    		$q = $request->search;
    		
       


    		switch ($request->cb_option) {
    			case '1':
    			     

                    $Transactions = Transaction::take(10)->where('ref_no','like',"%".$q."%")->paginate(10);
                     return view('main.pages.searchView',['Transactions'=>$Transactions]);


    				break;
    			case '2':
    				    			
    				$Customers = Customer::where(DB::raw("CONCAT(fname,' ',mname,'. ',lastname)"),'like',"%".$q."%")->paginate(10);
                     return view('main.pages.searchView',['Customers'=>$Customers]);
                case '3':
    		       $Sms = Sms::take(10)->where('body','like',"%".$q."%")->paginate(10);
                    return view('main.pages.searchView',['Sms'=>$Sms]);
    				break;
    		}

    		
           


    }

    public function searchAddress(Request $request){



            if(trim($request->term) ==""){

                return   $arr[] = "";
            }

            $q = "%".implode("%%", explode(" ", $request->term))."%";

      
                     $result = Address::take(10)->select(DB::raw("CONCAT(upper(barangay),' ',upper(city),' ',upper(province)) AS resultvar"))
                     ->where(DB::raw("CONCAT(upper(barangay),' ',upper(city),' ',upper(province))"),'like',"%".$q."%")->get();
       

           

            if(count($result) <= 0)
                $arr[] = "";

              

            foreach ($result as $key) {
                $arr[] =  $key['resultvar'];
            }

            
            

            return $arr;



    }
     public function searchAddressView(Request $request){

        
            $response = Address::where(DB::raw("CONCAT(upper(barangay),' ',upper(city),' ',upper(province))"),'=',$request->term)->first();

        

            return $response->loc_id;

    }
}
