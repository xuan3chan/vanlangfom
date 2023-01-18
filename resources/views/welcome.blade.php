<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VANLANGFOM</title>
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/fontend/img/favicon.png')}}">
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/main2.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('/img/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>077554999</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> vanlangfom@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/fontend/img/chim.png')}}" width=60% alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<?php 
							$customer_id=Session::get('customer_id');
							$shipping_id=Session::get('shipping_id');		
							if ($customer_id!=NULL && $shipping_id==NULL ){
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

								<?php 
									}elseif($customer_id!=NULL && $shipping_id!=NULL ){
										?>
										<li><a href="{{URL::to('/payment')}}"><i class="fa fa-lock"></i>Thanh toán </a></li>
										<?php 
										}else{
											?>
										<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i>Thanh toán </a></li>
										<?php
										}
									
									?>
								<li><a href="{{URL::to('/show_cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php $customer_id=Session::get('customer_id');
									if ($customer_id!=NULL){
								?>
								<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
								<?php 
									}else{
										?>
										<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
										<?php 
									}
									?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{URL::to('/tat-ca-san-pham/')}}">Sản Phẩm</a></li>
										
                                    </ul>
                                </li> 
							
								<li><a href="{{URL::to('/show_cart')}}">Giỏ hàng </a></li>
							
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>V</span>ANLANGFOM</h1>
									<h2>Available in all sorts of sizes</h2>
								
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/fontend/img/mythuat.png')}}"  class="girl img-responsive" alt="" />
				
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>V</span>ANLANGFOM</h1>
									<h2>100% Design at Van Lang University</h2>
									
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/fontend/img/dieuduong.png')}}" class="girl img-responsive" alt="" />
							
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
								    <h1><span>V</span>ANLANGFOM</h1>
									<h2>Latest Models</h2>
									
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/fontend/img/quanhecongchung.png')}}"  class="girl img-responsive" alt="" />
							>
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<h4 class="panel-title"><a href="{{URL::to('/tat-ca-san-pham/')}}">Tất cả sản phẩm</a></h4>

						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
						@foreach($category as $key =>$cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									
									
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
							<!--/category-products-->
					
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{asset('public/fontend/img/shipping.jpg')}}" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				</div>
				<div class="col-sm-9 padding-right">
	
					@yield('content')
					
					
				</div>
			</div>
		</div>
	</section>
	
<!--Footer-->
	
	<!-- Site footer -->
    <footer class="site-footer">
		<div class="container">
		  <div class="row">
			<div class="col-sm-12 col-md-6">
			  <h6>ABout</h6>
			  <p class="text-justify"> Address: <i>45 Nguyễn Khắc Nhu, Phường Cô Giang, Quận 1, Thành phố Hồ Chí Minh </i> </p>
			  <p class="text-justify"> Phone Number: <i>+2 95 01 88 821 </i> </p>
			  <p class="text-justify"> Email: <i>info@domain.com </i> </p>
			</div>
		
		  </div>
		  <hr>
		</div>
		<div class="container">
		  <div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
			  <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by 
				<div class="companyinfo">
					<h2><span>V</span>ANLANGFOM</h2>
				</div>
			  </p>
			</div>
		  </div>
		</div>
  </footer>
  <!--//Footer//-->
	

  
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
</body>
</html>