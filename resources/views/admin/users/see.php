@extends('layouts.admin')


@section('content')

<h3>CREATE USERS</h3>

<form action="{{url('admin/users')}}" method="post" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" name="name" class="form-control">
        {{-- <span>@error('name'){{$errors->}}
        @enderror</span> --}}
    </div>

    <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="Password">Password</label>
        <input type="text" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="Status">Status</label>
        <select name="is_active" id="" class="form-control">
            <option value="">Select Staus</option>
            <option value="1">Active</option>
            <option value="0">Not activate</option>

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


@if (count($errors) > 0)

@foreach ($errors->all() as $eror)

<li>{{$eror}}</li>

@endforeach

@endif

@endsection