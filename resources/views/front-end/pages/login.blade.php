@extends('front-end.master')
@section('content')
@section('title', 'Login')
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Account</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--account-starts-->
	<div class="account">
		<div class="container">
		<div class="account-top heading">
				<h2>ACCOUNT</h2>
			</div>
			<div class="account-main">
				<div class="col-md-6 account-left">
					<h3>Existing User</h3>
					<div class="account-bottom">
						<form action="{{route('post-cus-login')}}" method="POST">
						{{ csrf_field() }}
						<input placeholder="Username" type="text" tabindex="3" required name="username">
						<input placeholder="Password" type="password" tabindex="4" required name="password">
						<div class="address">
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login">
						</div>
						</form>
					</div>
				</div>
				<div class="col-md-6 account-right account-left">
					<h3>New User? Create an Account</h3>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a href="register.html">Create an Account</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
    </div>
@endsection    