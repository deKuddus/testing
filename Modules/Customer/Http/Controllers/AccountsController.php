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

class AccountsController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
        
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
        

        return view('customer::accounts.paid',compact('data','pageTitle'));
        
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
        

       return view('customer::accounts.unpaid',compact('data','pageTitle'));
        
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
            'package_list'=>PackageModel::where('status','1')->pluck('title','id')->all()
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

}
