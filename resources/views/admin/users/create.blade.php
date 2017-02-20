@extends('layouts.admin')

@section('content')

	<h1>Create Users</h1>
	@include('includes.form_errors')
	<form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
		 {{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name: </label>
			<input type="text" class="form-control" name="name">
		</div>
		<div class="form-group">
			<label for="email">Email: </label>
			<input type="email" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label for="role_id">Role: </label>
			<select name="role_id" id="role_id" class="form-control">
				<option value="">Choose Role</option>
				@foreach($roles as $role)
				<option value="{{$role->id}}">{{$role->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="is_active">Status: </label>
			<select name="is_active" id="is_active" class="form-control">
				<option value="1">Active</option>
				<option value="0" selected>Not Active</option>
			</select>
			<div class="form-group">
			<label for="image">Image: </label>
			<input type="file" name="image_id" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password: </label>
			<input type="password" class="form-control" name="password">
		</div>
		<button class="btn btn-success" type="submit" >Create Post</button>
		
	</form>


@endsection