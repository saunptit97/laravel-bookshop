@extends('front-end.master')

@section('content')
@section('title', ' Home')
<!--about-starts-->
@include('front-end.header.banner')
	<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
				@foreach($bestseller as $best)
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="/images/{{$best->img}}" alt=""/>
						<figcaption>
							<h2>{{$best->name_prd}}</h2>
						</figcaption>			
					</figure>
				</div>
				@endforeach	
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!--about-end-->
<!--product-->
    <div class="product"> 
		<div class="container">
			<div class="product-top">
				<h3 class="title">New Products</h3>
				<div class="product-one">
					@foreach($products as $key=> $product)
					<div class="col-md-3 product-left">
						<div class="product-main simpleCart_shelfItem">
							<a href="/product/{{$product->id}}" class="mask"><img class="img-responsive zoom-img" src="images/{{$product->img}}" alt="" /></a>
							<div class="product-bottom">
								<h3>{{$product->name_prd}}</h3>
								<p>Explore Now</p>
								<h4><a class="item_add" href="buy-product/{{$product->id}}"><i></i></a> <span class=" item_price">$ {{$product->price}}</span></h4>
							</div>
							<div class="srch">
								<span>
									{{$product->promotion}}%
								</span>
							</div>
						</div>
					</div>
					@if(($key+1)%4==0)<div class="clearfix"></div> @endif
					@endforeach
				</div>
				
			</div>
		</div>
	</div>
@endsection
