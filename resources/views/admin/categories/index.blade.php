@extends('layouts.admin')

@section('content')

	<h1>Categories</h1>
	<div class="col-md-6">
		<form action="{{route('categories.store')}}" method="POST">
		{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Create Category</button>
		</form>
	</div>
	<div class="col-md-6">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Category</th>
					<th>Created_at</th>
				</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
					<td>{{$category->created_at?$category->created_at->diffForHumans():'no date'}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>

	</div>
@endsection