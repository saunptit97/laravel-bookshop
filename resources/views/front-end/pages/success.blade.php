@extends('front-end.master')
@section('content')
@section('title', 'Success')
<div class="container">
    <div class="row">
        <div class="breadcrumbs">
                <div class="container">
                    <div class="breadcrumbs-main">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Buy Success</li>
                        </ol>
                    </div>
                </div>
            </div>
        <div class="col-md-9">
            <div class="success">
                <h3><img src="/images/success.png" width="30px"/>Thank you for your payment!</h3>
                <p> Please check your mail!! We will contact you soon!!</p>
            </div>
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
@endsection