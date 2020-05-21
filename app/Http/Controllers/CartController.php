<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        // die($request['id']);
        $productId = $request->productid_hidden;
        $quatity = $request->qty;
        $product_info = DB::table('tbl_product')->where('prudct_id', $productId)->first();

        $data['id'] = $product_info->prudct_id;
        $data['qty'] = $quatity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
        // Cart::destroy();

    }
    public function show_cart()
    {
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();

        $color_product = DB::table('tbl_color_product')->orderby('color_id', 'desc')->get();

        $memory_product = DB::table('tbl_memory_product')->orderby('memory_id', 'desc')->get();
        return view('page.cart.show_cart')->with('cate_product', $cate_product)->with('brand_product', $brand_product)->with('color_product', $color_product)->with('memory_product', $memory_product);
    }
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantyti(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantyti;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['prudct_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'prudct_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'prudct_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart', $cart);
        }

        Session::save();
    }

    public function gio_hang()
    {
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();

        $color_product = DB::table('tbl_color_product')->orderby('color_id', 'desc')->get();

        $memory_product = DB::table('tbl_memory_product')->orderby('memory_id', 'desc')->get();
        return view('page.cart.cart_ajax')->with('cate_product', $cate_product)->with('brand_product', $brand_product)->with('color_product', $color_product)->with('memory_product', $memory_product);
    }
}
