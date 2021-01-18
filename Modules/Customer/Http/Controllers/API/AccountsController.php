<?php

namespace Modules\Customer\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Customer\Http\Requests;
use \Modules\Reseller\Entities\ResellerModel;
use \Modules\Customer\Entities\Customer;
use \Modules\Package\Entities\PackageModel;
use \App\User;
use Session;
use DB;
Use Str;

class AccountsController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:api');
        
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function paid_users()
    {      

        $pageTitle= "Paid Users List";

        if (auth()->user()->role_id=='1' || auth()->user()->role_id=='7') {

            $data=Customer::where('billing_status','paid')->get();

        }else{

            $data=Customer::where('reseller_id',auth()->user()->reseller_id)->where('billing_status','paid')->get();
        }
        

        if($data){
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!'
        ]); 
        
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function unpaid_users()
    {      

        $pageTitle= "Un Paid Users List";

        if (auth()->user()->role_id=='1' || auth()->user()->role_id=='7') {

            $data=Customer::where('billing_status','unpaid')->get();

        }else{

            $data=Customer::where('reseller_id',auth()->user()->reseller_id)->where('billing_status','unpaid')->get();
        }
        

       if($data){
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!'
        ]); 
        
    }

}
