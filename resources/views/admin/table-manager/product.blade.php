@extends('admin.master')
@section('content')
@section('title', 'User')
<div class="manager">
    <div class="title">
        <h3>Product Manager</h3>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-content">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{route('add-product')}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</button></a>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control ">
                                <option>Sort By</option>
                                <option>Name A-> Z</option>
                                <option>Name Z-> A</option>
                            </select>
                        </div>
                    </div>
                    <table class="table table-hover">
                        </br>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>NAME</td>
                                <td>AUTHOR</td>
                                <td>PUBLISH</td>
                                <td>TYPE</td>
                                <td>PRICE</td>
                                <td>STATUS</td>
                                <td>ACTION</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id_prd}}</td>
                                <td>{{$product->name_prd}}</td>
                                <td>{{$product->author}}</td>
                                <td>
                                    @foreach($publishes as $publish)
                                        @if($publish->id === $product->id_publish) 
                                            {{$publish->name_pub}}
                                            @break;
                                        @endif    
                                    @endforeach        
                                </td>
                                <td>
                                    @foreach($types as $type)
                                        @if($type->id === $product->id_type) 
                                            {{$type->name_t}}
                                            @break;
                                        @endif    
                                    @endforeach        
                                </td>
                                <td>{{$product->price}}$</td>
                                <td>@if($product->num>0)<i class="fa fa-check"></i> @else <i class="fa fa-close"></i>@endif
                                </td>
                                <td>
                                    <a href="edit/{{$product->id}}"><button class="btn btn-default"><i class="fa fa-edit"></i> Edit</button></a>
                                    <a href="delete/{{$product->id}}"><button class="btn btn-danger" onclick="return deleteFunction('Do you want to delete this product?')"><i class="fa fa-close"></i> Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection