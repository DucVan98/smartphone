<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
    	return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();

    	$all_category_product = DB::table('tbl_category_product')->get();// lấy dữ liệu thuộc bảng rồi gán vào biến
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    	    }
    public function save_category_product(Request $request){
        $this->AuthLogin();

    	// khai báo chuỗi
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	$data['category_status'] = $request->category_product_status;

    	// echo '<pre>';
    	// print_r($data);
    	// echo "</pre>";
    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message','Thêm danh mục thành công'); 
    	return Redirect::to('add-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();

    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
    	return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();

    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
    	return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();

    	$edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();// dùng get là vì mặc định nó đã lấy gia giá trị id của 1 cái rồi nên không cần dùng first
    	$manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
    	return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();

    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
    	Session::put('message','Cập nhật danh mục thành công'); 
    	return Redirect::to('all-category-product');

    }
     public function delete_category_product($category_product_id){
        $this->AuthLogin();
        
     	DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
    	Session::put('message','Xóa danh mục thành công'); 
    	return Redirect::to('all-category-product');
     }


     // kết thúc hàm viết code backend
     //bắt đầu viết frontend
     
}
