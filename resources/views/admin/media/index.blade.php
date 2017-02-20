@extends('layouts.admin')

@section('content')
	<h1>Media</h1>
	@if($photos)
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Created at</th>
				</tr>
			</thead>
			<tbody>
			@foreach($photos as $photo)
				<tr>
					<td>{{$photo->id}}</td>
					<td><img src="/images/{{$photo->path}}" alt="" style="height: 100px"></td>
					<td>{{$photo->created_at->diffForHumans()}}</td>
					<td>
						<form action="{{route('media.destroy', $photo->id)}}" method="POST">
						{{ csrf_field() }}
		 				{{ method_field('DELETE') }}
							<button class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@endif
@endsection