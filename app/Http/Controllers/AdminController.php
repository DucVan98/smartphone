<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
	public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function index(){
    	return view('admin_login');
    }
     public function show_admin(){
         
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $this->AuthLogin();
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
// lấy 1 bản ghi
    	$result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();  
    	  //test dữ liệu
    	  // echo '<pre>';
    	  // print_r($result);
    	  // echo '</pre>';
    	  // return view('admin.dashboard');	
    	  if($result){
    	  	Session::put('admin_name',$result->admin_name);
    	  	Session::put('admin_id',$result->admin_id);
    	  	return Redirect::to('/admin');
    	  }else{
    	  	Session::put('message','Tài khoản hoặc mật khâu không đúng! Vui lòng kiểm tra lại!');
    	  	return Redirect::to('/login');
    	  }
    	  
    }
    public function logout(){
         $this->AuthLogin();
    	Session::put('admin_name',null);
    		Session::put('admin_id',null);
    		return Redirect::to('/login');
    }
     public function user_registration(){
        $this->AuthLogin();
        $user_registration = DB::table('tbl_custumer')->get();
        $user_by_id = view('admin.user')->with('user_registration',$user_registration);
        return view('admin_layout')->with('admin.user',$user_by_id);
        
     }
     public function delete_user_registration($custumer_id){
        $this->AuthLogin();
        DB::table('tbl_custumer')->where('custumer_id',$custumer_id)->delete();
        return Redirect::to('user-registration');
     }
}
