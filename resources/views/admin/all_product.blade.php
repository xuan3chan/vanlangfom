@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
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
         
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key=>$pro)
          <tr>
            
            <td>{{($pro->product_name)}}</td>
            <td>{{($pro->product_price)}}</td>
            <td><img src="public/uploads/product/{{($pro->product_image)}}"height="100" with="100"></td>
            <td>{{($pro->category_name)}}</td>
            
            <td><span class="text-ellipsis">
                <?php
                 if($pro->product_status==0){
                  ?>
                   <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}" style="font-size:25px;"><span class="fa fa-thumbs-up"></span></a>
                    <?php
                        }else{
                    ?>
                    <a href="{{URL::to('/active-product/'.$pro->product_id)}}"style="font-size:25px;"><span class="fa fa-thumbs-down"></span></a>
                <?php
                        }
                ?>
            </span></td>
            
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" style="font-size:25px;"class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc rằng bạn muốn xóa sản phẩm này ?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" style="font-size:25px;"class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
       
         @endforeach
        </tbody>
      </table>
    </div>
@endsection