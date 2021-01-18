<?php

namespace Modules\Reseller\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reseller\Http\Requests;
use \Modules\Reseller\Entities\ResellerModel;
use \Modules\Reseller\Entities\TicketModel;
use \App\User;
use Session;
use DB;
use Str;
use Image;
use File;

class TicketsController extends Controller
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
        $data=TicketModel::all();

        $pageTitle="Tickets List";

        return view('reseller::ticket.index',compact('data','pageTitle'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function pending()
    {
        $data=TicketModel::where('status','0')->get();

        $pageTitle="Pending Tickets";

        return view('reseller::ticket.index',compact('data','pageTitle'));
    }

    
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $pageTitle="Add New Ticket";

        $reseller_list = ResellerModel::pluck('username','id')->all();

        return view('reseller::ticket.create',compact('pageTitle','reseller_list'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Requests\TicketsRequest $request)
    {
        // Get all input data
            $input = $request->all();
        
            if($request->hasFile('image')){
                $fileInfo=fileInfo($request->image);
                $name=date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
                
            }else{
                $name="";
            }

            $input['image']=$name;
        
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store user data 
                if($reseller_data = TicketModel::create($input))
                {   
                    if($request->hasFile('image')){
                        $upload=fileUpload($request->image,'ticket',$name);
                    }
                    DB::commit();
                }

                 Session::flash('success','New Ticket has been created');
               
                 return redirect('manage-ticket/tickets');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
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
        $data = [
            'data' => TicketModel::find($id)
        ];
        return view('reseller::ticket.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = [
            'data' => TicketModel::find($id),
             'reseller_list' => ResellerModel::pluck('username','id')->all()
        ];

        return view('reseller::ticket.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Requests\TicketsRequest $request, $id)
    {
            $input = $request->all();
            $tickets = TicketModel::find($id);
            // Get all input data
            if($tickets){

                    if($request->hasFile('image')){
                            $fileInfo=fileInfo($input['image']);
                            $name=date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
                            if($name != null){
                             fileDelete('ticket/'.$tickets->image);
                             $upload=fileUpload($request->image,'ticket',$name);
                         }
                     }else{

                        $name=$tickets->image;
                    }

                    $input['image']=$name;

                    /* Transaction Start Here */
                    DB::beginTransaction();
                    try {
                    // Store user data 
                        if($tickets->update($input))
                        {   
                            DB::commit();
                        }

                        return is_save($tickets,'Ticket has been updated');

                    } catch (\Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                        DB::rollback();
                        Session::flash('danger', $e->getMessage());
                    }
            }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = TicketModel::find($id)->first();
        
        if($model){

            fileDelete('ticket/'.$model->image);

            $model=$model->delete();

            session()->flash('success','Ticket has been deleted');
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
