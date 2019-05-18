@extends('user.main')
@section('content')
    
@endsection
      <!--================Banner Area =================-->
      <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>Menu List</h4>
                    <a href="#">Home</a>
                    <a class="active" href="menu-list.html">Menu</a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
       <!--================End Our feature Area =================-->
        <section class="most_popular_item_area menu_list_page">
                <div class="container">
                    <div class="popular_filter">
                        <ul>
                            <li class="active" data-filter="*"><a href="">All</a></li>
                            @foreach($categories as $category)
                            <li data-filter=".{{$category->id}}"><a href="">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p_recype_item_main">
                        <div class="row p_recype_item_active">
                    @foreach($categories as $cat)
                        <?php
                             $sec = $cat->section;
                        ?>  
                         @foreach($sec as $value)
                            <div class="col-md-6 break {{$cat->id}}">
                                <div class="media">
                                    <div class="media-left">
                                        <img class = "indeximage"src="{{asset('storage/menusections/' . $value->image)}}">
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h3>{{$value->name}}</h3></a>
                                        <h4>{{$value->price}}</h4>
                                        <p>{{$value->note}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Our feature Area =================-->