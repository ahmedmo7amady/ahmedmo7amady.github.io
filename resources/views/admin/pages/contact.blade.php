@extends('admin.index')
@section('maintag')
Contact Us 
@endsection
@section('content')
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <!-- Input addon -->
                  <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Contact Us Informations</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/contact/info/insert')}}" method="POST" role="form">
                            @csrf
                          <div class="box-body">
                            <div class="form-group">
                              <label >First Info</label>
                              <textarea type="text" class="form-control"  required name="finfo" placeholder="First Info"><?php if($data == null){echo "" ;}else{echo ($data->firstpr);}?></textarea>
                            </div>
                            <div class="form-group">
                              <label >Second Info</label>
                              <textarea type="text" class="form-control"  required name="sinfo" placeholder="Second Info"><?php if($data == null){echo "" ;}else{echo ($data->secondpr);}?></textarea>
                            </div>
                            <hr>
                            <hr>
                            <div class="form-group">
                                <label >Address</label>
                                <input type="text" class="form-control" required value="<?php if($data == null){echo "" ;}else{echo ($data->address);}?>" name="address"placeholder="Address">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label >Phone</label>
                                <input type="number" class="form-control" required value="<?php if($data == null){echo "" ;}else{echo ($data->phone);}?>" name="phone"placeholder="Phone">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label >Email</label>
                                <input type="Email" class="form-control" required value="<?php if($data == null){echo "" ;}else{echo ($data->email);}?>" name="email" placeholder="Email">
                            </div>
                            <hr>
                            <hr> 
                        </div>
                          <!-- /.box-body -->
            
                          <div class="box-footer">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </form>
                        @include('admin.layouts.message')
                      </div>
                  <!-- /.box -->
        
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                      <!-- Main content -->
                      <section class="content">
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Messages</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                  <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Function</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($messages as $message)
                                    <tr>
                                      <td>{{$message->Fname}} {{$message->Lname}}</td>
                                      <td>{{$message->email}}</td>
                                      <td><a href="{{url('admin/contact/message')}}{{'/'.$message->id}}">{{$message->subject}}</a></td>
                                      <td>
                                      
                                      <form action="contact/message/{{$message->id}}/delete" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                      </form>
                                      
                                      </td>
                                    </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <div class="row ">
                                <div class="col-xs-12 ">
                                      {{$messages->links()}}
                                </div>
                              </div>
                            <!-- /.box -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        @if($onemessage == null)
                          <h1> No Message selected To view </h1>
                        @else
                          <div class="box box-primary">
                              <div class="box-header with-border">
                                <h3 class="box-title">Read message</h3>
                                <h5 >From :{{$onemessage->Fname}} {{$onemessage->Lname}}</h5>
                                <h5>Email: {{$onemessage->email}}
                                    <span class="mailbox-read-time pull-right">{{$onemessage->created_at}}</span></h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body no-padding">
                                <div class="mailbox-read-info">
                                  <h3>{{$onemessage->subject}}</h3>
                                </div>
                                <!-- /.mailbox-read-info -->
      
                                <div class="mailbox-read-message">
                                  <p>{{$onemessage->content}}</p>
                                </div>
                                <!-- /.mailbox-read-message -->
                              </div>
                            </div>
                          @endif
                      </section>
                      <!-- /.content -->

                    </div>
              </div>
              <!-- /.row -->
            </section>
            <!-- /.content -->
          </div>

@endsection