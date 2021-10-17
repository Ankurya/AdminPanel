
@extends('layouts.app')
@section('content')

    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ url('edit-detail', $user->id) }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="username" value="{{ $user->username }}" class="form-control" >
                @error('username')
                <div class="error error-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" >
                @error('email')
                <div class="error error-danger">{{ $message }}</div>
            @enderror
            </div>  <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ $user->address }}" class="form-control" >
                @error('address')
                <div class="error error-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="profile_pic" >
                @error('profile_pic')
                <div class="error error-danger">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>


@endsection