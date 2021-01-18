<?php

namespace Modules\Setups\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Setups\Entities\SystemInformation;

class SystemInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
           return SystemInformation::find(1);
            
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
         $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            
        ]);

        if ($validator->passes()) {

                $information = SystemInformation::find(1);
                $information->fill($request->all());
                $information->save();

                if($information){
                    if($request->hasFile('logo_file')){
                        $fileInfo=fileInfo($request->logo_file);
                        $name=$information->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
                        $upload=fileUpload($request->logo_file,'system-images/logos',$name);
                        if($upload){
                         if(!empty($information->logo)){
                            fileDelete('system-images/logos/'.$information->logo);
                        }
                        $information->logo=$name;
                        $information->save();
                    }
                }

                if($request->hasFile('icon_file')){
                    $fileInfo=fileInfo($request->icon_file);
                    $name=$information->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
                    $upload=fileUpload($request->icon_file,'system-images/icons',$name);
                    if($upload){
                        if(!empty($information->icon)){
                            fileDelete('system-images/icons/'.$information->icon);
                        }
                        $information->icon=$name;
                        $information->save();
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Saved Successfully',
                    'data' => $information
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
        return view('setups::systemInformation.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {   
        $pageTitle='System Information Edit';
        return view('setups::systemInformation.edit',compact('pageTitle'));
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
