@extends('admin.master')
@section('content')
@section('title', 'User')
<div class="manager">
   <h3>REP</h3>
    <div class="add-type">
    <div class="row">
    <div class="col-md-12">
        @include('admin.block.error')
      
        <form method="POST" action="{{route('rep-inbox', $id)}}">
            {{csrf_field()}}
            <input type="text" placeholder="Title" class="form-control"  name="title" required/> </br>
            <textarea class="form-control" rows= "5" placeholder="Content" name="content" required></textarea>
            <button class="btn btn-default" type="submit">Send</button>
        </form>
    </div>
    </div>
    </div>
</div>
@endsection