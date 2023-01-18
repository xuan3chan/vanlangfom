@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">

    </div>
    <div class="table-responsive">
    <p style="color:green;font-size:11pt">                  <?php
                                $message=Session::get('message');
                                    if($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                                ?></p>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
          
            <th>Tên người đặt hàng</th>
            <th>TỔng tiền </th>
            <th>Tình trạng </th>
            <th>Hiển thị </th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_order as $key=>$order)
          <tr>
        
            <td>{{($order->customer_name)}}</td>
            <td>{{($order->order_total)}}</td>
            <td>{{($order->order_status)}}</td>
            
            <td>
              <a href="{{URL::to('/view-order/{orderId}'.$order->order_id)}}" style="font-size:25px;"class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc rằng bạn muốn xóa đơn này ?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" style="font-size:25px;"class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
       
         @endforeach
        </tbody>
      </table>
    </div>
@endsection