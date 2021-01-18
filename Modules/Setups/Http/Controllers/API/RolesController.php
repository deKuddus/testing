<?php

namespace Modules\Setups\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Setups\Entities\Role;

class RolesController extends Controller
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
        $data =  Role::where('status',1)
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->where('is_main',0)->whereIn('id',json_decode(auth()->user()->role->sub_roles));
                        })->get();
            

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

        //return view('setups::roles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data = [
            'roles' => Role::where('status',1)
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->where('is_main',0);
                        })
                        ->whereNotIn('id',[auth()->user()->role_id])
                        ->get()
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

        //return view('setups::roles.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:roles'
            
        ]);

        if ($validator->passes()) {


            $role=new Role();
            $role->fill($request->all());
            $role->sub_roles=json_encode(isset($request->sub_roles[0]) ? $request->sub_roles : array());
            $role->permissions=json_encode(array());
            $role->save();

            if($role){
                return response()->json([
                    'success' => true,
                    'message' => 'Successfully Saved Roles',
                    'role' => $role
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
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data = [
            'roles' => Role::where('status',1)
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->where('is_main',0);
                        })
                        ->whereNotIn('id',[auth()->user()->role_id,$id])
                        ->get(),
            'role' => Role::findOrFail($id)
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

        //return view('setups::roles.show');
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
            'name' => 'required',
            'status' => 'required'
            
        ]);

        if ($validator->passes()) {

        $role=Role::findOrFail($id);
        $role->fill($request->all());
        $role->sub_roles=json_encode(isset($request->sub_roles[0]) ? $request->sub_roles : array());
        $role->save();

         if($role){
                return response()->json([
                    'success' => true,
                    'message' => 'Roles has been saved',
                    'role' => $role
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
        $role=Role::find($id)->delete();
        if($role){
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!'
        ]);
    }
}
