@extends('user.main')
@section('content')
<section class="banner_area">
        <div class="container">
            <div class="banner_content">
                <h4>Contact Us</h4>
                <a href="#">Home</a>
                <a class="active" href="blog-gallery.html">Contat Us</a>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->
    
    <!--================Contact Area =================-->
    <section class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact_details">
                        <h3 class="contact_title">Contact Info</h3>
                        @foreach ($data as $value)
                        <p>{{$value->firstpr}}</p>
                        <p>{{$value->secondpr}}</p>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="media-body">
                                <h4>Addtress</h4>
                                <h5>{{$value->address}}</h5>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4>Phone</h4>
                                <h5>{{$value->phone}}</h5>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="media-body">
                                <h4>Email</h4>
                                <h5>{{$value->email}}</h5>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row contact_form_area">
                        <h3 class="contact_title">Send Message</h3>
                        <form action="{{url('contact/send_message')}}" method="post" id="contactForm">
                            @csrf
                            <div class="form-group col-md-12">
                              <input type="text" class="form-control"   name="Fname" placeholder="First Name *">
                            </div>
                            <div class="form-group col-md-12">
                              <input type="text" class="form-control"  name="Lname" placeholder="Last Name *">
                            </div>
                           
                            <div class="form-group col-md-12">
                              <input type="email" class="form-control"  name="email" placeholder="Your Email *">
                            </div>
                             <div class="form-group col-md-12">
                              <input type="text" class="form-control"  name="subject" placeholder="Subject *">
                            </div>
                            <div class="form-group col-md-12">
                              <textarea class="form-control"  name="message" placeholder="Write Message *"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button class="btn btn-default submit_btn"  type="submit">Send Message</button>
                             </div>
                        </form>
                        @include('user.layouts.message')
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================End Contact Area =================-->
    

    
@endsection