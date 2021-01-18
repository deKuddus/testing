<?php

namespace Modules\Reseller\Http\Controllers\API;

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

class ApiTicketsController extends Controller
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
        $data=TicketModel::all();

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
    public function pending()
    {
        $data=TicketModel::where('status','0')->get();

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
               'ticket_option' => 'required|max:191',
               'name' => 'required|max:191',
               'email' => 'required',
               'subject' => 'required',
               'description' => 'required',
               'status' => 'required',
               'image'   => 'image|mimes:jpeg,png,jpg,gif|max:1024',
           ]);

            if ($validator->passes()) {


                $input = $request->all();

                if($request->hasFile('image')){
                    $fileInfo=fileInfo($request->image);
                    $name=date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];

                }else{
                    $name="";
                }

                $input['image']=$name;


                // Store user data 
                if($ticket_data = TicketModel::create($input))
                {   
                    if($request->hasFile('image')){
                        $upload=fileUpload($request->image,'ticket',$name);
                    }

                }

                if($ticket_data){
                    return response()->json([
                        'success' => true,
                        'message' => 'New Ticket Has been Updated.',
                        'ticket_data' => $ticket_data
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
            'data' => TicketModel::find($id)
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
               'ticket_option' => 'required|max:191',
               'name' => 'required|max:191',
           ]);

             if ($validator->passes()) {

                $input = $request->all();
                $tickets = TicketModel::find($id);

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

                $tickets=$tickets->update($input);
        
                if($tickets){
                    return response()->json([
                        'success' => true,
                        'message' => 'New Ticket Has been Updated.',
                        'tickets' => $tickets
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
