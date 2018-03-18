
<div>
    <h3>Thank you for your payment! {{$name}}</h3>
    <table class="table tb-cart">
                    <thead>
                        <tr>
                        
                            <td>Product Name</td>
                            <td>Unit Price</td>
                            <td>Num</td>
                            <td>Delivery Details / a book</td>
                            <td>Total</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}$</td>
                            <td>
                                
                                <span>{{$product->qty}}</span> 
                               </td>
                            <td>{{$product->tax}}$</td>
                            <td>{{$product->total}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
    </table>
    <h3>Total: {{Cart::total()}} $</h3>
</div>