@extends('admin.master')
@section('content')
@section('title', 'User')
<div class="manager">
    @if(isset($type)) <h3>Edit Type</h3>
    @else <h3>Add Type</h3>
    @endif
    <div class="add-type">
    <div class="row">
    <div class="col-md-6">
        @include('admin.block.error')
        <form method="POST" action="@if(!isset($type)){{route('post-category')}} @endif">
            {{csrf_field()}}
            <label>Name <span class="required">*</span></label>
            <input type="text" placeholder="Name Type" class="form-control" name="name_cate"  value= @if(isset($type)) "{{$type->name_t}}" @else "" @endif/>
            <label>Description <span class="required">*</span></label>
            <textarea cols="5" rows="5" class="form-control" name="des_cate" >@if(isset($type)){{$type->description}}@else @endif</textarea>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @if(isset($type)) Edit Type @else Add Type @endif</button>
        </form>
    </div>
    </div>
    </div>
</div>
@endsection