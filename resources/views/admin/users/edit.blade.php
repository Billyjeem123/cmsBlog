@extends('layouts.admin')


@section('content')

<h3>EDIT USERS</h3>

<div class="col-sm-3">

    <img height="50" class="img-fluid" src="{{asset('images/'.$user->image)}}" alt="alt">
</div>

<form  method="POST" action="{{url('admin/users/'. $user->id)}}" enctype="multipart/form-data">

    <div class="col-sm-9">

        {{ method_field('PUT') }}

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
            {{-- {{-- <span>@error('name'){{$errors->}} --}}
            {{-- @enderror</span> --}}
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" name="email" class="form-control" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="Status">Status</label>
            <select name="is_active" id="" class="form-control">
                {{-- <option value="">Select Staus</option> --}}
                @if ($user->is_active == 1)
                <option value="1">Active</option>

                @else
                <option value="1">Active</option>
                <option value="0">Not activate</option>

                @endif

            </select>
        </div>

        <div class="form-group">
            <label for="Email">Profile Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <label for="Role">Role</label>
            <select name="role_id" id="" class="form-control">
                <option value="">Select Role</option>
                @foreach ($role as $roles)
                <option value="{{$roles->id}}">{{$roles->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary" name="submit" />
        </div>

</form>
</div>


@if (count($errors) > 0)

@foreach ($errors->all() as $eror)

<li>{{$eror}}</li>

@endforeach

@endif

@endsection