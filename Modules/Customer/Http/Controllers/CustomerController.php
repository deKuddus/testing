<?php

namespace Modules\Customer\Http\Controllers;

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
        $this->middleware('auth');
        
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
        

        return view('customer::users.index',compact('data','pageTitle'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {   
        $package_list=[''=>'Select Package']+PackageModel::where('status','1')->pluck('title','id')->all();
        $billing_system=['1' => "1 Month",'2' => "2 Month",'3' => "3 Month",'4' => "4 Month",'5' => "5 Month",'6' => "6 Month",'7' => "7 Month",'8' => "8 Month",'9' => "9 Month",'10' => "10 Month",'11' => "11 Month",'12' => "12 Month",'13' => "Unlimited",
        ];
        return view('customer::users.create',compact('package_list','billing_system'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Requests\CustomerRequest $request,Customer $user)
    {
        // Get all input data
        $input = $request->all();

        $count_all=$user->count();
        $countplus=$count_all+1;
        
        $input['username']= Str::slug($request->username)."-u-".$countplus;
        // Check already presents or not
        $model=Customer::where('mobile',$input['mobile'])->exists();
        if(!$model )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                    // Store user data 
                    $customers = Customer::where('reseller_id',auth()->user()->reseller_id)->count();

                    if (auth()->user()->role_id =='2') {

                       if(currentRegistration(auth()->user()->reseller_id)){

                            if(currentRegistration(auth()->user()->reseller_id)->user_limit <= $customers){

                                session()->flash('danger','Member Limit ('.currentRegistration(auth()->user()->reseller_id)->user_limit.') has been exceeded!');
                                return redirect()->back();
                            }
                        }else{
                            session()->flash('danger','Your Registration has been expired!');
                            return redirect()->back();
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

                    DB::commit();
                }

                return is_save($user,'New User has been saved');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
        }else{

            Session::flash('danger', 'This User already added!');
            return back();
        }
       
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {   
        $data = [
            'data' => Customer::find($id),
            'package_list'=>PackageModel::where('status','1')->pluck('title','id')->all(),
            'billing_system'=>['1' => "1 Month",'2' => "2 Month",'3' => "3 Month",'4' => "4 Month",'5' => "5 Month",'6' => "6 Month",'7' => "7 Month",'8' => "8 Month",'9' => "9 Month",'10' => "10 Month",'11' => "11 Month",'12' => "12 Month",'13' => "Unlimited",
            ]
        ];
        return view('customer::users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Requests\CustomerRequest $request, $id)
    {
        $input = $request->all();

          $customer=Customer::where('id',$id)->first();

        if($customer->username!=$input['username']){

            $input['username']= Str::slug($request->username)."-".$id;
         }
            
        if (auth()->user()->role_id =='2') {

             if(!currentRegistration(auth()->user()->reseller_id)){
                session()->flash('danger','Your Registration has been expired!');
                return redirect()->back();
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
                     'reseller_id' => $input['reseller_id'],
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
                        'reseller_id' => $input['reseller_id'],
                        'created_at' => date("Y-m-d h:i:s"),
                        'updated_at' => date("Y-m-d h:i:s"),
                    ]);
            }


            return is_save($model,'User has been updated successfully.');
        }else{

            Session::flash('danger', 'User Not Found!');
            return back();
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

    public function getRow($row,$username){
        $row=$row;

        $customers=Customer::count();
        $username=Str::slug($username);
        $package_list=PackageModel::where('status','1')->select('title','id')->get();

        return view('customer::bulkpin._form',compact('row','customers','username','package_list'));
    }

    public function bulk_pin_batch_store(Request $request){

        //check num_row
        if ($request->num_row > 0) {
            //start loop
             for ($i = 0; $i < $request->num_row; $i++) {
                //convert to slug
              
                //check null or not
                if ($request->name[$i] != "" && $request->mobile[$i] != "" && $request->username[$i] != "") {

                    $check_existing_user=Customer::where('mobile',$request->mobile[$i])
                                        // ->where('email',$request->email[$i])
                                        ->where('username',$request->username[$i])
                                        ->exists();

                    if (!$check_existing_user) {

                        $customers = Customer::where('reseller_id',auth()->user()->reseller_id)->count();

                        if (auth()->user()->role_id =='2') {

                            if(currentRegistration(auth()->user()->reseller_id)){

                                if(currentRegistration(auth()->user()->reseller_id)->user_limit <= $customers){

                                    session()->flash('danger','Member Limit ('.currentRegistration(auth()->user()->reseller_id)->user_limit.') has been exceeded!');
                                    return redirect()->back();
                                }
                            }else{
                                session()->flash('danger','Your Registration has been expired!');
                                return redirect()->back();
                            }
                        }

                        $user_id = Customer::insertGetId([
                            'reseller_id' => auth()->user()->reseller_id=='0'?null:auth()->user()->reseller_id,
                            'package_id'=> '2',
                            'name'=> $request->name[$i],
                            // 'email' =>$request->email[$i],
                            'mobile' =>$request->mobile[$i],
                            'username'=> Str::slug($request->username[$i]),
                            'password' =>$request->password[$i],
                            // 'from_date'=> $request->from_date[$i],
                            // 'to_date'=> $request->to_date[$i],
                            'billing_system' => '1',
                            'billing_status' => 'unpaid',
                            'status' => '1',
                            'created_by' => auth()->user()->id,
                            'created_at' => date("Y-m-d h:i:s"),
                            'updated_at' => date("Y-m-d h:i:s"),
                        ]);

                        if($user_id){

                                User::create([
                                    'name' => $request->name[$i],
                                    // 'email' => $request->email[$i],
                                    'username' => Str::slug($request->username[$i]),
                                    'password' => bcrypt($request->password[$i]),
                                    'role_id' => 3,
                                    'customer_id' => $user_id,
                                    'reseller_id' => auth()->user()->reseller_id=='0'?null:auth()->user()->reseller_id,
                                    'created_at' => date("Y-m-d h:i:s"),
                                    'updated_at' => date("Y-m-d h:i:s"),
                                ]);
                        }

                    }  

                }else{

                    Session::flash('danger', 'Please enter email, phone number, username');
                    return back();
                } 
             }
            //end loop
        }
        //end num row

        Session::flash('success', 'User Add Successfully');
        return back();
    }

     public function onlineUsers()
    {   
        $pageTitle="Online Users";
        if (auth()->user()->role_id=='1' || auth()->user()->role_id=='7') {

            $data=Customer::all();

        }else{

            $data=Customer::where('reseller_id',auth()->user()->reseller_id)->get();
        }

        return view('dashboard::users.online',compact('pageTitle','data'));
    }

}
