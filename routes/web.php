<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//fontend
Route::get('/', 'homecontroller@index');
Route::get('/trang-chu','homecontroller@index');

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}','categoryproduct@show_category_home');
//show tat ca san pham
Route::get('/tat-ca-san-pham','categoryproduct@show_all_product');





//backend
Route::get('/admin','admincontroller@index');
Route::get('/dashboard','admincontroller@show_dashboard');
Route::get('/logout','admincontroller@logout');
Route::post('/admin-dashboard','admincontroller@dashboard');

//category product
Route::get('/add-category-product', 'categoryproduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}', 'categoryproduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'categoryproduct@delete_category_product');
Route::get('/all-category-product','categoryproduct@all_category_product');
Route::get('/unactive-category-product/{category_product_id}','categoryproduct@active_category_product');
Route::get('/active-category-product/{category_product_id}','categoryproduct@unactive_category_product');

Route::post('/save-category-product','categoryproduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','categoryproduct@update_category_product');

//product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@active_product');
Route::get('/active-product/{product_id}','ProductController@unactive_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');

//cart
Route::post('/update-cart-qty','CartController@update_cart_qty');
Route::post('/save-cart','CartController@save_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
//check out
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
//manager order 
Route::get('/manager-order','CheckoutController@manager_order');
Route::get('/view-order/{orderId}','CheckoutController@view_order');
Route::get('/delete-order/{orderId}','CheckoutController@delete_order');










