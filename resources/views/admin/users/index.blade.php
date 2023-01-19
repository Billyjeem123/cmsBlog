@extends('layouts.admin')


@section('content')
<h1>USERS</h1>

<section class='boostraptable'>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Image</th>
            <th scope="col">Active</th>
            <th scope="col">Registered</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>

            @if($user)

            @foreach ($user as $item)
                
        
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->role->name}}</td>
            <td><img height="50" src="{{asset('images/'.$item->image)}}" alt="alt"></td>
            <td>{{$item->active === 1  ? 'Active' : 'Not active'}}</td>
            <td>{{$item->created_at->diffForHumans()}}</td>
            <td><a href="{{route('admin.users.edit', $item->id)}}">Edit</a></td>
          </tr>
          
          @endforeach
          @endif
        </tbody>
      </table>
</section>
    
@endsection