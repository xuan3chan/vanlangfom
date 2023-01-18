@extends('admin_layout')
@section('admin_content')

<div class="row">
    
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm 
                        </header>
                        <p style="color:green;font-size:11pt"><?php
                                $message=Session::get('message');
                                    if($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                                ?></p>
                        <div class="panel-body">
                                @foreach($edit_category_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize:none" rows="5" class="form-control" id="exampleInputPassword1"name="category_product_desc" placeholder="Mô tả danh mục">{{$edit_value->category_desc}}</textarea>
                                </div>
                           
                             
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập Nhật danh mục</button>
                            </form>
                            </div>
                            @endforeach 
                        </div>
                    </section>

            </div>
@endsection