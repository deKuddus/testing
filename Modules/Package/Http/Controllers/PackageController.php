<?php

namespace Modules\Package\Http\Controllers;

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
        $this->middleware('auth');
        
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
        

        return view('package::package.index',compact('data','pageTitle'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {   
        $pageTitle="Package Create";
        return view('package::package.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Requests\PackageRequest $request, PackageModel $package)
    {
        // Get all input data
        $input = $request->all();

        
        $input['package_code']= Str::slug($request->package_code);
        // Check already presents or not
        $model=PackageModel::where('package_code',$input['package_code'])->exists();
        if(!$model )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                   
                if( $package->fill($input))
                {   
                    $package = whoCreateThis($package);
                    $package->save();
                    DB::commit();
                }

                return is_save($package,'New Package has been saved');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
        }else{

            Session::flash('danger', 'This Package already added!');
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
        return view('package::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = [
            'data' => PackageModel::find($id)
        ];
        return view('package::package.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Requests\PackageRequest $request, $id)
    {
        $input = $request->all();

        $input['package_code']= Str::slug($request->package_code);

        $model=PackageModel::where('id',$id)->first();
        
        if ($model) {
            $model->update($input);

            return is_save($model,'Package has been updated successfully.');
        }else{

            Session::flash('danger', 'Package Not Found!');
           
        }

         return back();
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
