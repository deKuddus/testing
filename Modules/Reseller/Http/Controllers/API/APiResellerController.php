<?php

namespace Modules\Reseller\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reseller\Http\Requests;
use \Modules\Reseller\Entities\ResellerModel;
use \App\User;
use Session;
use DB;
use Str;

class APiResellerController extends Controller
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
        $data=ResellerModel::all();

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
    public function store(Request $request)
    {
        // Get all input data
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:191',
            'mobile' => 'required|max:15',
            'username' => 'required|max:128|unique:reseller',
            'from_date' => 'required',
            'to_date' => 'required',
            'user_limit' => 'required',
            'billing_system' => 'required|max:64',
            'status' => 'required',
            
        ]);

        if ($validator->passes()) {

            $input = $request->all();

            $count=ResellerModel::count();
            $countplus=$count+1;
            $input['username']=Str::slug($input['username'])."-r-".$countplus;
            // Check already presents or not
            $model=ResellerModel::where('mobile',$input['mobile'])->where('username',$input['username'])->exists();
            if( !$model )
            {

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

                    
                }

                if($reseller_data){
                    return response()->json([
                        'success' => true,
                        'message' => 'New Reseller Has been Updated.',
                        'reseller_data' => $reseller_data
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong!'
                ]); 

            }else{

                return response()->json([
                    'success' => false,
                    'message' => 'This Reseller already added! & Also Username are exists.'
                ]);
            }

        }else{
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all(),
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
            'data' => ResellerModel::find($id)
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

            $validator = \Validator::make($request->all(), [
                'name' => 'required|max:191',
                'mobile' => 'required|max:15',
                'username' => 'required|max:128|unique:reseller',
                'from_date' => 'required',
                'to_date' => 'required',
                'user_limit' => 'required',
                'billing_system' => 'required|max:64',
                'status' => 'required',
                
            ]);

            if ($validator->passes()) {

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


                if($reseller){
                    return response()->json([
                        'success' => true,
                        'message' => 'New Reseller Has been Updated.',
                        'reseller' => $reseller
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong!'
                ]); 

            }else{

                return response()->json([
                    'success' => false,
                    'message' => 'Reseller Not Found.'
                ]);
            }

        }else{
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all(),
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

  
}
