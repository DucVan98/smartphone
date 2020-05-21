<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class MemoryController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_memory_product(){
        $this->AuthLogin();
    	return view('admin.add_memory_product');
    }
    public function all_memory_product(){
        $this->AuthLogin();

    	$all_memory_product = DB::table('tbl_memory_product')->get();// lấy dữ liệu thuộc bảng rồi gán vào biến
    	$manager_memory_product = view('admin.all_memory_product')->with('all_memory_product',$all_memory_product);
    	return view('admin_layout')->with('admin.all_memory_product',$manager_memory_product);
    	    }
    public function save_memory_product(Request $request){
        $this->AuthLogin();

    	// khai báo chuỗi
    	$data = array();
    	$data['memory_name'] = $request->memory_product_name;
    	$data['memory_status'] = $request->memory_product_status;

    	// echo '<pre>';
    	// print_r($data);
    	// echo "</pre>";
    	DB::table('tbl_memory_product')->insert($data);
    	Session::put('message','Thêm danh mục thành công'); 
    	return Redirect::to('add-memory-product');
    }
    public function unactive_memory_product($memory_product_id){
        $this->AuthLogin();

    	DB::table('tbl_memory_product')->where('memory_id',$memory_product_id)->update(['memory_status'=>0]);
    	return Redirect::to('all-memory-product');
    }
    public function active_memory_product($memory_product_id){
        $this->AuthLogin();

    	DB::table('tbl_memory_product')->where('memory_id',$memory_product_id)->update(['memory_status'=>1]);
    	return Redirect::to('all-memory-product');
    }
    public function edit_memory_product($memory_product_id){
        $this->AuthLogin();

    	$edit_memory_product = DB::table('tbl_memory_product')->where('memory_id',$memory_product_id)->get();// dùng get là vì mặc định nó đã lấy gia giá trị id của 1 cái rồi nên không cần dùng first
    	$manager_memory_product = view('admin.edit_memory_product')->with('edit_memory_product',$edit_memory_product);
    	return view('admin_layout')->with('admin.edit_memory_product',$manager_memory_product);
    }
    public function update_memory_product(Request $request,$memory_product_id){
        $this->AuthLogin();

    	$data = array();
    	$data['memory_name'] = $request->memory_product_name;
    	DB::table('tbl_memory_product')->where('memory_id',$memory_product_id)->update($data);
    	Session::put('message','Cập nhật danh mục thành công'); 
    	return Redirect::to('all-memory-product');

    }
     public function delete_memory_product($memory_product_id){
        $this->AuthLogin();
        
     	DB::table('tbl_memory_product')->where('memory_id',$memory_product_id)->delete();
    	Session::put('message','Xóa danh mục thành công'); 
    	return Redirect::to('all-memory-product');
     }

}
