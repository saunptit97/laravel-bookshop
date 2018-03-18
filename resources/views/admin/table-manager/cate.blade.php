@extends('admin.master')
@section('content')
@section('title', 'User')
<div class="manager">
    
    <div class="title">
        <h3>Category Manager</h3>
    </div>
    <div class="cate-manager">
    <a href="{{route('add-category')}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Add Type</button></a></br>
    <table class="table"> 
    </br>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name_t}}</td>
                <td>{{$type->description}}</td>
                <td>
                    <a href="edit/{{$type->id}}"><button class="btn btn-default"><i class="fa fa-edit"></i> Edit</button></a>
                    <a href="delete/{{$type->id}}"><button class="btn btn-danger"><i class="fa fa-close"></i> Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection