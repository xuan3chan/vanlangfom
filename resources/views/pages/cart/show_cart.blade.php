@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li class="red"><a href="{{URL::to('/trang-chu')}}" class="active">Home</a></li>
				  <li class="active">Giỏ hàng của bạn</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php $content=Cart::content();
				
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="total" width="30%">Hình ảnh</td>
							<td class="name">Tên sản phẩm</td>
							<td class="description"></td>
					
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product" >
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="25%" alt="" /></a>
							</td>
							
							<td class="cart_description">
								<h3>{{$v_content->name}}</h3>
								<h4 style="text-align:justify">{{$v_content->price}} VND</h4>

							</td>
						
							
							
							<td class="cart_quantity">
							<td class="cart_quantity" style="text-align:center">
								<div class="cart_quantity_button"  >
									<form action="{{URL::to('/update-cart-qty')}}" method="POST">
									{{csrf_field()}} 
									<input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$v_content->qty}}"  size="2">
									<input style="margin-left:-20px;position:relative" class="btn btn-default btn-sm" type="submit" name="update_qty" value="Cập nhật" >
									<input class="form-control" type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" >
									</form>

								</div>

							</td>
							
							<td class="cart_total">
							<h3><?php $subtotal=$v_content->price*$v_content->qty;
							echo number_format($subtotal).' VND'?></h3>
							</td>
							
							</td>
							<td class="cart_delete" style="text-align:center">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
			

						</tr>
						@endforeach
					
					</tbody>
				</table>
				<a class="btn btn-default check_out" href="{{URL::to('/trang-chu')}}">Quay lại mua thêm sản phẩm</a>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Thanh toán</h3>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::priceTotal()}} VND</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::subtotal()}} VND</span></li>
						</ul>
						<?php $customer_id=Session::get('customer_id');
									if ($customer_id!=NULL){
								?>
									<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>


								<?php 
									}else{
										?>
										<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>

										<?php 
									}
									?>	
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection