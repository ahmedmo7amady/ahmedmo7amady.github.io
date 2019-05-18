
        <!--================start header Area =================-->
@include('user.layouts.header')
        <!--================end header Area =================-->

       
        <!--================ Frist topbar Area =================-->
@include('user.layouts.topbar')
        <!--================End topbar Area =================-->

        
        <!--================start navbar Area =================-->
 @include('user.layouts.navbar')
        <!--================End navbar Area =================-->


        <!--================start content Area =================-->

        @yield('content')
        
        <!--================end content Area =================-->.


        <!--================start footer Area =================-->
@include('user.layouts.footer')
        <!--================ end  footer Area =================-->

