@extends('layouts.admin')

@section('content')

	<h1>Edit Users</h1>

	@include('includes.form_errors')
	<div class="col-md-3">
	   @if($user->photo)
		         <img src="/images/{{$user->photo->path}}" alt="" class="img-responsive img-rounded">
		    @else 
		         no image
		    @endif
		
	</div>
<div class="col-md-9">
	<form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
		 {{ csrf_field() }}
		 {{ method_field('PUT') }}
		<div class="form-group">
			<label for="name">Name: </label>
			<input type="text" class="form-control" name="name" value="{{$user->name}}">
		</div>
		<div class="form-group">
			<label for="email">Email: </label>
			<input type="email" class="form-control" name="email" value="{{$user->email}}">
		</div>
		<div class="form-group">
			<label for="role_id">Role: </label>
			<select name="role_id" id="role_id" class="form-control">
				<option value="">Choose Role</option>
				@foreach($roles as $role)
				<option value="{{$role->id}}" {{$user->role->name == $role->name? 'selected': ''}}>{{$role->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="is_active">Status: </label>
			<select name="is_active" id="is_active" class="form-control">
				<option value="1" {{$user->is_active == 1? 'selected': ''}}>Active</option>
				<option value="0" {{$user->is_active == 0? 'selected': ''}}>Not Active</option>
			</select>
			<div class="form-group">
			<label for="image">Image: </label>
			<input type="file" name="image_id" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password: </label>
			<input type="password" class="form-control" name="password">
		</div>
		<button class="btn btn-success pull-left" type="submit" >Create Post</button>
		
	</form>
	<form action="{{route('users.destroy', $user->id)}}" method="POST">
	 	{{ csrf_field() }}
		 {{ method_field('DELETE') }}
		<button class="btn btn-danger pull-right" type="submit" >Delete User</button>
	</form>
</div>

@endsection