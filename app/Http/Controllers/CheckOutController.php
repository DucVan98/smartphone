<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CheckOutController extends Controller
{
      public function save_checkout_custumer(Request $request){
		$data= array();
     	$data['shipping_name'] = $request->shipping_name;
     	$data['shipping_email'] = $request->shipping_email;
     	$data['shipping_phone'] = $request->shipping_phone;
     	$data['shipping_address'] = $request->shipping_address;

     	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);

     	Session::put('shipping_id',$shipping_id);
     	return Redirect::to('/payment');
     }
     public function payment(){
       $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $color_product = DB::table('tbl_color_product')->orderby('color_id','desc')->get();

        $memory_product = DB::table('tbl_memory_product')->orderby('memory_id','desc')->get();

        return view('page.checkout.payment')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('color_product',$color_product)->with('memory_product',$memory_product);
     }
     public function order_place(Request $request){
          $cart = Session::get('cart');
        //insert payment
        $pay_data= array();
        $pay_data['payment_method'] = $request->payment_option;
        $pay_data['maypent_status'] ='đang chờ xử lý';

        $payment_id = DB::table('tbl_payment')->insertGetId($pay_data);
        //insert order
        $order_data= array();
        $order_data['shipping_id'] =Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::subtotal();
        $order_data['order_status'] = 'Đang chờ xử lý';

        $order_id = DB::table('tbl_order')->insertGetId($order_data);

         //insert order_detail
        $content = Cart::content();
        foreach($content as $v_content){
            $order_detail_data= array();
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] =$v_content->id;
            $order_detail_data['product_name'] = $v_content->name;
            $order_detail_data['product_price'] = $v_content->price;
            $order_detail_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_detail')->insertGetId($order_detail_data);
        }
        if($pay_data ['payment_method']==1){
            echo 'thanh toán băng thẻ atm';
        }
        else{
             $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $color_product = DB::table('tbl_color_product')->orderby('color_id','desc')->get();

        $memory_product = DB::table('tbl_memory_product')->orderby('memory_id','desc')->get();
        Session::forget('cart');
        return view('page.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)->with('color_product',$color_product)->with('memory_product',$memory_product);
        }
     }
}
