@extends('admin.master')
@section('content')
@section('title', 'Home')
				<!-- END HOME-->
				<!--FOUR GRIDS-->
				<div class="four-grids">
					<div class="row">
						<div class="col-md-3 grid">
							<div class="grid-user">
							<i class="fa fa-user"></i>
							<p>User</p>
							<span>{{$user}}</span>
							</div>
						</div>
						<div class="col-md-3 grid">
							<div class="grid-client ">
							<i class="fa fa-list-alt"></i>
							<p>Clients</p>
							<span>25,000</span>
							</div>
						</div>
						<div class="col-md-3 grid">
							<div class="grid-product">
							<i class="fa fa-folder"></i>
							<p>Products</p>
							<span>{{$product}}</span>
							</div>
						</div>
						<div class="col-md-3 grid">
							<div class="grid-bill">
							<i class="fa fa-briefcase"></i>
							<p>Bills</p>
							<span>{{$bill}}</span>
							</div>
						</div>
					</div>
				</div>
				<!-- END FOUR GRIDS-->
				<div class="row reports">
					<h2>STATISTICS</h2>
					<!--REPORT-->
					<div class="col-md-8">
						<div class="report">
							<div class="title">
								<h4>Janary 2018</h4>
								<span>${{$total}}</span>
								<h3>REPORT</h3>
							</div>
							<div class="body-report">
								<table class="table table-hovered">
									<thead>
										<tr>
											<td>ID</td>
											<td>NAME</td>
											<td>QUANTITY</td>
											<td>AMOUT</td>
										</tr>
									</thead>
									<tbody>
										@foreach($products as $key => $prd)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$prd->name_prd}}</td>
											<td>{{$prd->sum_total}}</td>
											<td>{{$prd->sum_amount}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								{{$products->links()}}
							</div>
						</div>
					</div>
					<!--END EPORT-->
					<!--CONTACT-->
					<div class="col-md-4">
						<div class="contact">
							<h4>Contacts</h4>
							<div class="row">
								<div class="col-md-3">
									<img src="{{asset('admin/img/saun.jpg') }}" width="60px" height="60px">
								</div>
								<div class="col-md-6">
									<p>Sau Nguyen</p>
									<span>nts1997z@gmail.com</span>
								</div>
								<div class="col-md-3">
									<p>CEO</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<img src="{{asset('admin/img/saun.jpg') }}" width="60px" height="60px">
								</div>
								<div class="col-md-6">
									<p>Sau Nguyen</p>
									<span>nts1997z@gmail.com</span>
								</div>
								<div class="col-md-3">
									<p>CEO</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<img src="{{asset('admin/img/saun.jpg') }}" width="60px" height="60px">
								</div>
								<div class="col-md-6">
									<p>Sau Nguyen</p>
									<span>nts1997z@gmail.com</span>
								</div>
								<div class="col-md-3">
									<p>CEO</p>
								</div>
							</div>
						</div>	
					</div>
					<!--END CONTACT-->
					
				</div>

@endsection