@extends('admin.index')
@section('content')
    
<div class="container">
        <h1>About Us </h1>
        <form method="GET" action="{{url('admin/about/update')}}" enctype="multipart/form-data">
            @method('PATCH')
             @csrf
             <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" placeholder="Title" name="title" type="text" id="title" value = "<?php if($data == null){echo "" ;}else{echo ($data->title);}?>">
            </div>    
            <div class="form-group">
                <label >First Paragraph</label>
                <textarea id="article-ckeditor" class="form-control" placeholder="First Paragraph" name="Fp" cols="50" rows="10"><?php if($data == null){echo "" ;}else{echo ($data->Fp);}?></textarea>
            </div> 
            <div class="form-group">
                <label >Secound Paragraph</label>
                <textarea id="article-ckeditor" class="form-control" placeholder="Secound Paragraph" name="Sp" cols="50" rows="10"><?php if($data == null){echo "" ;}else{echo ($data->Sp);}?></textarea>
            </div> 
            <div class="form-group">
                    <input name="postimage" type="file">
                </div>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
        @include('admin.layouts.message')
</div>

@endsection