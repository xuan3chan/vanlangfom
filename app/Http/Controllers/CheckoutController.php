<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
           return Redirect::to('dashboard');
        }else{
           return Redirect::to('admin')->send();
        }

    } 
    public function login_checkout(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product);
    }
    public function add_customer(Request $request){
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;
        $customer_id=DB::table('tbl_customers')->insertGetId($data);
        session::put('customer_id',$customer_id);
        session::put('customer_name',$request->customer_name);
        return Redirect('/');

    }
    public function checkout(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.checkout.show_checkout')->with('category',$cate_product);
    }
    public function save_checkout_customer(Request $request){
        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_notes']=$request->shipping_notes;
        $data['shipping_phone']=$request->shipping_phone;
        $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
        session::put('shipping_id',$shipping_id);
        return Redirect('/payment');
    }
    public function order_place(Request $request){
        //insert  payment_method
        $data=array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']='Đang chờ xử lý';
        $payment_id=DB::table('tbl_payment')->insertGetId($data);
        //insert order
        $order_data=array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Cart::pricetotal();
        $order_data['order_status']='Đang chờ xử lý';
        $order_id=DB::table('tbl_order')->insertGetId($order_data);
        //insert order_de
        $content=Cart::content();
        foreach($content as $v_content){
        $order_de_data['order_id']=$order_id;
        $order_de_data['product_id']=$v_content->id;
        $order_de_data['product_name']=$v_content->name;
        $order_de_data['product_price']=$v_content->price;
        $order_de_data['product_qty']=$v_content->qty;

        DB::table('tbl_order_de')->insert($order_de_data);
        }
        if($data['payment_method']==1){
            Cart::destroy();
            echo'thẻ atm';
        }else{
            Cart::destroy();
            $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            return view('pages.checkout.handcheckout')->with('category',$cate_product);
       

        }
    }
    public function payment(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.checkout.payment')->with('category',$cate_product);
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function login_customer(Request $request){
        $email=$request->email_account;
        $password=md5($request->password_account);
        $resutl=DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($resutl){
        Session::put('customer_id',$resutl->customer_id);
        return Redirect::to('/checkout');
        }else{
        return Redirect('/login-checkout');
        }

    }
    public function manager_order(){
        
        $this->AuthLogin();
        $all_order=DB::table('tbl_order')->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order=view('admin.manager_order')->with('all_order',$all_order);

        return view('admin_layout')->with('admin.manager_order',$manager_order);
        
    }
    public function delete_order($orderId){
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$orderId)->delete();
        Session::put('message','xóa danh mục thành công !');
        $all_order=DB::table('tbl_order')->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order=view('admin.manager_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manager_order',$manager_order);    
    }
    public function view_order($orderId){
      
        
            $this->AuthLogin();
            $order_by_id=DB::table('tbl_order')
            ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->join('tbl_order_de','tbl_order.customer_id','=','tbl_order_de.order_id')
            ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_de.*')->first();
            $manager_order_by_id=view('admin.view_order')->with('order_by_id',$order_by_id);
    
            return view('admin_layout')->with('admin.manager_order',$manager_order_by_id);
            
        return view('admin.view_order');

    }
}
