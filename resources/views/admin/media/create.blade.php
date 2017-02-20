@extends('layouts.admin')

@section('content')
	<h1>Upload Media</h1>
	@section('styles')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
	@endsection
	
	<form action="{{route('media.store')}}" method="POST" class="dropzone">
		{{ csrf_field() }}
	</form>

	@section('scripts')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
	@endsection
@endsection