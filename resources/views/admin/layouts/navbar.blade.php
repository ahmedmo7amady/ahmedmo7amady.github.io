<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>{{env('APP_NAME')}} </b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{env('APP_NAME')}}</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      @include('admin.layouts.menu')

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url ('/design/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Ahmed Moahmady</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
        <li><a href="{{url('/admin/about')}}"><i class="fa fa-circle-o"></i><span> About</span></a></li>
        <li><a href="{{url('/admin/contact')}}"><i class="fa fa-circle-o"></i><span> Contact</span></a></li>
        <li><a href="{{url('/admin/blog')}}"><i class="fa fa-circle-o"></i> <span>Posts </span></a></li>
        <li><a href="{{url('/admin/blog/create')}}"><i class="fa fa-circle-o"></i><span> Create New Post </span></a></li>
        <li><a href="{{url('/admin/table')}}"><i class="fa fa-circle-o"></i><span> Tables</span></a></li>
        <li><a href="{{url('/admin/event')}}"><i class="fa fa-circle-o"></i><span> Events</span></a></li>
        <li><a href="{{url('/admin/menu/categories')}}"><i class="fa fa-circle-o"></i><span> Menu Categories</span></a></li>
        <li><a href="{{url('/admin/chef')}}"><i class="fa fa-circle-o"></i><span> Chefs</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>