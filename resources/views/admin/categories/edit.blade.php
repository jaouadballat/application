@extends('layouts.admin')

@section('content')

	<h1>Categories</h1>
	<div class="col-md-6">
		<form action="{{route('categories.update', $category->id)}}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control" value="{{$category->name}}">
			</div>
			<button type="submit" class="btn btn-primary col-md-6">Update Category</button>
		</form>
			<form action="{{route('categories.destroy', $category->id)}}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
				<button class="btn btn-danger col-md-6">Delete</button>
			</form>
	</div>

@endsection