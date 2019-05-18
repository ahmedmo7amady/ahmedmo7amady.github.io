@extends('user.main')

@section('content')
<section class="banner_area">
        <div class="container">
            <div class="banner_content">
                <h4>Blog Details</h4>
                <a href="#">Home</a>
                <a href="blog.html">Blog</a>
                <a class="active" href="blog-details.html">Details</a>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->
    
    <!--================Blog List Area =================-->
    <section class="blog_list_area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row m0">
                        <div class="blog_details_inner">
                            <div class="blog_details_content">
                                <img src="{{asset('storage/postsimages/' . $data->image)}}" alt="">
                                <h3>{{$data->title}}</h3>
                                <h4>Posted by <a href="#">admin</a>  at {{$data->created_at}}</h4>
                                <p>{{$data->description}}</p>
                                </div>
                                <hr>
                            <div class="comment_list_area">
                                <h4>{{count($comments)}} COMMENT</h4>
                                
                                @foreach($comments as $comment)
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{url('design/user')}}/img/comment-user/comment-3.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h5>{{$comment->name}}</h5>
                                        <p class="pull-right">{{$comment->created_at}}</p>
                                        <p>{{$comment->body}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="comment_form_area">
                                <h3>Post A Comment</h3>
                                <div class="row">
                                    <form method="POST" action="{{url('blog')}}/{{$data->id}}/comment">
                                        @csrf
                                        <div class="form-group col-md-6">
                                            <label for="name">Name<span>*</span></label>
                                            <input type="text" class="form-control" required name="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email<span>*</span></label>
                                            <input type="email" class="form-control"  required name="email">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="comment">YOUR COMMENT</label>
                                            <textarea name="body"  required rows="1"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-default submit_btn_bg">Post Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('user.layouts.message')
                </div>
                <div class="col-md-4">
                    <div class="blog_right_sidebar">
                        <aside class="right_widget calender_widget">
                           <div class="sidebar_title">
                                <h3>Calendar</h3>
                            </div>
                            <div id="my-calendar"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Blog List Area =================-->

@endsection