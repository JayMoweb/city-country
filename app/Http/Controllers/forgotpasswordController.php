<?php

namespace App\Http\Controllers;
use App\Mail\QueueEmail;
use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;
use session;
use auth;
use Validator;
use Carbon\Carbon;
use App\Models\User;
use Str;

class forgotpasswordController extends Controller
{
    //
    public function create(User $user,request $request) {

        $request->validate([
            'firstname' =>'required',
            'lastname'  => 'required',
            'email'    =>'required',
            'password' =>'required',
            'confirmpassword' =>'required'
        ]);
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

    public function sendEmail(Request $request) {
    	$request->validate([
    		'email' =>'required'
    	]);

    	 $email = DB::table('users')->select('email')->pluck('email')->first();
        
    	 if ($request->input('email')  != $email) {
    	 	return back()->with('error','your filed not correct');
    	 }else{

            $token = Str::random(18);
            $resetPassword = DB::table('password_resets')->insert([
                'email' =>$request->email,
                'token' =>$token
            ]);

            $sendEmail = (new QueueEmail($token))->delay(Carbon::now()->addMinutes(1));
            Mail::to($request->email)->send($sendEmail);
    	    return view('forgotPassword');
         }  
    } 

    public function updatePassword(request $request,$token) {
        $isValidToken =  DB::table('password_resets')->where('token',$token)->select('email','token')->first();
        if (!empty($isValidTokentoken->token) == $token) {
    	   return view('confirmpassword',['token' =>$token]);            
        }else{
            return abort(404);
        }
        
    }

    public function saveUpdatePasssword(request $request,$token) {
    	if ($request->newpassword != $request->confirmpassword) {
    		return back()->with('error','password and confirm password not same');
    	}
        $email =  DB::table('password_resets')->where('token',$token)->select('email','token')->get();
    	$user = DB::table('users')
    	 		->where('email', $email[0]->email)
                ->update(['password' => Hash::make($request->newpassword)]);
        $delete = DB::table('password_resets')->where('token',$token)->delete();
        return redirect('loginCustom');
   		}
        

    public function loginCustom(request $request) {

    	$loginData = $request->validate([
    		"email" => 'required|email',
    		"password" => 'required'
    	]);
    	if (auth::attempt($loginData)) {
    			return redirect('dashboard')->with('success','Successfully');
    	}else{
	    	return back()->with('error','Enter correct credentials');
    	}
    	return view('loginCustom');
    }

    public function logoutCustom(request $request) {
    	Auth::logout();
    	 $request->session()->invalidate();
    	$request->session()->regenerateToken();
    	return view('loginCustom');
    }
}
