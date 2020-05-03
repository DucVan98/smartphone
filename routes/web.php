<?php

use Illuminate\Support\Facades\Route;

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
//frontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::get('/blog-page','HomeController@blog');
Route::get('/contact','HomeController@contact');
//end frontend

//backend
Route::get('/login','AdminController@index');
Route::get('/admin','AdminController@show_admin');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//category_product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');

Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');


// tình trạng sản phẩm
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
//end category_product
//brand_product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');//lưu dữ liệu vừa nhập từ form vào sql
//--------------
//sửa xóa 
Route::get('/edit-brand-product/{brand_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_id}','BrandProduct@delete_brand_product');
Route::post('/update-brand-product/{brand_id}','BrandProduct@update_brand_product');
//------------------
// tình trạng
Route::get('/unactive-brand-product/{brand_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_id}','BrandProduct@active_brand_product');
//end_brand_product
//endbackend