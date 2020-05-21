<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

    	$color_product = DB::table('tbl_color_product')->orderby('color_id','desc')->get();

    	$memory_product = DB::table('tbl_memory_product')->orderby('memory_id','desc')->get();

    	$all_product = DB::table('tbl_product')->orderby('prudct_id','desc')->get();

    	return view('page.home')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('color_product',$color_product)->with('memory_product',$memory_product)->with("all_product",$all_product);
    }
    public function all_product(){
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

    	$color_product = DB::table('tbl_color_product')->orderby('color_id','desc')->get();

    	$memory_product = DB::table('tbl_memory_product')->orderby('memory_id','desc')->get();

    	$all_product = DB::table('tbl_product')->orderby('prudct_id','desc')->get();

    	return view('page.sanpham.all_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('color_product',$color_product)->with('memory_product',$memory_product)->with("all_product",$all_product);
    }
}
