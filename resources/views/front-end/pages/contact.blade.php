@extends('front-end.master')
@section('content')
@section('title', 'Contact')
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Contact</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--contact-start-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h2>CONTACT</h2>
			</div>
				<div class="contact-text">
				<div class="col-md-4 contact-left">
						<div class="address">
							<h5>Address</h5>
							<p>The company name, 
							<span>Lorem ipsum dolor,</span>
							Glasglow Dr 40 Fe 72.</p>
						</div>
						<div class="address">
							<h5>Address1</h5>
							<p>Tel:1115550001, 
							<span>Fax:190-4509-494</span>
							Email: <a href="mailto:example@email.com">contact@example.com</a></p>
						</div>
					</div>
					<div class="col-md-8 contact-right">
						<form method="POST" action ="/customer/contact">
							{{csrf_field()}}
							<input type="text" placeholder="Name" name= "name">
							<input type="text" placeholder="Phone" name="phone">
							<input type="text"  placeholder="Email" name="email">
							<textarea placeholder="Message" required="" name="messages"></textarea>
							<div class="submit-btn">
								<input type="submit" value="SUBMIT">
							</div>
						</form>
					</div>	
					<div class="clearfix"></div>
				</div>
		</div>
	</div>

@endsection