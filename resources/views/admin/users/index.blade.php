@extends('layouts.admin')

@section('content')
	
	@if(session()->has('user_deleted'))
		<p class="alert alert-danger text-center">{{(session('user_deleted'))}}</p>
	@endif
	<h1>Users</h1>

	<table class="table">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Photo</th>
	        <th>Name</th>
	        <th>Email</th>
	        <th>Role</th>
	        <th>Active</th>
	        <th>Created</th>
	        <th>Updated</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($users as $user)
	      <tr>
	        <td>{{$user->id}}</td>
	        <td>
	       	@if($user->photo)
		         <img height="50px" src="/images/{{$user->photo->path}}" alt="" style="height: 70px">
		    @else 
		         no image
		    @endif
	        </td>
	        <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
	        <td>{{$user->email}}</td>
	        <td>{{$user->role->name}}</td>
	        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
	        <td>{{$user->created_at->diffForHumans()}}</td>
	        <td>{{$user->updated_at->diffForHumans()}}</td>
	      </tr>
	    @endforeach
	    </tbody>
	 </table>

@endsection