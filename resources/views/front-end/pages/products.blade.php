
@extends('front-end.master')
@section('content')
@switch($type)
	@case('new') @section('title', 'New')
	@case('bestseller') @section('title', 'BestSeller')
	@case('search') @section('title', 'Search')
	@case('kind') @section('title', 'Products')
@endswitch	

</br>
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">New Products</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="prdt"> 
		<div class="container">
			<div class="prdt-top">
				<div class="col-md-9 prdt-left">
                    <!-- @if($type == 'search')<h4 class="result">  <span>  {{count($products)}} </span>results were found for "{{$key}}"</h4>
                    @elseif($type == 'new' ) <h3>New Books</h3>
                    @elseif($type == 'popular') <h3>BestSeller</h3>
                    @endif -->
					@switch($type)
						@case('search') 
							<h4 class="result">  <span>  {{count($products)}} </span>results were found for "{{$key}}"</h4> 
							@break
						@case('new')
							<h3>New Books</h3>
							@break
						@case('bestseller')
							<h3>BestSeller</h3>
							@break
						@case('kind')
							@foreach($types as $type)
								@if($type->id == $id) <h2 class="title-pr">{{$type->name_t}}</h2> @break;
								@endif
							@endforeach	
							@break	
					@endswitch				
                   <div class="product-one">
                        @foreach($products as $key=> $product)
                        <div class="col-md-4 product-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/product/{{$product->id}}" class="mask"><img class="img-responsive zoom-img" src="http://127.0.0.1:8000/images/{{$product->img}}" alt="" /></a>
                                <div class="product-bottom">
                                    <h3>{{$product->name_prd}}</h3>
                                    <p>Explore Now</p>
                                    <h4><a class="item_add" href="/buy-product/{{$product->id}}"><i></i></a> <span class=" item_price">$ {{$product->price}}</span></h4>
                                </div>
                                <div class="srch">
                                    <span>
                                        {{$product->promotion}}% 
                                    </span>
                                </div>
                            </div>
                        </div>
                        @if(($key+1)%3==0)<div class="clearfix"></div> @endif
                        @endforeach

					</div>
                    {{$products->links()}}
				</div>	
				<div class="col-md-3 prdt-right">
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Catogories</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">								
									<ul class="category-right">
										@foreach($types as $type)	
											<li><a href="/kind/{{$type->id}}">{{$type->name_t}}</a></li>
										@endforeach
									<ul>
								</div>
							</div>
						</section>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
@endsection