@extends('admin.index')
@section('content')
    
<div class="container">
        <h1>Create Section to Category : {{$data->name}}</h1>
<form method="POST" action="sections" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label >Name</label>
        <input class="form-control" name="name" type="text" id="title">
    </div>  
    <div class="form-group">
            <label >Price</label>
            <input class="form-control" name="price" type="text" id="title">
    </div> 
    <div class="form-group">
            <label >Note</label>
            <input class="form-control" name="note" type="text" id="title">
    </div>                
    <div class="form-group">
        <input name="cover_image" type="file">
    </div>
    <input class="btn btn-primary" type="submit" value="Add Section">
</form>
</div>
@include('admin.layouts.message')
@endsection