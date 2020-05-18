<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
	public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();

    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

    	$color_product = DB::table('tbl_color_product')->orderby('color_id','desc')->get();

    	$memory_product = DB::table('tbl_memory_product')->orderby('memory_id','desc')->get();

    	
		return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('color_product',$color_product)->with('memory_product',$memory_product);
    }
    public function all_product(){
        $this->AuthLogin();

    	$all_product = DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
    	->join('tbl_color_product','tbl_color_product.color_id','=','tbl_product.color_id')
    	->join('tbl_memory_product','tbl_memory_product.memory_id','=','tbl_product.memory_id')
    	->orderby('tbl_product.prudct_id','desc')
    	->get();// lấy dữ liệu thuộc bảng rồi gán vào biến
    	$manager_product = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product',$manager_product);
    	    }
    public function save_product(Request $request){
        $this->AuthLogin();

    	// khai báo chuỗi
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_amount'] = $request->product_amount;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['color_id'] = $request->product_color;
    	$data['memory_id'] = $request->product_memory;

    	$data['product_status'] = $request->product_status;
    	$get_image = $request->file('product_image');
		if($get_image){
			$get_name_image = $get_image->getClientOriginalName();
			$name_image = current(explode(',',$get_name_image));
			$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
						$get_image ->move('public/uploat/product/',$new_image);
			$data['product_image'] = $new_image;
			DB::table('tbl_product')->insert($data);
			return Redirect::to('all-product');
		}
		$data['product_image'] = '';
		DB::table('tbl_product')->insert($data);
		Session::put('message','thêm sản phẩm thành công');
		return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();

    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    	return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();

    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    	return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();

    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

    	$color_product = DB::table('tbl_color_product')->orderby('color_id','desc')->get();

    	$memory_product = DB::table('tbl_memory_product')->orderby('memory_id','desc')->get();

    	$edit_product = DB::table('tbl_product')->where('prudct_id',$product_id)->get();// dùng get là vì mặc định nó đã lấy gia giá trị id của 1 cái rồi nên không cần dùng first
    	$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('color_product',$color_product)->with('memory_product',$memory_product);
    	return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();

    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_amount'] = $request->product_amount;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['color_id'] = $request->product_color;
    	$data['memory_id'] = $request->product_memory;
    	$data['product_status'] = $request->product_status;
    	$get_image = $request->file('product_image');
		if($get_image){
			$get_name_image = $get_image->getClientOriginalName();
			$name_image = current(explode(',',$get_name_image));
			$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
						$get_image ->move('public/uploat/product/',$new_image);
			$data['product_image'] = $new_image;
			DB::table('tbl_product')->where('prudct_id',$product_id)->update($data);
			return Redirect::to('all-product');

		}
		DB::table('tbl_product')->where('product_id',$product_id)->update($data);
		Session::put('message','Cập nhật sản phẩm thành công');
		return Redirect::to('all-product');

    }
     public function delete_product($product_id){
        $this->AuthLogin();

     	DB::table('tbl_product')->where('prudct_id',$product_id)->delete();
    	Session::put('message','Xóa sản phẩm thành công'); 
    	return Redirect::to('all-product');
     }
     //end backend
     //action frontend
     public function details_product($product_id){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

    	$color_product = DB::table('tbl_color_product')->orderby('color_id','desc')->get();

    	$memory_product = DB::table('tbl_memory_product')->orderby('memory_id','desc')->get();

        $detail_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.prudct_id',$product_id)->get();// lấy dữ liệu thuộc bảng rồi gán vào biến
        foreach($detail_product as $key => $value){
            $category_id = $value->category_id;
        }
        $relate_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.prudct_id',[$product_id])->get();

        //hàm whereNotIn('tbl_product.product_id',[$product_id]) dùng để loại bỏ sản phẩm đã hiển thị bên trên rồi bên dưới phần sản phẩm liên quan
        return view('pages.sanpham.show_detali')->with('category',$cate_product)->with('brand',$brand_product)->with('detail_product',$detail_product)->with('relate_product',$relate_product);
     }
}
