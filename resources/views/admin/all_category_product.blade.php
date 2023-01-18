@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
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
          
            <th>Tên danh mục</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_category_product as $key=>$cate_pro)
          <tr>
          
            <td>{{($cate_pro->category_name)}}</td>
            <td><span class="text-ellipsis">
                <?php
                 if($cate_pro->category_status==0){
                  ?>
                   <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}" style="font-size:25px;"><span class="fa fa-thumbs-up"></span></a>
                    <?php
                        }else{
                    ?>
                    <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"style="font-size:25px;"><span class="fa fa-thumbs-down"></span></a>
                <?php
                        }
                ?>
            </span></td>
            
            <td>
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" style="font-size:25px;"class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc rằng bạn muốn xóa danh mục này ?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" style="font-size:25px;"class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
       
         @endforeach
        </tbody>
      </table>
    </div>
@endsection