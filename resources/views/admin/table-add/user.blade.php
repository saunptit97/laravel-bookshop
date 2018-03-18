@extends('admin.master')
@section('content')
@section('title', 'User')
<div class="manager">
		@if(isset($user))<h3>EDIT USER</h3>
		@else <h3>CREATE USER</h3> @endif
		<div class="add-table">
			<form action="@if(!isset($user)){{route('post-add-user')}} @endif" method="POST">
			{{ csrf_field()}}
				<div class="row">
				@include('admin.block.error')	
					<div class="col-md-6">
						<label>Name <span class="required">*</span></label>
						<div class="input-group">	
							
							<input 
								type="text" 
								name="first-name" 
								class="double-input" 
								placeholder="First Name" 
								@if(isset($user)) value ="{{firstName($user->name)}}"
								@endif
							/>
							<span class="input-input">
								<input 
									type="text" 
									name="last-name"
									class="double-input"
									placeholder="Last Name" 
									@if(isset($user)) value ="{{lastName($user->name)}}"
									@endif
								>
							</span>
						</div>
						<label>Choose your username:  <span class="required">*</span> </label>
						<input 
							type="text" 
							name="username" 
							placeholder="Enter your name" 
							class="form-control"
							@if(isset($user)) value ='{{$user->username}}'
							@endif
						/>
						<label>Level <span class="required">*</span></label>
						<select class="form-control" name="level">
							<option value="none">Select Level</option>
							<option value="1" @if(isset($user)){{selected(1, $user->level)}} @endif>
								Admin
							</option>
							<option value="2" @if(isset($user)){{selected(2, $user->level)}} @endif>Member</option>
							<option value="3" @if(isset($user)){{selected(3, $user->level)}} @endif>
								Vip
							</option>
							<option value="4" @if(isset($user)){{selected(4, $user->level)}} @endif>
								Accountant
							</option>
						</select>
					</div>	
					<div class="col-md-6">
						<label>Create a password: <span class="required">*</span></label>
						<input type="password" name="password" placeholder="Enter your password" class="form-control">
						<label>Confirm your password: <span class="required">*</span></label>
						<input type="password" name="password_confirm" placeholder="Enter your password" class="form-control">
						<button class="btn btn-primary">@if(isset($user)) Update @else Register @endif</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection