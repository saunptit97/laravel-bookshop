@extends('admin.master')
@section('content')
@section('title', 'Product')
<div class="manager">
    @if(isset($product)) <h3>Edit Product</h3>
    @else <h3>Add Product</h3>
    @endif
    <div class="pr-add">
        <form @if(!isset($product)) action="{{route('post-add-product')}}" @endif method="POST" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="row">
            @include('admin.block.error')
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                
                <label>Name Product: <span class="required">*</span></label>
                <input 
                    type="text"  
                    class="form-control" 
                    placeholder="Enter name product"
                    name="name"
                    @if(isset($product)) value = "{{$product->name_prd}}"
                    @endif
                    />
                <label>Import Price: <span class="required">*</span></label>
                <input 
                    type="text"  
                    class="form-control" 
                    placeholder="Enter import price's product"
                    name="import_price"
                    @if(isset($product)) value = "{{$product->import_price}}"
                    @endif
                    />
                <label>Price: <span class="required">*</span></label>
                <input 
                    type="text"  
                    class="form-control" 
                    placeholder="Enter price's product"
                    name="price"
                    @if(isset($product)) value = "{{$product->price}}"
                    @endif
                    />
                <label>Author: <span class="required">*</span></label>
                <input 
                    type="text"  
                    class="form-control" 
                    placeholder="Enter name product"
                    name="author"
                    @if(isset($product)) value = "{{$product->author}}"
                    @endif
                    />
                <label>Num: <span class="required">*</span></label>
                <input 
                    type="number"  
                    class="form-control" 
                    placeholder="Enter name product"
                    name="num"
                    @if(isset($product)) value = "{{$product->num}}"
                    @endif
                    />
                <label>Pages: <span class="required">*</span></label>
                <input 
                    type="number"  
                    class="form-control" 
                    placeholder="Enter pages product"
                    name="pages"
                    @if(isset($product)) value = "{{$product->pages}}"
                    @endif
                    />    
                <label>Image: <span class="required">*</span></label>
                <input type="file" name="img"/>
                
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label>Publisher <span class="required">*</span></label>
                <select class="form-control" name="publish">
                    <option value="none">Select</option>
                    @foreach($publishes as $publish)
                        <option value="{{$publish->id}}" @if(isset($product) && $product->id_publish===$publish->id) selected @endif>{{$publish->name_pub}}</option>
                    @endforeach
                </select >
                <label >Type <span class="required">*</span></label>
                <select class="form-control" name="type">
                <option value="none">Select</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" @if(isset($product) && $product->id_type===$type->id) selected @endif>{{$type->name_t}}</option>
                    @endforeach    
                </select>
                <label>Language <span class="required">*</span></label>
                <select class="form-control" name="language">
                    <option>Select</option>
                    <option value="1"  @if(isset($product) && $product->language===1) selected @endif>English</option>
                    <option value="2" @if(isset($product) && $product->language===2) selected @endif>VietNamese</option>
                </select>
                <label>Publish Year</label>
                <input 
                    type="number" 
                    name="publish_year" 
                    class="form-control" 
                    placeholder="Enter publish year"
                    @if(isset($product)) value = "{{$product->publication_date}}"
                    @endif
                    />
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" placeholder="Description"></textarea>
            </div>
            
        </div>
        <button class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>
@endsection