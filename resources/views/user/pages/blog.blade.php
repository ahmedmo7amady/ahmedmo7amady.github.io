@extends('user.main')
@section('content')
    
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>Blog List</h4>
                    <a href="#">Home</a>
                    <a href="blog.html">Blog</a>
                    <a class="active" href="blog.html">List</a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        <!--================Blog List Area =================-->
        <section class="blog_list_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="row"> 
                            @if(count($data) > 0 )
                            @foreach($data as $value)                        
                            <article class="blog_list_item row m0">
                                
                                <div class="col-md-4">
                                    <div class="blog_list_img">
                                        <img src="{{asset('storage/postsimages/' . $value->image)}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="blog_list_content">
                                        <h3>{{$value->title}}</h3>
                                        <h6>Posted by <a href="#">admin</a>  at {{$value->created_at}}</h6>
                                        <p>{{$value->description}}</p>
                                        <div class="pull-left">
                                            <a class="event_btn" type="submit" href="blog/{{$value->id}}/Details">More Details</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#"><i class="fa fa-comment-o"></i>{{count($value->comments)}}</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                            @else
                            <h1> No Any News Now</h1>
                            @endif

                        </div>
                        <nav aria-label="Page navigation" >
                            <ul class="paginate">
                                <li>{{$data->links()}}</li>
                            </ul>
                        </nav>

                    </div>
                    <div class="col-md-2">
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
        </section>
        <!--================End Blog List Area =================-->
    
@endsection