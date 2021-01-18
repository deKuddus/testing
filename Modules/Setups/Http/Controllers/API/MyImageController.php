<?php

namespace Modules\Setups\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;

class MyImageController extends Controller
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
            'file' => ['required', 'image'],

        ]);

        if ($validator->passes()) {

            $user = auth()->user();

            $fileInfo=fileInfo($request->file);
            $name=$user->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
            $upload=fileUpload($request->file,'user-images',$name);

            if($upload){

                if(!empty($user->image)){
                    fileDelete('user-images/'.$user->image);
                }

                $user->image=$name;
                $user->save();
                if($user){

                    return response()->json([
                        'success' => true,
                        'message' => 'Your image has been uploaded.',
                        'user' => $user
                    ]);

                }else{

                    return response()->json([
                        'success' => false,
                        'message' => 'Something went wrong!'
                    ]); 
                }
            }else{

                return response()->json([
                    'success' => false,
                    'message' => 'Image Updated Faield'
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
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
       
    }
}
