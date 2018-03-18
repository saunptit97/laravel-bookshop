@extends('admin.master')
@section('content')
@section('title', 'User')
<div class="manager">
    <div class="title">
        <h3>User Manager</h3>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-content">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- <from action="{{route('search')}}" method="POST" >    
                                @csrf
                                <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Enter your search"
                                        name="search_user"
                                        />
                                        <button type="submit" class="btn btn-default" ><i class="fa fa-search"></i></button>
                                    
                                <div class="input-group">
                                    
                                    <span class="input-group-btn">
                                        <</span>
                                </div>
                            </form> -->
                            <form method="POST" action ="{{route('search')}}">
                                {{csrf_field()}}
                                <input 
                                    type="text" 
                                    name="search"
                                    class="search-user"
                                    placeholder="Enter your search"
                                    value= @if(isset($search)) "{{$search}}" @else ""@endif
                                />
                                <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                                
                            </form>
                            <a href="{{route('add-user')}}"><button class="btn btn-primary add-user-btn"><i class="fa fa-plus"></i> Add User</button></a>
                        </div>
                        <div class="col-md-5">
                            <form method="POST " action="{{route('sort')}}">
                            {{csrf_field()}}
                                <select class="select-sort" name="sort-user">
                                    <option value="none">Sort</option>
                                    <option value="1">Name by A - Z</option>
                                    <option value="2">Name by Z - A</option>
                                    <option value="3">ID Increase</option>
                                    <option value="4">ID Decrease<i class="fa fa-level-down-alt"></i></option>
                                </select>
                            </form>
                        </div>
                    </div>
                    @if(isset($count) && $count>0 ) <h4 class="search-count">About {{$count}} results</h4>
                    @elseif(isset($search)) <h4 class="search-count"> No result is found</h4>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>    
                                <td>ID</td>
                                <td>USER</td>
                                <td>NAME</td>
                                <td>LEVEL</td>
                                <td>CREATED_AT</td>
                                <td>ACTION</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            
                                @switch($user->level)
                                    @case(1)  <td>Admin</td> @break
                                    @case(2)  <td>Member</td> @break
                                    @case(3)  <td>Vip</td> @break
                                    @case(4)  <td>Acountant</td> @break 
                                @endswitch
                            
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="edit/{{$user->id}}"><button class="btn btn-default"><i class="fa fa-edit"></i> Edit</button>
                                <a href="delete/{{$user->id}}"><button class="btn btn-danger"><i class="fa fa-close"></i> Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $data->links() !!}
                </div>
               
            </div>
          
        </div>
    </div>
</div>
@endsection