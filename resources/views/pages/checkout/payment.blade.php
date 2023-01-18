@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
        <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li class="red"><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			
		
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
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
								<h4><a href="">{{$v_content->name}}</a></h4>
								<h4>Gia tien:{{$v_content->price}}</h4>

							</td>
						
							
							
							<td class="cart_quantity">
							<td class="cart_quantity" style="text-align:center">
								<div class="cart_quantity_button"  >
									<form action="{{URL::to('/update-cart-qty')}}" method="POST">
									{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$v_content->qty}}"  size="2">
									<input class="btn btn-default btn-sm" type="submit" name="update_qty" value="Cập nhật" >
									<input class="form-control" type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" >
									</form>

								</div>
							</td>
							<td class="cart_total">
							<h3><?php $subtotal=$v_content->price*$v_content->qty;
							echo number_format($subtotal).'.VND'?></h3>
							</td>
							
							</td>
							<td class="cart_delete" style="text-align:center">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<h4 style="margin: 50px;margin-left: 10px;font-size:20px">Chọn hình thức thanh toán:</h4>
            <form method="POST" action="{{URL::to('/order-place')}}">
                {{csrf_field()}}
			<div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="radio">Thanh toán bằng thẻ ATM</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="radio"> Thanh toán bằng tiền mặt</label>
					</span>
                    <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
					
				</div>
            </form>
		</div>
	</section> <!--/#cart_items-->

@endsection