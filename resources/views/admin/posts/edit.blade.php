@extends('layouts.admin')

@section('content')
	<h1>Edit Post</h1>
	@include('includes.form_errors')
		<form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
		 {{ csrf_field() }}
		 {{ method_field('PUT') }}
		<div class="form-group">
			<label for="title">Title: </label>
			<input type="text" class="form-control" name="title" value="{{$post->title}}">
		</div>
		<div class="form-group">
			<label for="category_id">Category: </label>
			<select name="category_id" id="category_id" class="form-control">
				<option value="">Choose Category</option>
				@foreach($categories as $category)
				<option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected': ''}}>{{$category->name}}</option>	
				@endforeach
			</select>
		</div>
			<div class="form-group">
			<label for="image_id">Image: </label>
			<input type="file" name="image_id" class="form-control">
		</div>
		<div class="form-group">
			<label for="body">Content: </label>
			<textarea name="body" id="body" cols="30" rows="10" class="form-control" >{{$post->body}}</textarea>
		</div>
		<button class="btn btn-success col-md-4" type="submit" style="margin-bottom: 30px">Update Post</button>
		
	</form>
	<form action="{{route('posts.destroy', $post->id)}}" method="POST">
		{{ csrf_field() }}
		 {{ method_field('DELETE') }}
		<button type="submit" class="btn btn-danger col-md-4 pull-right">Delete</button>
	</form>

@endsection