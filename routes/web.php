<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/h', function () {
    return view('pages.product_by_category');
});




Route::get('/','HomeController@index');
Route::get('/product_by_category/{id}','HomeController@product_by_category');
Route::get('/product_details/{product_id}','HomeController@product_details');







Route::get('/admin','AdminController@index');
Route::get('/dashboard','SupperAdminController@index');
Route::post('/login_dashboard','AdminController@login_dashboard');
Route::get('/logout','SupperAdminController@logout');


//Category

Route::get('/addCategory','CategoryController@addCategory');
Route::get('/allCategory','CategoryController@allCategory');
Route::get('/update-category/{id}','CategoryController@updatecategory');
Route::post('/save-category','CategoryController@savecategory');
Route::get('/UnActive-category/{id}','CategoryController@unActivecategory');
Route::get('/Active-category/{id}','CategoryController@activecategory');


Route::get('/eCategory/{id}','CategoryController@ecategory');
Route::post('/edit-category/{id}','CategoryController@editcategory');
Route::get('/delete-Category/{id}','CategoryController@delete_category');




//Controller for Brands
Route::get('/allBrands','BrandController@allBrands');
Route::get('/addBrands','BrandController@addBrands');
Route::post('/save-brand','BrandController@savebrand');
Route::get('/UnActive-brand/{id}','BrandController@unActivebrand');
Route::get('/Active-brand/{id}','BrandController@activebrand');
Route::get('/delete-brand/{id}','BrandController@delete_brand');



//Controller for products

Route::get('/addProducts','ProductController@addProducts');
Route::post('/save-product','ProductController@saveProduct');
Route::get('/allProducts','ProductController@allProducts');
Route::get('/UnActive-product/{id}','ProductController@unActiveproduct');
Route::get('/Active-product/{id}','ProductController@activeproduct');
Route::get('/delete-product/{id}','ProductController@deleteproduct');