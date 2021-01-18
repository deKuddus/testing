<?php

namespace Modules\Reseller\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reseller\Http\Requests;
use \Modules\Reseller\Entities\VpsModel;
use \App\User;
use Session;
use DB;
use Str;

class ApiVpsController extends Controller
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
        $data=VpsModel::all();

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
    public function onlineVps()
    {
        $data=VpsModel::where('status','1')->get();

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

         $validator = \Validator::make($request->all(), [
            'server_ip' => 'required|max:191',
            'username' => 'required|max:15',
            'password' => 'required',
            'vpn_connection' => 'required',
            'status' => 'required',
        ]);

         if ($validator->passes()) {


            // Get all input data
            $input = $request->all();
            
            // Check already presents or not
            $model=VpsModel::where('server_ip',$input['server_ip'])->exists();
            if( !$model )
            {

                    // Store user data 
                $reseller_data = VpsModel::create($input);

                if($vps_data){
                    return response()->json([
                        'success' => true,
                        'message' => 'New Vps Has been Updated.',
                        'vps_data' => $vps_data
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong!'
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
            'data' => VpsModel::find($id)
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
                    'server_ip' => 'required|max:191',
                    'username' => 'required|max:15',
                    
        ]);

        if ($validator->passes()) {

                   $reseller = VpsModel::find($id);

                   $reseller->fill($request->all())->save();

                   if($reseller){
                    return response()->json([
                        'success' => true,
                        'message' => 'New Vps Has been Updated.',
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
        $delete = VpsModel::find($id)->delete();
        
        if($delete){
            session()->flash('success','Vps has been deleted');
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
