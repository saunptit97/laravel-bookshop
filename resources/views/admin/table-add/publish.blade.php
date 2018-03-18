@extends('admin.master')
@section('content')
@section('title', 'Publish')
<div class="manager">
    <h3>Add Publish</h3>
    <div class="add-type">
    @include('admin.block.error')
    <div class="row">
     <form method="POST" action="@if(!isset($publish)){{route('post-publish')}} @endif">
    <div class="col-md-6">
       
       
            {{ csrf_field()}}
            <label>Name <span class="required">*</span></label>
            <input type="text" placeholder="Name Publish" class="form-control" name="name_publish"  value= @if(isset($publish)) "{{$publish->name_pub}}" @else "" @endif/>
            <label>Description <span class="required">*</span></label>
            <textarea cols="5" rows="5" class="form-control" name="des_publish" >@if(isset($publish)){{$publish->description_pub}}@else @endif</textarea>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @if(isset($publish)) Edit Publish @else Add Publish @endif</button>
        
    </div>
    <div class="col-md-6">
        <label>Email</label>
        <input
            type="email"
            name="email_pub"
            placeholder="Email"
            class="form-control"
        />
        <label>Phone</label>
        <input
            type="text"
            name="phone_pub"
            placeholder="Phone"
            class="form-control"
        />
        <label>Address</label>
        <input
            type="text"
            name="add_pub"
            placeholder="Address"
            class="form-control"
        />
    </div>
    </form>
    </div>
    </div>
</div>
@endsection