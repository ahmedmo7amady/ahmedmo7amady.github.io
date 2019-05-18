
@extends('admin.index')
@section('content')
<div class="container">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Menu Categories</h3>
    
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($data)>0)
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Category ID</th>
                        <th>Name</th>
                        <th>Sections</th>
                        <th>Created At</th>
                        <th>Last Update</th>
                        <th>Function</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $value)
                      <tr>
                        <td><a href="pages/examples/invoice.html">{{$value->id}}</a></td>
                        <td><a href="pages/examples/invoice.html">{{$value->name}}</a></td>
                        <td>{{count($value->section)}}</td>
                        <td><span>{{$value->created_at}}</span></td>
                        <td><span>{{$value->updated_at}}</span></td>
                        <td>
                          <form method="GET" class="pull-left" action="categories/{{$value->id}}/edit">
                            @csrf
                            <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></button>  
                          </form> 
                          <form method="GET" class="pull-left" action="categories/{{$value->id}}">
                            @csrf
                            <button type="submit" class="btn btn-success"><i class="fa fa-eye"></i></button>  
                          </form> 
                          <form method="POST" class="pull-left" action="categories/{{$value->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                    @else
                    <div class="container">
                    <h1> No Categories </h1></div>
                    @endif
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix"> 
                  <a href="categories/create" class="btn btn-sm btn-success btn-flat pull-left"><i class="fa fa-plus"></i>    New Category</a>
                </div>
                <!-- /.box-footer -->
              </div>
</div>
<div class="container">
  @include('admin.layouts.message')
</div>
@endsection