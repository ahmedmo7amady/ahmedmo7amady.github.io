@extends('user.main')
@section('content')
       
<section class="banner_area">
    <div class="container">
        <div class="banner_content">
            <h4>About Us</h4>
            <a href="#">Home</a>
            <a class="active" href="#">About
            </a>
        </div>
    </div>
</section>
       <!--================About Us Content Area =================-->
        <section class="about_us_content">
            <div class="container">
                @if(isset($data))
                <div class="row about_inner_item">
                    <div class="col-md-6">
                        <div class="about_left_content">
                            <h4>{{$data->title}}</h4>
                            <p>{{$data->Fp}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about_right_image">
                        <img src="{{ asset('storage/aboutimage/'.$data->image)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="about_single_content">
                            <p>{{$data->Fp}}</P>
                        </div>
                    </div>
                </div>
                @else
                    <ul>
                        <li><h1> Sorry :'( </h1>
                        <li><h1> Informations </h1>  </li>
                        <li><h1>Comming </h1></li>
                        <li><h1>Soon....</h1></li>
                    </ul>
                @endif
            </div>
        </section>
@endsection