@extends('admin.index')
@section('content')
    
<div class="container">
<h1>Create Post</h1>
<form method="POST" action="{{url('admin/blog')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" placeholder="Title" name="title" type="text" id="title">
    </div>   
    <div class="form-group">
        <label for="body">Body</label>
        <textarea id="article-ckeditor" class="form-control" placeholder="Body" name="body" cols="50" rows="10"></textarea>
    </div> 
    <div class="form-group">
        <input name="post_image" type="file">
    </div>
    <input class="btn btn-primary" type="submit" value="Add Post">
</form>
</div>
@include('admin.layouts.message')
@endsection