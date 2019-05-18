@extends('admin.index')

@section('maintag')
    Blog
@endsection
@section('tag')
    blogs
@endsection

@section('content')

<div class="container">
  <div>
    <a href ="chef/create " class="btn btn-success">Add New Chef</a>
  </div>
  <hr>
  @include('admin.layouts.message')
  @if(count($chefs)>0)
    @foreach($chefs as $chef)
    <div class="box box-default collapsed-box">
        <div class="box-header with-border">
          <img src="{{asset('storage/chefimages/' . $chef->image)}}" class="pull-left chefs img-circle" >
          <h3>{{$chef->name}}</h3>
          <h4>{{$chef->description}}</h4>
          <h4>Department :{{$chef->depart}}</h4>
          <h4>FB Link :<span>{{$chef->FBlink}}</span></h4>
          <h4>TW Link :<span>{{$chef->TWlink}}</span></h4>
          <h4>IN Link :<span>{{$chef->INlink}}</span></h4>
          <p class="pull-right">Added At : {{$chef->created_at}} by Admin </p>
          <div class="box-tools pull-right">
            <form method="GET" class="pull-left" action="chef/{{$chef->id}}/edit">
              @csrf
              
              <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></button>  
            </form> 

            <form method="POST" class="pull-left" action="chef/{{$chef->id}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
            </form>

    
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
      </div>
      @endforeach  
    @else
      <h1>No Any Chefs Now <h1>
    @endif
  </div>

@endsection