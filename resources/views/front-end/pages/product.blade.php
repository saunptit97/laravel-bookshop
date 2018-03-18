@extends('front-end.master')
@section('content')
@section('title', 'Product')
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">Single</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
					<div class="sngl-top">
						<div class="col-md-5 single-top-left">	
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="images/s-1.jpg">
										<div class="thumb-image"> <img src="/images/{{$product->img}}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
									</li>
								</ul>
							</div>
						</div>	
						<div class="col-md-7 single-top-right">
							<div class="single-para simpleCart_shelfItem">
							<h2>{{$product->name_prd}}</h2>
								<div class="star-on">
									<ul class="star-footer">
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
										</ul>
									<div class="review">
										<a href="#"> 1 customer review </a>
									</div>
								<div class="clearfix"> </div>
								</div>
								
								<h5 class="item_price">{{$product->price}} $</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
								<div class="available">
							</div>

									<a href="/buy-product/{{$id}}" class="add-cart item_add">ADD TO CART</a>
								
							</div>
						</div>
						<div class="clearfix"> </div>
						<hr>
						<div class="details">
							<h4>Product details</h4>
							<div><span>Paperback: </span>{{$product->pages}}</div>
							<div><span>Publisher: </span>{{$product->name_pub}}</div>
							<div><span>Type: </span>{{$product->name_t}}</div>
							<div><span>Language: </span>
								@if($product->language ==0) English
								@else VietNamese
								@endif
							</div>
							<div><span>Author: </span>{{$product->author}}</div>
							<div><span>Status: </span>
								@if($product->num >0) In stock
								@else Out of stock
								@endif
						</div>
							<div><span>Description: </span>{{$product->description_prd}}</div>
						</div>	</hr>	
					</div>
					<div class="comment-bot">
				
						<h2 class="title-comment"><span>{{$comments->count()}}</span> Comments</h2>
						<p class="line"></p>
						<div class="comments">
							@foreach($comments as $comment)
					  		<div class="comment">
					  			<p class="cm-by">{{$comment->name}}</p>
								<p class="time-cm">{{$comment->created_at}}</p>
									<p class="cm">{{$comment->comment}}</p>
							</div>
							@endforeach
						</div>
						<form class="scroll" method="POST" action ="/customer/comment/{{$id}}">
							{{csrf_field()}}
							</hr>
							<div class="createComment">
								<li>
									<textarea class="form-control" rows="5" placeholder="Enter your comment" name="comment"></textarea>
								</li>
								<br/>
							</div>
							<div class="bottom-comment">
								<button  type="submit" class="primary">Comment</button>	
							</div>
						</form>
			  		</div>
					<div class="clearfix"> </div>
					
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
				</div>
			</div>
		</div>
	</div>
    @endsection