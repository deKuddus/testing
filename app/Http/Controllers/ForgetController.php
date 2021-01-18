<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Modules\Reseller\Entities\ResellerModel;
use \Modules\Customer\Entities\Customer;
use \App\User;
use Session;
use DB;
use Str;

class ForgetController extends Controller
{
    
    #Send email for forget password

    public function sendmailtouser(Request $request)
    {
    	
    	$input = $request->all();

        if($input['email'] !='' && $input['user_type'] !=''){
            if ($input['user_type']=='reseller') {
                $findEmail=ResellerModel::where('email',$input['email'])->first();

                $model=DB::table('users')
                ->where('email',$input['email'])
                ->where('reseller_id',$findEmail->id)
                ->update(['remember_token' => md5(Str::random(10)) ]);

                $user = DB::table('users')
                ->where('email',$input['email'])
                ->where('reseller_id',$findEmail->id)
                ->first();

            }elseif($input['user_type']=='user'){
                 $findEmail=Customer::where('email',$input['email'])->first();

                 $model=DB::table('users')
                 ->where('users.email',$input['email'])
                 ->where('customer_id',$findEmail->id)
                 ->update(['remember_token' => md5(Str::random(10)) ]);

                 $user = DB::table('users')
                 ->where('email',$input['email'])
                 ->where('customer_id',$findEmail->id)
                 ->first();
            }

            if($user !=''){

                $mail_body = \Illuminate\Support\Facades\View::make('emails._password_email_template', ['user_data'=> $user,'type'=>$input['user_type']]);
                $contents = $mail_body->render();

                $send_mail = \App\Helpers\SendMail::fire($user->email, 'Reset Password Link from Vpn', $contents, '');
                if ($send_mail) {
                    # code...
                    Session::flash('success', 'Please Check Your Email, and follow those instruction.');
                }

                return redirect()->back();

            }else{

                Session::flash('danger', "Email Not Found.");
            }
        }else{

             Session::flash('danger', "Email Or Type Are Empty.");
        }

        
      

        return redirect()->back();
    }

    public function change_form($type,$slug)
    {
        $pageTitle = 'Forget Password';

        $data = User::where('users.remember_token', $slug)
                        ->select('users.*')
                        ->first();

        if (empty($data->remember_token)){

                Session::flash('danger', "Token not found.");
                return redirect('/');
        }else{

        	return view('auth.forget.reset', [
                'pageTitle' => $pageTitle,
                'data' => $data,
                'type' => $type,
               
            ]);
        } 
        
    }

     public function save_chage_password(Request $request){

        
        $input = $request->all();
        
        $check_password = $input['password'] === $input['password_confirmation'];
        if($check_password){

            if ($input['type']=='reseller') {

                $findEmail=ResellerModel::where('email',$input['email'])->first();

                $model=DB::table('users')
                    ->where('users.remember_token',$input['remember_token'])
                    ->where('users.email',$input['email'])
                    ->where('users.reseller_id',$findEmail->id)
                    ->update([
                        'password' => bcrypt($input['password']),
                        'remember_token' =>'',  
                    ]);

                $user = ResellerModel::where('email',$input['email'])
                ->where('id',$findEmail->id)
                ->update([
                    'email' => $input['email'],
                    'password' =>$input['password']  
                ]);

            }elseif($input['type']=='user'){

                 $findEmail=Customer::where('email',$input['email'])->first();

                 $model=DB::table('users')
                    ->where('users.remember_token',$input['remember_token'])
                    ->where('users.email',$input['email'])
                    ->where('users.customer_id',$findEmail->id)
                    ->update([
                        'password' => bcrypt($input['password']),
                        'remember_token' =>'',  
                    ]);

                $user = Customer::where('email',$input['email'])
                ->where('id',$findEmail->id)
                ->update([
                    'email' => $input['email'],
                    'password' =>$input['password']  
                ]);
            }

            if($user){

                Session::flash('success', "Password changed successfully.");
                return redirect('/');
            }else{
                Session::flash('danger', "Unable to change password.");
            }
        }else{
            Session::flash('danger', "Do not match confirm password");
        }

        return redirect()->back();

    } 


}
