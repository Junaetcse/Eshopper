<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
class ProductController extends Controller
{
    //


    public function addProducts(){

        return view('backend.addproduct');
    }



    public function saveProduct(Request $request){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['publication_status']=$request->publication_status;
        $image=$request->file('product_image');

        if ($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success){
                $data['product_image']=$image_url;
                DB::table('tbl_products')->insert($data);
                Session::put('message','Product added successfully !!');
                return Redirect::to('/addProducts');
            }
        }
        $data['product_image']='';
        DB::table('tbl_products')->insert($data);
        Session::put('message','Product added successfully !!');
        return Redirect::to('/addProducts');
    }







    public function allProducts(){
        $all_product_info=DB::table('tbl_products')
            ->join('tbl-category','tbl_products.category_id','=','tbl-category.id')
            ->join('tbl-manufacture','tbl_products.manufacture_id','=','tbl-manufacture.manufacture_id')
            ->get();
        $manage_product= view('backend.allproduct')
            ->with('product_info',$all_product_info);
        return view('admin_layout')->with('backend.allproduct',$manage_product);
        }




        public function unActiveproduct($product_id){
            DB::table('tbl_products')
                ->where('product_id',$product_id)
                ->update(['publication_status'=> 0]);
            Session::put('message','Product Unactive  successfully');
            return Redirect::to('/allProducts');
        }



    public function activeproduct($product_id){
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update(['publication_status'=>1]);
        Session::put('message','Product Active successfully');
        return Redirect::to('/allProducts');
    }



    public function deleteproduct($product_id){
        DB::table('tbl_products')->where('product_id',$product_id)->delete();
        return Redirect::to('/allProducts');
    }

}
