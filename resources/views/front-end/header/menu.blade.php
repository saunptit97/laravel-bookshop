<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue"><li class="active"><a href="/">Home</a></li>
						<li class="grid"><a href="#">Books</a>
							<div class="mepanel">
								<div class="row">
									@for($i = 0 ; $i < count($types); $i++) 
												
										@if(($i+1)%3 ==0)
													<li><a href="/kind/{{$types[$i]->id}}">{{$types[$i]->name_t}}</a></li>
												</ul>
											</div>
										@elseif($i==0 || $i%3 ==0 )	
											<div class="col1 me-one">
												<ul>
												<li><a href="/kind/{{$types[$i]->id}}">{{$types[$i]->name_t}}</a></li>
										@else 
											<li><a href="/kind/{{$types[$i]->id}}">{{$types[$i]->name_t}}</a></li>
										@endif
									@endfor		
								</div>
							</div>
						</li>
						<li class="grid"><a href="/new-book">New Books</a>
						</li>
						<li class="grid"><a href="/bestseller">Bestseller</a>
						</li>
						<li class="grid"><a href="typo.html">About</a>
						</li>
						<li class="grid"><a href="/contact">Contact</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right"> 
				<div class="search-bar">
					<form action ="{{route('search-product')}}" method="POST">
					{{ csrf_field() }}
						<input type="text" placeholder="Search" name="search-prt">
						<input type="submit" value="">
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>