<?php

namespace Modules\Reseller\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reseller\Http\Requests;
use \Modules\Reseller\Entities\ResellerModel;
use \App\User;
use Session;
use DB;
use Str;
class ResellerController extends Controller
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
        $data=ResellerModel::all();

        return view('reseller::reseller.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $billing_system=[
            '1' => "1 Month",
            '2' => "2 Month",
            '3' => "3 Month",
            '4' => "4 Month",
            '5' => "5 Month",
            '6' => "6 Month",
            '7' => "7 Month",
            '8' => "8 Month",
            '9' => "9 Month",
            '10' => "10 Month",
            '11' => "11 Month",
            '12' => "12 Month",
            '13' => "Unlimited",
        ];

        return view('reseller::reseller.create',compact('billing_system'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Requests\ResellerRequest $request)
    {
        // Get all input data
        $input = $request->all();
        $count=ResellerModel::count();
        $countplus=$count+1;
        $input['username']=Str::slug($input['username'])."-r-".$countplus;
        // Check already presents or not
        $model=ResellerModel::where('mobile',$input['mobile'])->where('username',$input['username'])->exists();
        if( !$model )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store user data 
                if($reseller_data = ResellerModel::create($input))
                {
                    
                    User::create([
                        'name' => $request->name,
                        'username' => $input['username'],
                        'email' => $input['email'],
                        'password' => bcrypt($request->password),
                        'role_id' => 2,
                        'reseller_id' => $reseller_data->id,
                        'two_factor_auth' => $request->two_factor_auth,
                        'created_at' => date("Y-m-d h:i:s"),
                        'updated_at' => date("Y-m-d h:i:s"),
                    ]);

                    DB::commit();
                }

                return is_save($reseller_data,'New Reseller has been saved');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
        }else{

            Session::flash('danger', 'This Reseller already added! & Also Username are exists.');
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
        return view('reseller::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = [
            'data' => ResellerModel::find($id),
            'billing_system'=> [
                '1' => "1 Month",
                '2' => "2 Month",
                '3' => "3 Month",
                '4' => "4 Month",
                '5' => "5 Month",
                '6' => "6 Month",
                '7' => "7 Month",
                '8' => "8 Month",
                '9' => "9 Month",
                '10' => "10 Month",
                '11' => "11 Month",
                '12' => "12 Month",
                '13' => "Unlimited",
            ],
        ];

        return view('reseller::reseller.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Requests\ResellerRequest $request, $id)
    {
         $input=$request->all();
         $reseller = ResellerModel::find($id);
         $userReseller=User::where('reseller_id',$id)->first();

         if($reseller->username!=$input['username']){
            $input['username']=Str::slug($input['username'])."-r-".$id;
         }


         if($reseller){

            $reseller->fill($input)->save();

                if($userReseller){

                    $userReseller=$userReseller->update([
                     'name' => $request->name,
                     'username' => $input['username'],
                     'email' => $input['email'],
                     'password' => bcrypt($input['password']),
                     'role_id' => 2,
                     'reseller_id' => $id,
                     'two_factor_auth' => $request->two_factor_auth,
                     'created_at' => date("Y-m-d h:i:s"),
                     'updated_at' => date("Y-m-d h:i:s"),
                 ]);

                }else{

                    $userReseller=User::insert([
                     'name' => $request->name,
                     'email' => $input['email'],
                     'username' => $input['username'],
                     'password' => bcrypt($input['password']),
                     'role_id' => 2,
                     'reseller_id' => $id,
                     'two_factor_auth' => $request->two_factor_auth,
                     'created_at' => date("Y-m-d h:i:s"),
                     'updated_at' => date("Y-m-d h:i:s"),
                 ]);
                }
         }

        

         return is_save($reseller,'Reseller has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $delete = ResellerModel::find($id)->delete();
        
        if($delete){
            \App\User::where('reseller_id',$id)->delete();

            session()->flash('success','Reseller has been deleted');
            return response()->json([
                'success' => true,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cannot be deleted.'
        ]);
    }   

     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */

    public function getRow($row,$username){
        $row=$row;
        $resellers=ResellerModel::count();
        $username=Str::slug($username);
        $billing_system=['1' => "1 Month",'2' => "2 Month",'3' => "3 Month",'4' => "4 Month",'5' => "5 Month",'6' => "6 Month",'7' => "7 Month",'8' => "8 Month",'9' => "9 Month",'10' => "10 Month",'11' => "11 Month",'12' => "12 Month",'13' => "Unlimited",
        ];

        return view('reseller::bulkreseller._form',compact('row','resellers','username','billing_system'));
    }



     public function bulk_reseller_batch_store(Request $request){

        //check num_row
        if ($request->num_row > 0) {
            //start loop
             for ($i = 0; $i < $request->num_row; $i++) {
                //convert to slug
              
                //check null or not
                if ($request->name[$i] != "" && $request->mobile[$i] != "" && $request->username[$i] != "") {

                    $check_existing_user=ResellerModel::where('mobile',$request->mobile[$i])
                                        ->where('username',$request->username[$i])
                                        ->exists();

                    if (!$check_existing_user) {

                        $user_id = ResellerModel::insertGetId([
                            'name'=> $request->name[$i],
                            // 'email' =>$request->email[$i],
                            'mobile' =>$request->mobile[$i],
                            'username'=> Str::slug($request->username[$i]),
                            'password' =>$request->password[$i],
                            // 'from_date'=> $request->from_date[$i],
                            // 'to_date'=> $request->to_date[$i],
                            'user_limit' => $request->user_limit[$i],
                            'billing_system' => $request->billing_system[$i],
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
                                    'role_id' => 2,
                                    'reseller_id' => $user_id,
                                    'two_factor_auth' => '1',
                                    'created_at' => date("Y-m-d h:i:s"),
                                    'updated_at' => date("Y-m-d h:i:s"),
                                ]);
                        }

                    }  

                }else{

                    Session::flash('danger', 'Please enter phone number, username');
                    return back();
                } 
             }
            //end loop
        }
        //end num row

        Session::flash('success', 'Reseller Add Successfully');
        return back();
    }



}
