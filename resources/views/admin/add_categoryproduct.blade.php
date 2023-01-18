@extends('admin_layout')
@section('admin_content')
<div class="row">
    
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                        </header>
                        
                        <div class="panel-body">
                                  <p style="color:green;font-size:11pt">                  <?php
                                $message=Session::get('message');
                                    if($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                                ?></p>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize:none" rows="5" class="form-control" id="exampleInputPassword1"name="category_product_desc" placeholder="Mô tả danh mục"></textarea>
                                </div>
                           
                              <div class="form-group">
                              <label for="exampleInputPassword1">Hiển thị</label>

                                <select name="category_product_status"class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                            
                                </select>
                              </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection