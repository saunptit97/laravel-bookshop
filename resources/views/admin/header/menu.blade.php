<div class="sidebar-menu">
					<header class="logo1">
						<a href="/" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
					<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
				    <div class="menu">
						<ul id="menu" >
							<li><a href="/admin-ts"><i class="fa fa-tachometer"></i> <span> Dashboard</span><div class="clearfix"></div></a></li>
							<li><a href="inbox.html"><i class="fa fa-envelope nav_icon"></i><span> Inbox</span><div class="clearfix"></div></a></li>
							<li class="table-hover"><a href=""><i class="fa fa-table"></i><span> Table-Manager</span></a>
								<ul>
									<li><a href="{{route('list-user')}}"><i class="fa fa-user"></i>User</a></li>
									<li><a href="{{route('list-product')}}"><i class="fa fa-heart"></i>Product</a></li>
									<li><a href="{{route('list-category')}}"><i class="fa fa-star"></i>Category</a></li>
									<li><a href="{{route('list-publish')}}"><i class="fa fa-leanpub"></i>Publish</a></li>
								</ul>
							</li>
							<li>
								<a href=""><i class="fa fa-plus"></i> Table-Add</a>
								<ul>
									<li><a href="{{route('add-user')}}"><i class="fa fa-user"></i>User</a></li>
									<li><a href="{{route('add-product')}}"><i class="fa fa-heart"></i>Product</a></li>
									<li><a href="{{route('add-category')}}"><i class="fa fa-star"></i>Category</a></li>
									<li><a href="{{route('add-publish')}}"><i class="fa fa-leanpub"></i>Publish</a></li>
								</ul>
							</li>
					  	</ul>
					</div>
				</div>