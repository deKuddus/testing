<?php

namespace Modules\Setups\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \Yajra\DataTables\Datatables;

use \App\User;
use \Modules\Setups\Entities\Role;

class AdminController extends Controller
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
        return $this->show(0);
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
                            return $query->where('is_main',0)->whereIn('id',json_decode(auth()->user()->role->sub_roles));
                        })->get(),
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
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => 'required',
            'gender' => 'required',
            
        ]);

        if ($validator->passes()) {

            $admin = new User();
            $admin->fill($request->all());
            $admin->username = \Str::slug($request->username);
            $admin->password = bcrypt($request->password);
            $admin->save();

            if($admin){
                return response()->json([
                    'success' => true,
                    'message' => 'Admin has been added',
                    'admin' => $admin
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
    public function show($role_id)
    {
        $data = [
            'role_id' => $role_id,
            'roles' => Role::where('status',1)
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->where('is_main',0)->whereIn('id',json_decode(auth()->user()->role->sub_roles));
                        })->get(),
            'admins' => User::when($role_id>0,function($query) use($role_id){
                            return $query->where('role_id',$role_id);
                        })
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->whereIn('role_id',json_decode(auth()->user()->role->sub_roles));
                        })
                        ->get(),
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
        $data = [
            'admin' => User::findOrFail($id),
            'roles' => Role::where('status',1)
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->where('is_main',0)->whereIn('id',json_decode(auth()->user()->role->sub_roles));
                        })->get()
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
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'role_id' => 'required',
            'gender' => 'required',
            'status' => 'required'
            
        ]);

        if ($validator->passes()) {


            $admin = User::findOrFail($id);
            $admin->fill($request->all());
            $admin->save();

            if($admin){
                return response()->json([
                    'success' => true,
                    'message' => 'Admin has been updated',
                    'admin' => $admin
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
        $admin = User::find($id)->delete();
        if($admin){
            return response()->json([
                'success' => true,
                'message' => 'Successfully Deleted this Data!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!'
        ]);
    }
}
