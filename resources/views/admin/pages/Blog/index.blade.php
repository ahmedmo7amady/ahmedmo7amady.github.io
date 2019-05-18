@extends('admin.index')

@section('maintag')
    Blog
@endsection
@section('tag')
    blogs
@endsection

@section('content')

<div class="container">
  @include('admin.layouts.message')
  @if(count($posts)>0)
    @foreach($posts as $post)
    <div class="box box-default collapsed-box">
        <div class="box-header with-border">
          <img src="{{asset('storage/postsimages/' . $post->image)}}" class="pull-left indeximage img-circle" >
          <h3>{{$post->title}}</h3>
          <h4>{{$post->description}}</h4>
          <p>Created At : {{$post->created_at}} by Admin </p>
          <div class="box-tools pull-right">
            <form method="GET" class="pull-left" action="blog/{{$post->id}}/edit">
              @csrf
              
              <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></button>  
            </form> 

            <form method="POST" class="pull-left" action="blog/{{$post->id}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
            </form>

            <form method="GET" class="pull-left" action="blog/{{$post->id}}">
              @csrf
              <button type="submit" class="btn btn-success"><i class="fa fa-eye"></i></button>
            </form>       
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
      </div>
      @endforeach  
    @else
      <h1>No Any Posts Available<h1>
    @endif
  </div>

@endsection