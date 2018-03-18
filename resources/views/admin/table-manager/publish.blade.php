@extends('admin.master')
@section('content')
@section('title', 'User')
<div class="manager">
    
    <div class="title">
        <h3>Publish Manager</h3>
    </div>
    <div class="cate-manager">
    <table class="table"> 
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($publishes as $publish)
            <tr>
                <td>{{$publish->id}}</td>
                <td>{{$publish->name_pub}}</td>
                <td>{{$publish->description_pub}}</td>
                <td>
                    <a href="edit/{{$publish->id}}"><button class="btn btn-default"><i class="fa fa-edit"></i> Edit</button></a>
                    <a href="delete/{{$publish->id}}"><button class="btn btn-danger"><i class="fa fa-close"></i> Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection