<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <title>@yield('title') | CITW</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{ asset('adminuser/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('adminuser/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('adminuser/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('adminuser/css/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('adminuser/js/datatables/datatables.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('adminuser/js/fuelux/fuelux.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('adminuser/js/select2/select2.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('adminuser/js/select2/theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('adminuser/css/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('adminuser/css/print.css') }}" type="text/css" media="print">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CITW') }}</title>

    <!-- Styles -->
  

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                   

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'CITW') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php 
                        //dd( @Auth::guard('user')->check() );
                        ?> 
                        
                       @if ( !Auth::guard('user')->check() ) 
                            <li><a href="{{ url('user/login') }}" class="contentcontainer med left" style="margin-left: 900px;">User Login</a></li>
                            <li><a href="{{ url('user/register') }}">User Register</a></li>
                             @else
                        <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
        <div class="navbar-header aside-md">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                <i class="fa fa-bars"></i>
            </a>
            <a href="#" class="navbar-brand" style="color: #fb6b5b; font-weight: 200" data-toggle="fullscreen">DASHBOARD<span style="font-size: 15px; color: rgb(101, 189, 119); font-weight: 900"></span></a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                <i class="fa fa-cog"></i>
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
            <li class="hidden-xs"><a href="#" class="dropdown-toggle"></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   {{ Auth::guard('user')->user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('user/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('user/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        
                    </ul>
                     </header>


 <section>
    

    <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-dark lter aside-md hidden-print" id="nav">
                <section class="vbox">
                    <header class="header bg-primary lter text-center clearfix">
                    <?php
                   $id= Auth::guard('user')->user()->id;
                   ?>
                        <div class="btn-group">
                            <a href="{{ route('order.create') }}" type="button" class="btn btn-sm btn-dark btn-icon" title="New project"><i class="fa fa-plus"></i></a>
                            <div class="btn-group hidden-nav-xs">
                                <a href="{{url('user/order/create',$id)}}" type="button" class="btn btn-sm btn-primary dropdown-toggle">
                                    Add a order
                                </a>
                            </div>
                        </div>
                    </header>
                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                            <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav">
                                    <li  class="active">
                                        <a href="{{ url('user/order') }}"   class="active">
                                            <i class="fa fa-dashboard icon">
                                                <b class="bg-danger"></b>
                                            </i>
                                            <span>Workset</span>
                                        </a>
                                    </li>
                                    <li >
                                        <a href=""  >
                                            <i class="fa fa-shopping-cart icon">
                                                <b class="bg-warning"></b>
                                            </i>
                                            <span class="pull-right">
                                                <i class="fa fa-angle-down text"></i>
                                              <i class="fa fa-angle-up text-active"></i>
                                            </span>
                                            <span>Order</span>
                                        </a>
                                        <ul class="nav lt">
                                          
                                            <li >
                                                <a href="{{ url('user/order/create') }}" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Create</span>
                                                </a>
                                            </li>
                                              <li >
                                                <a href="{{  url('user/order') }}" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>List</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                   
                                    <li >
                                        <a href=""  >
                                            <i class="fa fa-bars icon">
                                                <b class="bg-info"></b>
                                            </i>
                                            <span class="pull-right">
                                                <i class="fa fa-angle-down text"></i>
                                                <i class="fa fa-angle-up text-active"></i>
                                            </span>
                                            <span>Profile</span>
                                        </a>
                                        <ul class="nav lt">
                                            <li >
                                                <a href="{{ url('user/password') }}" >
                                                    <i class="fa fa-angle-right"></i>
                                                    <span>Change Password</span>
                                                </a>
                                            </li>
                                           <!--  <li >
                                               <a href="{{ url('admin/logout') }}" >
                                                   <i class="fa fa-angle-right"></i>
                                                   <span>Logout</span>
                                               </a>
                                           </li> -->
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <!-- / nav -->
                        </div>
                    </section>

                    <footer class="footer lt hidden-xs b-t b-dark">
                        <div id="chat" class="dropup">
                            <section class="dropdown-menu on aside-md m-l-n">
                                <section class="panel bg-white">
                                    <header class="panel-heading b-b b-light">About</header>
                                    <div class="panel-body animated fadeInRight">
                                        <p class="text-sm">Copyright © {{ date("Y") }} <b>CITW</b></p>
                                       <!--  <p>BY <strong><span style="color: green">INZAMUL</span><span style="color:red"> HAQUE</span></strong></p> -->
                                    </div>
                                </section>
                            </section>
                        </div>
                        <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                            <i class="fa fa-angle-left text"></i>
                            <i class="fa fa-angle-right text-active"></i>
                        </a>
                        <div class="btn-group hidden-nav-xs">
                            <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat"><i class="fa fa-question"></i></button>
                        </div>
                    </footer>
                </section>
            </aside>
            @endif
            <!-- /.aside -->
            @yield('content')
            <section id="content">

                @if(Session::has('message'))
                    <div class="alert {{ Session::get('m-class') }} alert-dismissible fade in" style="margin: 20px 30px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong></strong> {{ Session::get('message') }}
                    </div>
                @endif

                @yield('body')

                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                
            </section>
        </section>
    </section>
</section>
<script src="{{ asset('adminuser/js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('adminuser/js/bootstrap.js') }}"></script>
<!-- App -->
<script src="{{ asset('adminuser/js/app.js') }}"></script>
<script src="{{ asset('adminuser/js/app.plugin.js') }}"></script>
<script src="{{ asset('adminuser/js/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('adminuser/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminuser/js/fuelux/fuelux.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function () {

        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 5000);

    });
</script>

<script type="text/javascript" src="{{ asset('adminuser/js/tableExport/tableExport.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminuser/js/tableExport/jquery.base64.js') }}"></script>

<script type="text/javascript" src="{{ asset('adminuser/js/tableExport/jspdf/libs/sprintf.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminuser/js/tableExport/jspdf/jspdf.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminuser/js/tableExport/jspdf/libs/base64.js') }}"></script>

<script type="text/javascript" src="{{ asset('adminuser/js/select2/select2.min.js') }}"></script>
<script type="text/javascript">
    $('#product_id').select2();
</script>


</body>
</html>

                </div>
            </div>
        </nav>

        
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
