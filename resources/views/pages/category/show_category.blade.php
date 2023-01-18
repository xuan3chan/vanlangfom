@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
						@foreach($category_name as $key =>$name)
						<h2 class="title text-center">{{$name->category_name}}</h2>
						@endforeach
						@foreach($category_by_id as $key => $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo text-center">
										<form action="{{URL::to('/save-cart')}}" method="post">
										{{csrf_field()}}
											<img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
											<h2>{{number_format($product->product_price)}}VND</h2>
											<p style="font-size:medium">{{$product->product_name}}</p>
											<input style="margin-left:50px;height:35px;width:30%;text-align:center;position:absolute;" name="qty" type="number" min="1" value="1"/>
											<input name="productid_hidden" type="hidden" value="{{$product->product_id}}"/>
											<button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></button>
											</form>
										</div>
									
								</div>
							
							</div>
						</div>
						@endforeach	
					</div><!--featre-->

					
                   
@endsection