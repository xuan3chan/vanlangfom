<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $productId=$request->productid_hidden;
        $quantity=$request->qty;
        $product_info=DB::table('tbl_product')->where('product_id',$productId)->first();

       
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        $data['id']=$product_info->product_id;
        $data['qty']=$quantity;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['weight']=1;
        $data['options']['image']=$product_info->product_image;
        Cart::add($data);// sử dụng lớp trong thư viện cart để add $data vào giỏ hàng
        return  Redirect::to('/show_cart');
    }
    public function show_cart(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product);

    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);//sử dụng thư viện cart khởi tạo thì 
        return Redirect::to('/show_cart');
    }
    public function update_cart_qty(Request $request){
        $rowId=$request->rowId_cart;
        $qty=$request->quantity_cart;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');
    }
}
