<div class="row">
					<div class="col-md-3 logo">
						<a href=""><h3>Books Shop</h3></a>
					</div>
					<div class="col-md-3">
						<form method="POST" action = "{{route('search-product')}}">
						{{csrf_field()}}
						<div class="input-group search">
							<input type="text" name="search" class="form-control" placeholder="Enter your search">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
						</form>
					</div>
					<div class="col-md-3 notify">
						<ul>
							<li><a href=""><i class="fa fa-envelope"></i></a></li>
							<li><a href=""><i class="fa fa-bell"></i></a></li>
							<li><a href=""><i class="fa fa-list-ul"></i></a></li>
						</ul>
					</div>
                    <div class="col-md-3 admin">
                        <div class="header">
                            <span><img src="{{asset('admin/img/saun.jpg') }}" width="50px" height="50px"></span>
                            <span ><p>{{Auth::user()->name}}</p>
                            <span class="level">Admin</span></span>
                            
                            <a href="/logout"><i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
				</div>
                	<!-- HOME-->
				<div class="home">
					<a href="/">Home 
						<i class="fa fa-chevron-right"></i>
					</a>
				</div>