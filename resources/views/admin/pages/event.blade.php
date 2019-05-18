@extends('admin.index')
@section('maintag')
Reservation  
@endsection
@section('tag')
Event 
@endsection

@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Function</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $value)
                      <tr>
                        <td>{{$value->date}}</td>
                        <td>{{$value->time}}</td>
                        <td>{{$value->size}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                        <td>
                            <form  class="pull-left" action="/B-Good/public/admin/event/{{$value->id}}/show" method="POST">
                              @csrf
                              <button class="btn btn-success" type="submit">Show</button>
                            </form>
                            <form  action="/B-Good/public/admin/event/{{$value->id}}/delete" method="POST">
                              @method('DELETE')
                              @csrf
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
            <div class="row ">
              <div class="col-xs-12 ">
                   {{$data->links()}}
              </div>
            </div>
              </div>
              <!-- /.col -->
            </div>
            @if(isset($showdata))
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"> MR/Mss {{$showdata->name}} Event Details</h3>
                  <h5 >From :{{$showdata->name}}</h5>
                  <h5 >Phone :{{$showdata->phone}}</h5>
                  <h5>Email:{{$showdata->email}}
                      <span class="mailbox-read-time pull-right">{{$showdata->date}}</span></h5>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h3>with : {{$showdata->size}}</h3>
                  </div>
                  <!-- /.mailbox-read-info -->

                  <div class="mailbox-read-message">
                    <p>{{$showdata->notes}}</p>
                  </div>
                  <!-- /.mailbox-read-message -->
                </div>
              </div>
              @else
              <h1>No Data Found</h1>
              @endif
            <!-- /.row -->
          </section>
          <!-- /.content -->

          @endsection