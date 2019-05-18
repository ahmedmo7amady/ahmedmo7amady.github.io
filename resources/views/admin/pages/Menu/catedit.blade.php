@extends('admin.index')
@section('content')
    
<div class="container">
        <h1>Edit Category</h1>
<form method="POST" action="/B-Good/public/admin/menu/categories/{{$data->id}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label >Name</label>
        <input class="form-control" name="name" value = "{{$data->name}}"type="text" id="title">
    </div>   
    <div class="form-group">
        <input name="cover_image" type="file">
    </div>
    <input class="btn btn-primary" type="submit" value="Add Post">
</form>
@include('admin.layouts.message')
</div>
@endsection