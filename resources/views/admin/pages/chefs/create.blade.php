@extends('admin.index')
@section('content')
    
<div class="container">
<h1>Add Chef</h1>
<form method="POST" action="{{url('admin/chef')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input class="form-control" placeholder="Name" name="name" value="{{old('name')}}" type="text" id="title">
    </div>   
    <div class="form-group">
        <label for="body">description</label>
        <textarea id="article-ckeditor" class="form-control" placeholder="description" name="description" cols="50" rows="10">{{old('description')}}</textarea>
    </div> 
    <div class="form-group">
        <label for="title">depart</label>
        <input class="form-control" placeholder="depart" name="depart" value="{{old('depart')}}" type="text" id="title">
    </div>  
    <div class="form-group">
        <label for="title">Facebook Link</label>
        <input class="form-control" placeholder="Facebook Link"  name="FacebookLink" value="{{old('FacebookLink')}}" type="text" id="title">
    </div>  
    <div class="form-group">
        <label for="title">Tweeter Link</label>
        <input class="form-control" placeholder="Tweeter Link" name="TweeterLink" value="{{old('TweeterLink')}}" type="text" id="title">
    </div>  
    <div class="form-group">
        <label for="title">Linked In Link</label>
        <input class="form-control" placeholder="Linked In Link" name="LinkedInLink" value="{{old('LinkedInLink')}}" type="text" id="title">
    </div>  
    <div class="form-group">
        <label for="image">Chef Image</label>
        <input name="chef_image" type="file">
    </div>
    <input class="btn btn-primary" type="submit" value="Add Post">
</form>
</div>
@include('admin.layouts.message')
@endsection