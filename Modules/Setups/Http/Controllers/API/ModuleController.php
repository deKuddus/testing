<?php

namespace Modules\Setups\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Setups\Entities\Module;

class ModuleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return Module::all();
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
            'serial' => 'required',
            'name' => 'required|unique:modules',
            'route' => 'required|unique:modules'
        ]);

        if ($validator->passes()) {
            $module = new Module();
            $module->fill($request->all());
            $module->save();

            if($module){
                return response()->json([
                    'success' => true,
                    'message' => 'Saved Successfully',
                    'data' => $module
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
        return Module::find($id);
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
            'serial' => 'required',
            'name' => 'required',
            'route' => 'required',
            'status' => 'required',
        ]);

        if ($validator->passes()) {
            $module = Module::find($id);
            $module->fill($request->all());
            $module->save();

            if($module){
                return response()->json([
                    'success' => true,
                    'module' => $module
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
        $role=Module::find($id)->delete();
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
