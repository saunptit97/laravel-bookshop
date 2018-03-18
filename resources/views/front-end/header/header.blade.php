<div class="top-header">
		<div class="container">
		<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="box">
							<a href="/customer/register">Register</a>
						</div>
						<div class="box1">
							@if(!Auth::check())
								<a href="/customer/login" >Login</a>
							@endif		
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<ul class="cart-user">
							<li>
								<div class="cus">
									
										
										@if(Auth::check()) 
										<span>{{Auth::user()->name}}</span><a href="/customer/logout"><img src="/images/logout.png" /></a>
										@endif
									</div>
							</li>
							<li>
								<a href="/cart">
									<div class="total">
										<span class="simpleCart_total"></span></div>
										<img src="{{asset('front-end/images/cart-1.png')}}" alt="" />
								</a>
								<p><a href="/cart" class="simpleCart_empty">
								@if(Cart::count()>0) {{Cart::count()}}
								@else Empty
								@endif
								</a></p>
							</li>
							
						</ul>
						<div class="clearfix"> </div>
					</div>
					
				</div>
				<div class="clearfix"></div>
</div>
		</div>
</div>
