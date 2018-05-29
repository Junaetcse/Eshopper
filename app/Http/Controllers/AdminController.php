<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\support\Facades\Redirect;

class AdminController extends Controller
{
    //



    public function index(){
    	return view('admin_login');
    }



    public function dashboard(){
    	return view('backend.admin_dashboard');
    }


    public function login_dashboard(Request $request){

      $admin_email=$request->admin_email;
      $admin_password=$request->admin_password;
      $login=DB::table('tbl_admin')
          ->where('admin_email',$admin_email)
          ->where('admin_password',$admin_password)
          ->first();
  

if ($login) {
        Session::put('admin_email', $login->admin_email);
        Session::put('admin_password', $login->admin_password);
        Session::put('name', $login->name);
        Session::put('admin_id',$login->admin_id);
        return Redirect::to('/dashboard');

        # code...
    }else{

	Session::put('message','Email or password invalid');
	return Redirect::to('/admin');
}

    
    }




























}

