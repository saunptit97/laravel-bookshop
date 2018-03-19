@extends('admin.master')
@section('content')
@section('title', 'User')
<div class="manager">
   <h3>Contact</h3>
    <div class="add-type">
    <div class="row">
    <div class="col-md-12">
        @include('admin.block.error')
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contact as $key => $ct)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$ct->name}}</td>
                    <td>{{$ct->email}}</td>
                    <td>{{$ct->phone}}</td>
                    <td>{{$ct->messages}}</td>
                    <td>@if($ct->status==0) <i class="fa fa-close"></i>
                        @else <i class="fa fa-check"></i>
                        @endif
                    </td>
                    <td>
                        <a href="/admin-ts/inbox/rep/{{$ct->id}}"><button class="btn btn-primary">Rep</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>
@endsection