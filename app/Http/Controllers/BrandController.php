<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class BrandController extends Controller
{
    //

    public function allBrands(){
        $all_brands_info=DB::table('tbl-manufacture')->get();
        $manage_brands= view('backend.allbrands')
            ->with('brand_info', $all_brands_info);
        return view('admin_layout')->with('backend.allbrands',$manage_brands);

    }



    public function addBrands(){

        return view('backend.addbrands');
    }

    public function savebrand(Request $request){
        $data=array();
        $data['manufacture_name']=$request->brand_name;
        $data['manufacture_description']=$request->brand_description;
        $data['manufacture_public_status']=$request->publication_status;
        DB::table('tbl-manufacture')->insert($data);
        Session::put('message', 'Brand added sucessfully');
        return Redirect::to('/addBrands');
    }






    public function unActivebrand($brand_id){
        DB::table('tbl-manufacture')
            ->where('manufacture_id',$brand_id)
            ->update(['manufacture_public_status'=> 0]);
        Session::put('message','brand Unactive  successfully');
        return Redirect::to('/allBrands');
    }



    public function activebrand($brand_id){
        DB::table('tbl-manufacture')
            ->where('manufacture_id',$brand_id)
            ->update(['manufacture_public_status'=>1]);
        Session::put('message','brand Active successfully');
        return Redirect::to('/allBrands');
    }





    public function delete_brand($brand_id){
        DB::table('tbl-manufacture')->where('manufacture_id',$brand_id)->delete();
        return Redirect::to('/allBrands');
    }
}
