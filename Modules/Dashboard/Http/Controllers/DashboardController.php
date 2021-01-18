<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use \Modules\Reseller\Entities\ResellerModel;
use \Modules\Customer\Entities\Customer;
use \App\User;
use Auth;
class DashboardController extends Controller
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
        $data=[
            'pageTitle'=>Auth::user()->role->name.' Dashboard'
        ];

        return view('dashboard::index',$data);

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
   

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function changePassword($id)
    {
        $data = [
            'data' => Customer::find($id)
        ];
        return view('dashboard::users.changePassword',$data);
    }

     /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updatePassword(Request $request, $id)
    {
        $input = $request->all();
      
        
        if (auth()->user()->role_id =='2') {

             if(!currentRegistration(auth()->user()->reseller_id)){
                session()->flash('danger','Your Registration has been expired!');
                return redirect()->back();
            }

             $model=Customer::where('id',$id)->where('reseller_id',auth()->user()->reseller_id)->first();
        }else{

            $model=Customer::where('id',$id)->first();
        }

        if ($model) {
            $model->update($input);

            return is_save($model,'Successfully Changed Password');
        }else{

            Session::flash('danger', 'User Not Found');
            return back();
        }
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('dashboard::edit');
    }

   

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
