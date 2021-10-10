<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
       
   return view('admin.home');
        
        
       
    }
    public function logout(){
        Auth::logout();
        $notification=array(
            'message'=>'Successfully Loggedout',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.login')->with($notification);
    }
    public function ChangePassword(){
        return view('admin.auth.passwordchange');
    }
    public function UpdatePassword(Request $request)
    {
        $password=Auth::user()->password;
        $oldpass=$request->oldpass;
        $newpass=$request->password;
        $confirm=$request->password_confirmation;
        if(Hash::check($oldpass,$password)){
            if($newpass===$confirm){
                $user=Admin::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                Auth::logout();
                $notification=array(
                    'message'=>'Password Changed Successfully ! Now Login with New Password',
                    'alert-type'=>'Success'
                );
                return Redirect()->route('admin.login')->with($notification);
            }
            else{
                $notification=array(
                    'message'=>'New password and Confirm Password not matched!',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }

        }
        else{
            $notification=array(
                'message'=>'Old Password not Matched!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }
}
