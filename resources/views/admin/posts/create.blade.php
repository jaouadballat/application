@extends('layouts.admin')

@section('content')
	<h1>Create Post</h1>
	@include('includes.form_errors')
		<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
		 {{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title: </label>
			<input type="text" class="form-control" name="title">
		</div>
		<div class="form-group">
			<label for="category_id">Category: </label>
			<select name="category_id" id="category_id" class="form-control">
				<option value="">Choose Category</option>
				@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>	
				@endforeach
			</select>
		</div>
			<div class="form-group">
			<label for="image_id">Image: </label>
			<input type="file" name="image_id" class="form-control">
		</div>
		<div class="form-group">
			<label for="body">Content: </label>
			<textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
		</div>
		<button class="btn btn-success" type="submit" style="margin-bottom: 30px">Create Post</button>
		
	</form>
@endsection