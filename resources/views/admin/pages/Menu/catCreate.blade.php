@extends('admin.index')
@section('content')
    
<div class="container">
        <h1>Create Category</h1>
<form method="POST" action="{{url('admin/menu/categories')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label >Name</label>
        <input class="form-control" name="name" type="text" id="title">
    </div>   
    <div class="form-group">
        <input name="cover_image" type="file">
    </div>
    <input class="btn btn-primary" type="submit" value="Add Post">
</form>
</div>
@include('admin.layouts.message')
@endsection