<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ColorController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_color_product(){
        $this->AuthLogin();
    	return view('admin.add_color_product');
    }
    public function all_color_product(){
        $this->AuthLogin();

    	$all_color_product = DB::table('tbl_color_product')->get();// lấy dữ liệu thuộc bảng rồi gán vào biến
    	$manager_color_product = view('admin.all_color_product')->with('all_color_product',$all_color_product);
    	return view('admin_layout')->with('admin.all_color_product',$manager_color_product);
    	    }
    public function save_color_product(Request $request){
        $this->AuthLogin();

    	// khai báo chuỗi
    	$data = array();
    	$data['color_name'] = $request->color_product_name;
    	$data['color_desc'] = $request->color_product_desc;
    	$data['color_status'] = $request->color_product_status;

    	// echo '<pre>';
    	// print_r($data);
    	// echo "</pre>";
    	DB::table('tbl_color_product')->insert($data);
    	Session::put('message','Thêm danh mục thành công'); 
    	return Redirect::to('add-color-product');
    }
    public function unactive_color_product($color_product_id){
        $this->AuthLogin();

    	DB::table('tbl_color_product')->where('color_id',$color_product_id)->update(['color_status'=>0]);
    	return Redirect::to('all-color-product');
    }
    public function active_color_product($color_product_id){
        $this->AuthLogin();

    	DB::table('tbl_color_product')->where('color_id',$color_product_id)->update(['color_status'=>1]);
    	return Redirect::to('all-color-product');
    }
    public function edit_color_product($color_product_id){
        $this->AuthLogin();

    	$edit_color_product = DB::table('tbl_color_product')->where('color_id',$color_product_id)->get();// dùng get là vì mặc định nó đã lấy gia giá trị id của 1 cái rồi nên không cần dùng first
    	$manager_color_product = view('admin.edit_color_product')->with('edit_color_product',$edit_color_product);
    	return view('admin_layout')->with('admin.edit_color_product',$manager_color_product);
    }
    public function update_color_product(Request $request,$color_product_id){
        $this->AuthLogin();

    	$data = array();
    	$data['color_name'] = $request->color_product_name;
    	$data['color_desc'] = $request->color_product_desc;
    	DB::table('tbl_color_product')->where('color_id',$color_product_id)->update($data);
    	Session::put('message','Cập nhật danh mục thành công'); 
    	return Redirect::to('all-color-product');

    }
     public function delete_color_product($color_product_id){
        $this->AuthLogin();
        
     	DB::table('tbl_color_product')->where('color_id',$color_product_id)->delete();
    	Session::put('message','Xóa danh mục thành công'); 
    	return Redirect::to('all-color-product');
     }

}
