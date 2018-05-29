<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;

class CategoryController extends Controller
{
    //

    public function addCategory(){

        return view('backend.addcategory');
    }


    public function allCategory(){
        $all_category_info=DB::table('tbl-category')->get();
       $manage_category= view('backend.allcaategory')
           ->with('category_info',$all_category_info);
       return view('admin_layout')->with('backend.allcaategory',$manage_category);
    }


    public function savecategory(Request $request){
        $data=array();

       // $data['category_id']= $request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['public_status']=$request->publication_status;
        DB::table('tbl-category')->insert($data);
        Session::put('message', 'Category added sucessfully');

        return Redirect::to('/addCategory');


    }


    public function unActivecategory($category_id){

    DB::table('tbl-category')
    ->where('id',$category_id)
    ->update(['public_status'=> 0]);
    Session::put('message','Category Unactive  successfully');
    return Redirect::to('/allCategory');
}



    public function activecategory($category_id){

    DB::table('tbl-category')
    ->where('id',$category_id)
    ->update(['public_status'=>1]);
    Session::put('message','Category Active successfully');
   
    return Redirect::to('/allCategory');
}



public function ecategory($category_id){

  $edit_category_info=DB::table('tbl-category')
                      ->where('id',$category_id)->first();
       $edit_category= view('backend.editCategory')
           ->with('category_edit',$edit_category_info);
       return view('admin_layout')->with('backend.editCategory',$edit_category);



   // return view('/backend.editCategory');
}



public function editcategory($category_id){
echo $category_id;
}


public function delete_category($category_id){
   DB::table('tbl-category')->where('id',$category_id)->delete();
   return Redirect::to('/allCategory');
}

}
