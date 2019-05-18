@extends('admin.index')
@section('maintag')
    Post
@endsection
@section('tag')
    Details
@endsection
@section('content')
    <div class="container">
            <div class="col-md-10">
                    <!-- Box Comment -->

                      <!-- /.box-header -->
                      <div class="box-body">
                        <img class="img-responsive pad postimg" src="{{asset('storage/postsimages/' . $post->image)}}" alt="Photo">
          
                        <p>{{$post->description}}</p>
                        <span class="pull-right text-muted"> </span>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer box-comments">
                        <div class="box-comment">
                          <!-- User image -->
                        @if($comments==null)
                        <h1> No Comments </h1>
                        @else
                            @foreach($comments as $comment)
                          <div class="comment-text pull-left">
                                <span class="username">
                                  {{$comment->name}}
                                  
                                </span><!-- /.username -->
                            {{$comment->body}}
                          </div>
                          <span class="text-muted">{{$comment->created_at}}</span>
                          <form method="POST" class="pull-right" action="comment/{{$comment->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                          </form>
                        </div>
                          @endforeach
                        @endif
                          <!-- /.comment-text -->

                        <!-- /.box-comment -->
                        <!-- /.box-comment -->

                    </div>
                    <!-- /.box -->
                  </div>
    </div>
@endsection

