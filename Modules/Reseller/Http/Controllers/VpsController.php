<?php

namespace Modules\Reseller\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reseller\Http\Requests;
use \Modules\Reseller\Entities\VpsModel;
use \App\User;
use Session;
use DB;
use Str;

class VpsController extends Controller
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
        $data=VpsModel::all();
        $pageTitle="Manage Vps";

        return view('reseller::vps.index',compact('data','pageTitle'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function onlineVps()
    {
        $data=VpsModel::where('status','1')->get();

        $pageTitle="Online Vps";

        return view('reseller::vps.online_vps',compact('data','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $pageTitle="Add New Vps";

        return view('reseller::vps.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Requests\VpsRequest $request)
    {
        // Get all input data
        $input = $request->all();
        
        // Check already presents or not
        $model=VpsModel::where('server_ip',$input['server_ip'])->exists();
        if( !$model )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store user data 
                if($reseller_data = VpsModel::create($input))
                {
                    DB::commit();
                }

                return is_save($reseller_data,'New Vps has been saved');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
        }else{

            Session::flash('danger', 'This Reseller already added!');
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
        return view('reseller::vps.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = [
            'data' => VpsModel::find($id)
        ];

        return view('reseller::vps.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Requests\VpsRequest $request, $id)
    {
         $reseller = VpsModel::find($id);

         $reseller->fill($request->all())->save();

         return is_save($reseller,'Vps has been updated.');
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
