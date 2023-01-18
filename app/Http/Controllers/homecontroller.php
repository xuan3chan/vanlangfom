<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class homecontroller extends Controller
{
    public function index(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        // $all_category_product=DB::table('tbl_category_product')->get();
        // $manager_category_product=view('admin.all_category_product')->with('all_category_product',$all_category_product);
        $all_product=DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(3)->get();
        $all_cate_product=DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();

        return view('pages.home')->with('category',$cate_product)->with('all_product',$all_product)->with('all_cate_product',$all_cate_product);
    }

}
