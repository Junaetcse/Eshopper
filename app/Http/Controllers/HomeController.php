<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function index(){

            $all_publish_product=DB::table('tbl_products')
                ->join('tbl-category','tbl_products.category_id','=','tbl-category.id')
                ->join('tbl-manufacture','tbl_products.manufacture_id','=','tbl-manufacture.manufacture_id')
                ->where('publication_status',1)
                ->limit(3)
                ->get();
            $publish_product= view('pages.home_content')
                ->with('publish_product',$all_publish_product);
            return view('layout')->with('pages.home_content',$publish_product);

        //return view('pages.home_content');
    }



    public function product_by_category($id){

        $product_by_category=DB::table('tbl_products')
            ->join('tbl-category','tbl_products.category_id','=','tbl-category.id')
            ->join('tbl-manufacture','tbl_products.manufacture_id','=','tbl-manufacture.manufacture_id')
            ->where('tbl-category.id',$id)
            ->get();
        $publish_product_by_category= view('pages.product_by_category')
            ->with('product_category',$product_by_category);
        return view('layout')->with('pages.product_by_category',$publish_product_by_category);
    }




    public function product_details($product_id){
        $product_details=DB::table('tbl_products')
            ->join('tbl-category','tbl_products.category_id','=','tbl-category.id')
            ->where('tbl_products.product_id',$product_id)
            ->where('publication_status',1)
            ->first();
        $publish_product_details= view('pages.product_details')
            ->with('publish_product_details',$product_details);
        return view('layout')->with('pages.product_details',$publish_product_details);


    }
}
