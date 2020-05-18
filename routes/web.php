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
//color product
Route::get('/add-color-product','ColorController@add_color_product');
Route::get('/all-color-product','ColorController@all_color_product');
Route::post('/save-color-product','ColorController@save_color_product');

Route::get('/edit-color-product/{color_product_id}','ColorController@edit_color_product');
Route::get('/delete-color-product/{color_product_id}','ColorController@delete_color_product');
Route::post('/update-color-product/{color_product_id}','ColorController@update_color_product');


// tình trạng
Route::get('/unactive-color-product/{color_product_id}','ColorController@unactive_color_product');
Route::get('/active-color-product/{color_product_id}','ColorController@active_color_product');
//end color product
//memory
Route::get('/add-memory-product','MemoryController@add_memory_product');
Route::get('/all-memory-product','MemoryController@all_memory_product');
Route::post('/save-memory-product','MemoryController@save_memory_product');

Route::get('/edit-memory-product/{memory_product_id}','MemoryController@edit_memory_product');
Route::get('/delete-memory-product/{memory_product_id}','MemoryController@delete_memory_product');
Route::post('/update-memory-product/{memory_product_id}','MemoryController@update_memory_product');


// tình trạng
Route::get('/unactive-memory-product/{memory_product_id}','MemoryController@unactive_memory_product');
Route::get('/active-memory-product/{memory_product_id}','MemoryController@active_memory_product');
//end memory
//product
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');
Route::post('/save-product','ProductController@save_product');
//sửa xóa  thêm
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::post('/update-amount/{product_id}','ProductController@update_amount');
//------------------
// tình trạng
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
//emd_product
//endbackend