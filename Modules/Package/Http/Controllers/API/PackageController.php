<?php

namespace Modules\Package\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Package\Http\Requests;
use \Modules\Package\Entities\PackageModel;
use \App\User;
use Session;
use DB;
Use Str;


class PackageController extends Controller
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


        $pageTitle= "Package List";

        if (auth()->user()->role_id=='1' || auth()->user()->role_id=='7') {

            $data=PackageModel::all();

        }else{

            $data=PackageModel::where('created_by',auth()->user()->reseller_id)->get();
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
    public function store(Request $request, PackageModel $package)
    {
        // Get all input data
        $input = $request->all();

        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:191',
            'slug' => 'required|max:15',
            'from_date' => 'required',
            'to_date' => 'required',
            'price' => 'required',
            'package_code' => 'required|max:64',
            'status' => 'required',
            
        ]);

        if ($validator->passes()) {

            $input['package_code']= Str::slug($request->package_code);
        // Check already presents or not
            $model=PackageModel::where('package_code',$input['package_code'])->exists();
            if(!$model )
            {


                if( $package->fill($input))
                {   
                    $package = whoCreateThis($package);
                    $package->save();

                }

                if($package){
                    return response()->json([
                        'success' => true,
                        'message' => 'Package Has been Updated.',
                        'package' => $package
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
            'data' => PackageModel::find($id)
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
            'package_code' => 'required|max:64',
            'status' => 'required',
        ]);

        if ($validator->passes()) {


            $input['package_code'] = Str::slug($request->package_code);

            $model=PackageModel::where('id',$id)->first();
            
            if ($model) {
                $model->update($input);

                return response()->json([
                    'success' => true,
                    'message' => 'Package Has been Updated.',
                    'model' => $model
                ]);
                

            }else{

                
                return response()->json([
                    'success' => false,
                    'message' => 'Package Not Dound'
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

                $model=PackageModel::where('id',$id)->where('created_by',auth()->user()->reseller_id)->first();
                
                if($model->delete()){

                    return response()->json([
                        'success' => true,
                    ]); 
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Pacakge cannot be deleted'
                ]); 

            }else{

                return response()->json([
                    'success' => false,
                    'message' => 'Your Registration has been expired!'
                ]);
            }

        }else{

            $model=PackageModel::where('id',$id)->first();

            if ($model->delete()) {
                 return response()->json([
                        'success' => true,
                    ]); 
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Package cannot be deleted'
                ]); 
            }
        }
    }
}
