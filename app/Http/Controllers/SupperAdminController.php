<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class SupperAdminController extends Controller
{
    //
    public function logout(){
        Session::put('admin_email',null);
        Session::put('admin_password',null);


        return Redirect::to('/admin');

    }




    public function index(){
        $this->authCheck();

        return view('backend.admin_dashboard');
    }


    public function authCheck(){
        $admin_auth=Session::get('admin_id');
        if ($admin_auth){
            return ;
        }else{
            return Redirect::to('/admin')->send();
        }
    }
}
