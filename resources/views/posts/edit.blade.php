

@extends('layouts.app')
@section('content')

<style>
    .error{
        color:red;
    }

    </style>
    <div class="container">
        <h2>Update Post</h2>
        <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter title here">
                @error('title')
                <div class="error error-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="category" value="{{ $post->category }}" class="form-control" placeholder="Enter category here">
                @error('category')
                <div class="error error-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label>
                    <span class="tab-form__label">Description</span>
                    <textarea class="form-control" type="text" name="description"
                        placeholder="Enter post here"
                        rows="6" style="width: 500%;">{{$post->description}} </textarea>
                        @error('description')
                        <div class="error error-danger">{{ $message }}</div>
                    @enderror
                </label>

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