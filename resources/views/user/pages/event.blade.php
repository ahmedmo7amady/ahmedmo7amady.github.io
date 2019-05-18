@extends('user.main')
@section('content')
    
<section class="banner_area">
    <div class="container">
        <div class="banner_content">
            <h4>Event Form</h4>
            <a href="#">Home</a>
            <a class="active" href="table.html">Event Form</a>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Booking Table Area =================-->
<section class="booking_table_area booking_area_white">
    <div class="container">
        <div class="s_black_title">
            <h3>Book a</h3>
            <h2>Event</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>

            <form class="form_area" method="post" action="event/booking">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <div class="input-append">
                            <input size="16" type="text" value="" name="date" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="input-append date form_time">
                            <input size="16" type="text" value="" name="time"readonly placeholder="Dining Time">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="">
                                <input size="16" class="form-control" name="size" type="number" value=""  placeholder="Number Of Persons">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea class="form-control" rows="3" name="notes" placeholder="Additional notes.."></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-default submit_btn">BOOK MY TABLE</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            @include('user.layouts.message')
        </div>
    </section>
    <!--================End Booking Table Area =================-->
    
    @endsection