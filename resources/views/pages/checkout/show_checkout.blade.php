@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="red"><a href="{{ URL::to('/trang-chu') }}" class="active">Home</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>

        <div class="register-req">
            <p>Đăng ký hoặc đăng nhập để mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">

                <div class="col-sm-15 clearfix">
                    <div class="bill-to">
                        <p>Thông tin gửi hàng</p>
                        <div class="form-one">
                            <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" required="" name="shipping_email" placeholder="Email">
                                <input type="text" required="" name="shipping_name" placeholder="Họ và tên">
                                <input type="text" required="" name="shipping_address" placeholder="Địa chỉ">
                                <input type="text" required="" name="shipping_phone" placeholder="Số điện thoại">
                                <textarea name="message" name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                                <input class="btn btn-primary btn-sm" type="submit" name="send_order" value="Xác nhận thanh toán">
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div>
            <h2 style="font-weight:300">Xem lại giỏ hàng</h2>
        </div>

        <div class="table-responsive cart_info">
            <?php $content = Cart::content(); ?>
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
                    @php
                    $totalPrice = 0; // Initialize total price
                    @endphp
                    @foreach($content as $v_content)
                    @php
                    $subtotal = $v_content->price * $v_content->qty;
                    $totalPrice += $subtotal; // Add current product subtotal to total price
                    @endphp
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ URL::to('public/uploads/product/'.$v_content->options->image) }}" width="25%" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h3>{{ $v_content->name }}</h3>
                            <h5 style="text-align:justify">Giá sản phẩm: {{ $v_content->price }} VND</h5>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{ URL::to('/update-cart-qty') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input class="cart_quantity_input" type="text" name="quantity_cart" value="{{ $v_content->qty }}" size="2">
                                    <input style="margin-left:-40px;position:relative" class="btn btn-default btn-sm" type="submit" name="update_qty" value="Cập nhật">
                                    <input class="form-control" type="hidden" name="rowId_cart" value="{{ $v_content->rowId }}">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <h3>{{ number_format($subtotal) }} VND</h3>
                        </td>
                        <td class="cart_delete" style="text-align:center">
                            <a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/'.$v_content->rowId) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="2">
                            <h4 style="font-weight: 600; text-align: right;">Tổng cộng: {{ number_format($totalPrice) }} VND</h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</section> <!--/#cart_items-->

@endsection
