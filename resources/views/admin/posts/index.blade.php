@extends('layouts.admin')

@section('content')

	<h1>Posts</h1>
	<table class="table">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>User</th>
	        <th>Category</th>
	        <th>Photo</th>
	        <th>Title</th>
	        <th>Body</th>
	        <th>Created</th>
	        <th>Updated</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($posts as $post)
	      <tr>
	        <td>{{$post->id}}</td>
	        <td>{{$post->user->name}}</td>
	        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
	        <td>
	        @if($post->photo)
		         <img height="50px" src="/images/{{$post->photo->path}}" alt="">
		    @else 
		         no image
		    @endif
	         </td>
	        <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
	        <td>{{str_limit($post->body, 7)}}...</td>
	        <td>{{$post->created_at->diffForHumans()}}</td>
	        <td>{{$post->updated_at->diffForHumans()}}</td>
	      </tr>
	    @endforeach
	    </tbody>
	 </table>
@endsection