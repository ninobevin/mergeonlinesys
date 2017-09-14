<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Merge Online Sys</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href='{{ asset("bootstrap/css/bootstrap.min.css")}}'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='{{ asset("font-awesome/css/font-awesome.min.css")}}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='{{ asset("ionicons/css/ionicons.min.css")}}'>
  <!-- Theme style -->
  <link rel="stylesheet" href='{{ asset("bootstrap/css/jquery-ui.css")}}'>
  <link rel="stylesheet" href='{{ asset("dist/css/AdminLTE.css")}}'>
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
    page. However, you can choose any other skin. Make sure you
    apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href='{{ asset("dist/css/skins/_all-skins.min.css")}}'>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    <?php

    use \Carbon\Carbon;
    ?>
    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><i class="fa fa-globe"></i></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><i class="fa fa-globe"></i> <small>{{ config('app.name') }}</small>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

          <?php

          $duedate = 0;
          $overDue =  0;

          $totalcount = 0;
          ?>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>

                  <span class="label label-danger">{{ $totalcount }}</span>

                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {{ $totalcount }} notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">

                      <!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="">View all</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Hi, {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li> <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
      @include('main.menu.sidemenu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          @yield('pagetitle')
        </h1>
      </section>
      <!-- Main content -->
      <section class="content" style="padding-bottom: 80px">

        @yield('content')

        
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Open Source Project by Bevin Nino RN
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2016 <a href="#">Merge Online Sys</a>.</strong> All rights reserved.
    </footer>
    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.2.3 -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. Slimscroll is required when using the
fixed layout. -->
<script src='{{ asset("bootstrap/js/jquery.js")}}'></script>
<script src='{{ asset("bootstrap/js/jquery-ui.js")}}'></script>
<!-- Bootstrap 3.3.6 -->
<script src='{{ asset("bootstrap/js/bootstrap.js")}}'></script>
<!-- AdminLTE App -->
<script src='{{ asset("dist/js/app.min.js")}}'></script>
<script src='{{asset("plugins/jQuery/mark.min.js")}}'></script>
<script src='{{ asset("bootstrap/js/typeahead.js")}}'></script>
@yield('scripts')
<script type="text/javascript">

  $(document).ready(function(){

    $.ui.autocomplete.prototype._renderItem = function( ul, item){
      var term = this.term.split(' ').join('|');
      var re = new RegExp("(" + term + ")", "gi") ;
      var t = item.label.replace(re,"<b id='selectedItem'>$1</b>");
      return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append( "<a>" + t + "</a>" )
      .appendTo( ul );
    };




    $( "#search" ).autocomplete({
      source:function(request, response) {
        $.getJSON("{{ route('searchMain') }}", {term: request.term,cb_option: $('#cb_option:checked').val() },
          response);
      },
      select: function(str,ui){
//  $("#test").html(ui.item.value)
//$("#searchForm").submit();
}
});
  });
</script>
<style type="text/css">
  .error{
    color:red;
  }
  mark{
    background: yellow;
    color: black;
  }
</style>
</body>
</html>