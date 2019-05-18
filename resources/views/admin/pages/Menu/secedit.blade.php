@extends('admin.index')
@section('content')
    
<div class="container">
        <h1>Edit Section</h1>
<form method="POST" action="edit" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label >Name</label>
        <input class="form-control" name="name" value="{{$section->name}}" type="text" id="title">
    </div>  
    <div class="form-group">
            <label >Price</label>
            <input class="form-control" name="price" value="{{$section->price}}" type="text" id="title">
    </div> 
    <div class="form-group">
            <label >Note</label>
            <input class="form-control" name="note" value= "{{$section->note}}" type="text" id="title">
    </div>                
    <div class="form-group">
        <input name="cover_image" type="file">
    </div>
    <input class="btn btn-primary" type="submit" value="Submit">
</form>
</div>
@include('admin.layouts.message')
@endsection