

@extends('admin.index')
@section('maintag')
Reservation  
@endsection
@section('tag')
Table 
@endsection
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">
              @if(count($data)>0)
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                          <th>Date</th>
                          <th>Time</th>
                          <th>size</th>
                          <th>Functions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $value)
                      <tr>
                        <td>{{$value->date}}</td>
                        <td>{{$value->time}}</td>
                        <td>{{$value->size}}</td>

                        <td>
                            <form  action="/B-Good/public/admin/table/{{$value->id}}/delete" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>

                  <!-- /.box-body -->
                  
                </div>
            </div>
            <div class="row">
              <div class="col-xs-12 ">
                   {{$data->links()}}
              </div>
            </div>
              </div>
              <!-- /.col -->
            </div>
            @else
            <h1> No Available Tables</h1>
            @endif

            <!-- /.row -->
          </section>
          <!-- /.content -->

          @endsection
