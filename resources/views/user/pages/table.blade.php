@extends('user.main')
@section('content')
            <!--================Banner Area =================-->
            <section class="banner_area">
                    <div class="container">
                        <div class="banner_content">
                            <h4>Table Form</h4>
                            <a href="#">Home</a>
                            <a class="active" href="table.html">Table Form</a>
                        </div>
                    </div>
                </section>
                <!--================End Banner Area =================-->
                
                <!--================Booking Table Area =================-->
                <section class="booking_table_area booking_area_white">
                    <div class="container">
                        <div class="s_black_title">
                            <h3>Book a</h3>
                            <h2>Table</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        <form action="table/booking" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                <div>
                                    <input size="16" type="date" class="form-control"  name="date" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <input size="16" type="time" name="time" class="form-control" placeholder="Dining Time">
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <input size="16" class="form-control" name="size" type="number" value=""  placeholder="Number Of Persons">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-default submit_btn">BOOK MY TABLE</button>
                            </div>
                        </form>
                        </div>
                        @include('user.layouts.message')
                        
                    </div>
                </section>
                <!--================End Booking Table Area =================-->
                
@endsection