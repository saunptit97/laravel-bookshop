@extends('front-end.master')
@section('content')
@section('title', 'Cart')
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Checkout</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
				<h2>CHECKOUT</h2>
			</div>
			<div class="ckeckout-top">
			<div class="cart-items">
            <div class="row"> 
            <h3>My Shopping Bag {{Cart::count()}}</h3>
                <div class="col-md-9">
                <table class="table tb-cart">
                    <thead>
                        <tr>
                            <td>Item</td>
                            <td>Product Name</td>
                            <td>Unit Price</td>
                            <td>Num</td>
                            <td>Delivery Details / a book</td>
                            <td>Total</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="/cart-delete-all"><img src="/images/bin.png" width="30px" height="30px"/></a></td>
                        
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>
                            <img src="/images/{{$product->options->img}}" width="100" height="150"/>
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}$</td>
                            <td>
                                <a href="/update-cart/{{$product->rowId}}/{{$product->qty -1}}" class="update-cart">-</a>
                                <span>{{$product->qty}}</span> 
                                <a href="update-cart/{{$product->rowId}}/{{$product->qty +1}}" class="update-cart">+</a></td>
                            <td>{{$product->tax}}$</td>
                            <td>{{$product->total}}</td>
                            <td><a href="/cart-delete/{{$product->rowId}}"><img src="/images/bin.png" width="30px" height="30px"/></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="col-md-3">
                <div class="detail-total">
                    <h4>You have {{Cart::count()}} products</h4>
                    <h3>Total: {{Cart::total()}} $</h3>
                    <a href="/customer/buy"><button class="btn" onclick ="return deleteFunction('Do you want buy?')">Buy</button></a>
                </div>
</div>
</div>
			</div>  
		 </div>
		</div>
	</div>

    @endsection