@extends('front-end.master')
@section('content')
@section('title', 'Register')
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Register</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--register-starts-->
	<div class="register">
		<div class="container">
			<form action="{{route('post-cus-register')}}" method="POST">
			{{ csrf_field() }}
			<div class="register-top heading">
				<h2>REGISTER</h2>
			</div>
			<div class="register-main">
				@include('admin.block.error')
				<div class="col-md-6 account-left">
					<input placeholder="First name" type="text" tabindex="1" required name="first-name">
					<input placeholder="Last name" type="text" tabindex="2" required name="last-name">
					<input placeholder="Email address" type="text" tabindex="3" required name="email">
					<input placeholder="Mobile" type="text" tabindex="3" required name="phone">
					<ul>
						<li><label class="radio left"><input type="radio" name="sex" checked="" value="1"><i></i>Male</label></li>
						<li><label class="radio"><input type="radio" name="sex" value="2"><i></i>Female</label></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-6 account-left">
					<input type="text" name="address" placeholder="Address"/>
					<input type="text" name="age" placeholder="Age"/>
					<input placeholder="Password" type="password" tabindex="4" required name="password">
					<input placeholder="Retype password" type="password" tabindex="4" required name="confirm-password">
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="address submit">
				<input type="submit" value="Submit">
			</div>
			</form>
		</div>
	</div>
@endsection