@extends('admin.index')
@section('content')
    
<div class="container">
<h1>Edit Post</h1>
<form method="POST" action="/B-Good/public/admin/blog/{{$post->id}}" enctype="multipart/form-data">
    @method('PATCH')
     @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" placeholder="Title" name="title" value="{{$post->title}}" type="text" id="title">
    </div>   
    <div class="form-group">
        <label for="body">Body</label>
        <textarea id="article-ckeditor" class="form-control" placeholder="Body"  name="body" cols="50" rows="10">{{$post->description}}</textarea>
    </div> 
    <div class="form-group">
            <input name="post_image" type="file">
        </div>
    <input class="btn btn-primary" type="submit" value="Add Post">
</form>
@include('admin.layouts.message')
@endsection