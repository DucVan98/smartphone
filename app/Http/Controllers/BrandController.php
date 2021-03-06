<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
    	return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
    	$all_brand_product = DB::table('tbl_brand_product')->get();// lấy dữ liệu thuộc bảng rồi gán vào biến
    	$manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    	    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();

    	// khai báo chuỗi
    	$data = array();
    	$data['brand_name'] = $request->brand_product_name;
    	$data['brand_desc'] = $request->brand_product_desc;
    	$data['brand_status'] = $request->brand_product_status;

    	// echo '<pre>';
    	// print_r($data);
    	// echo "</pre>";
    	DB::table('tbl_brand_product')->insert($data);
    	Session::put('message','Thêm danh mục thành công'); 
    	return Redirect::to('add-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();

    	DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
    	return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_product_id){
    	DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
    	return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();

    	$edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();// dùng get là vì mặc định nó đã lấy gia giá trị id của 1 cái rồi nên không cần dùng first
    	$manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
    	return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();

    	$data = array();
    	$data['brandy_name'] = $request->brand_product_name;
    	$data['brand_desc'] = $request->brand_product_desc;
    	DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
    	Session::put('message','Cập nhật thương hiệu thành công'); 
    	return Redirect::to('all-brand-product');

    }
     public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        
     	DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
    	Session::put('message','Xóa thương hiệu thành công'); 
    	return Redirect::to('all-brand-product');
     }
     //end backend 
     //action frontend
     public function show_brand_home($brand_id){
       $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $color_product = DB::table('tbl_color_product')->orderby('color_id','desc')->get();

        $memory_product = DB::table('tbl_memory_product')->orderby('memory_id','desc')->get();

        $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_product.brand_id',$brand_id)->get();

        $brand_name_id = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();
        return view('page.brand.show_brand')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('color_product',$color_product)->with('memory_product',$memory_product)->with('brand_by_id',$brand_by_id)->with('brand_name_id',$brand_name_id);
             }
}
