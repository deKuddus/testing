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

class CustomerController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:api');
        
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {      

        $pageTitle= "Users List";

        if (auth()->user()->role_id=='1' || auth()->user()->role_id=='7') {

            $data=Customer::all();

        }else{

            $data=Customer::where('reseller_id',auth()->user()->reseller_id)->get();
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
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {   
        
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request,Customer $user)
    {
        
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:191',
            'mobile' => 'required|max:15',
            'username' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'billing_system' => 'required|max:64',
            'status' => 'required',
            
        ]);

            if ($validator->passes()) {
                // Get all input data
                $input = $request->all();

                $count_all=$user->count();
                $countplus=$count_all+1;

                $input['username']= Str::slug($request->username)."-u-".$countplus;
                // Check already presents or not
                $model=Customer::where('mobile',$input['mobile'])->exists();
                if(!$model )
                {

                    // Store user data 
                    $customers = Customer::where('reseller_id',auth()->user()->reseller_id)->count();

                    if (auth()->user()->role_id =='2') {

                     if(currentRegistration(auth()->user()->reseller_id)){

                        if(currentRegistration(auth()->user()->reseller_id)->user_limit <= $customers){

                            return response()->json([
                                'success' => false,
                                'message' => 'danger','Member Limit ('.currentRegistration(auth()->user()->reseller_id)->user_limit.') has been exceeded!'
                            ]);
                        }
                    }else{
                        
                        return response()->json([
                            'success' => false,
                            'message' => 'Your Registration has been expired!'
                        ]);
                    }
                }

                if( $user->fill($input))
                {   
                    $user->reseller_id = auth()->user()->reseller_id=='0'?null:auth()->user()->reseller_id;
                    $user = whoCreateThis($user);
                    $user->save();


                    User::create([
                        'name' => $request->name,
                        'email' => $input['email'],
                        'username' => $input['username'],
                        'password' => bcrypt($request->password),
                        'role_id' => 3,
                        'customer_id' => $user->id,
                        'reseller_id' => $user->reseller_id,
                        'two_factor_auth' => $request->two_factor_auth,
                        'created_at' => date("Y-m-d h:i:s"),
                        'updated_at' => date("Y-m-d h:i:s"),
                    ]);


                }

                if($user){
                    return response()->json([
                        'success' => true,
                        'message' => 'User Has been Updated.',
                        'user' => $user
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong!'
                ]); 

            }else{

                return response()->json([
                    'success' => false,
                    'message' => 'This User already added!'
                ]); 
            }

        }else{
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ]);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data = [
            'data' => Customer::find($id),
            'package_list'=>PackageModel::where('status','1')->pluck('title','id')->all()
        ];

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
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {   
        
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

         $validator = \Validator::make($request->all(), [
            'name' => 'required|max:191',
            'mobile' => 'required|max:15',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

    if ($validator->passes()) {

          $customer=Customer::where('id',$id)->first();

        if($customer->username!=$input['username']){

            $input['username']= Str::slug($request->username)."-".$id;
         }
            
        if (auth()->user()->role_id =='2') {

             if(!currentRegistration(auth()->user()->reseller_id)){
                   return response()->json([
                    'success' => false,
                    'message' => 'Your Registration has been expired!'
                ]);
            }


             $model=Customer::where('id',$id)->where('reseller_id',auth()->user()->reseller_id)->first();

             $findUser=User::where('reseller_id',auth()->user()->reseller_id)->where('customer_id',$id)->first();

        }else{

            $model=Customer::where('id',$id)->first();

            $findUser=User::where('customer_id',$id)->first();
        }

        $input['reseller_id'] = $model->reseller_id;

        if ($model) {
            $model->update($input);

                if ($findUser) {

                    $findUser=$findUser->update([
                       'name' => $request->name,
                       'email' => $input['email'],
                       'username' => $input['username'],
                       'password' => bcrypt($request->password),
                       'role_id' => 3,
                       'customer_id' => $id,
                       'reseller_id' => $model->reseller_id,
                       'created_at' => date("Y-m-d h:i:s"),
                       'updated_at' => date("Y-m-d h:i:s"),
                   ]);
                }else{

                    User::create([
                        'name' => $request->name,
                        'email' => $input['email'],
                        'username' => $input['username'],
                        'password' => bcrypt($request->password),
                        'role_id' => 3,
                        'customer_id' =>$id,
                        'reseller_id' => $model->reseller_id,
                        'created_at' => date("Y-m-d h:i:s"),
                        'updated_at' => date("Y-m-d h:i:s"),
                    ]);
                }


                if($model){
                    return response()->json([
                        'success' => true,
                        'message' => 'User Has been Updated.',
                        'model' => $model
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong!'
                ]); 

            }else{

                return response()->json([
                    'success' => false,
                    'message' => 'This User already added!'
                ]); 
            }

        }else{
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        if (auth()->user()->role_id =='2') {

            if(currentRegistration(auth()->user()->reseller_id)){

                $model=Customer::where('id',$id)->where('reseller_id',auth()->user()->reseller_id)->first();
                
                if($model->delete()){

                    User::where('customer_id',$id)->where('reseller_id',auth()->user()->reseller_id)->delete();

                    return response()->json([
                        'success' => true,
                    ]); 
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Member cannot be deleted'
                ]); 

            }else{

                return response()->json([
                    'success' => false,
                    'message' => 'Your Registration has been expired!'
                ]);
            }

        }else{

            $model=Customer::where('id',$id)->first();

            if ($model->delete()) {

                User::where('customer_id',$id)->delete();

                 return response()->json([
                        'success' => true,
                    ]); 
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Member cannot be deleted'
                ]); 
            }
        }
        
    }

  

    public function onlineUsers()
    {   
        $pageTitle="Online Users";
        if (auth()->user()->role_id=='1' || auth()->user()->role_id=='7') {

            $data=Customer::all();

        }else{

            $data=Customer::where('reseller_id',auth()->user()->reseller_id)->get();
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
