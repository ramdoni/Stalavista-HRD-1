
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="{{ get_setting('description-website') }}">
  <meta name="keywords" content="{{ get_setting('keyword-website') }}">
  <meta name="author" content="{{ get_setting('author') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') - {{ get_setting('title') }}</title>
  <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/timeline.css') }}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-compact-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/jquery-ui.min.css') }}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"> -->
  <!-- END Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

  <style type="text/css">
    .bg-info {
      background: #4c3c84;
    }
  </style>
</head>
<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark bg-info navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="{{ route('administrator.dashboard') }}">
              <!-- <img class="brand-text" alt="{{ get_setting('title') }}" src="{{ asset('images/logo/logo.png') }}" style="width: 160px;"> -->
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>
              <ul class="mega-dropdown-menu dropdown-menu row">
                <li class="col-md-2">
                  <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> News</h6>
                  <div id="mega-menu-carousel-example">
                    <div>
                      <img class="rounded img-fluid mb-1" src="../../../app-assets/images/slider/slider-2.png"
                      alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>
                      <p class="news-content">
                        <span class="font-small-2">January 26, 2018</span>
                      </p>
                    </div>
                  </div>
                </li>
                <li class="col-md-3">
                  <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> Drill down menu</h6>
                  <ul class="drilldown-menu">
                    <li class="menu-list">
                      <ul>
                        <li>
                          <a class="dropdown-item" href="layout-2-columns.html"><i class="ft-file"></i> Page layouts & Templates</a>
                        </li>
                        <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>
                          <ul>
                            <li><a class="dropdown-item" href="#"><i class="la la-bookmark-o"></i>  Second level</a></li>
                            <li><a href="#"><i class="la la-lemon-o"></i> Second level menu</a>
                              <ul>
                                <li><a class="dropdown-item" href="#"><i class="la la-heart-o"></i>  Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="la la-file-o"></i> Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="la la-trash-o"></i> Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="la la-clock-o"></i> Third level</a></li>
                              </ul>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="la la-hdd-o"></i> Second level, third link</a></li>
                            <li><a class="dropdown-item" href="#"><i class="la la-floppy-o"></i> Second level, fourth link</a></li>
                          </ul>
                        </li>
                        <li>
                          <a class="dropdown-item" href="color-palette-primary.html"><i class="ft-camera"></i> Color palette system</a>
                        </li>
                        <li><a class="dropdown-item" href="sk-2-columns.html"><i class="ft-edit"></i> Page starter kit</a></li>
                        <li><a class="dropdown-item" href="changelog.html"><i class="ft-minimize-2"></i> Change log</a></li>
                        <li>
                          <a class="dropdown-item" href="https://pixinvent.ticksy.com/"><i class="la la-life-ring"></i> Customer support center</a>
                        </li>
                      </ul> 
                    </li>
                  </ul>
                </li>
                <li class="col-md-3">
                  <h6 class="dropdown-menu-header text-uppercase"><i class="la la-list-ul"></i> Accordion</h6>
                  <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                    <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                      <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne"
                        aria-expanded="true" aria-controls="accordionOne">Accordion Item #1</a></div>
                      <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne"
                      aria-expanded="true">
                        <div class="card-content">
                          <p class="accordion-text text-small-3">Caramels dessert chocolate cake pastry jujubes bonbon.
                            Jelly wafer jelly beans. Caramels chocolate cake liquorice
                            cake wafer jelly beans croissant apple pie.</p>
                        </div>
                      </div>
                      <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                        href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">Accordion Item #2</a></div>
                      <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo"
                      aria-expanded="false">
                        <div class="card-content">
                          <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly tiramisu
                            dessert pie. Tiramisu macaroon muffin jelly marshmallow
                            cake. Pastry oat cake chupa chups.</p>
                        </div>
                      </div>
                      <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                        href="#accordionThree" aria-expanded="false" aria-controls="accordionThree">Accordion Item #3</a></div>
                      <div class="card-collapse collapse" id="accordionThree" role="tabpanel" aria-labelledby="headingThree"
                      aria-expanded="false">
                        <div class="card-content">
                          <p class="accordion-text">Candy cupcake sugar plum oat cake wafer marzipan jujubes
                            lollipop macaroon. Cake dragée jujubes donut chocolate
                            bar chocolate cake cupcake chocolate topping.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="col-md-4">
                  <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-envelope-o"></i> Contact Us</h6>
                  <form class="form form-horizontal">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="inputName1">Name</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <input class="form-control" type="text" id="inputName1" placeholder="John Doe">
                            <div class="form-control-position pl-1"><i class="la la-user"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="inputEmail1">Email</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <input class="form-control" type="email" id="inputEmail1" placeholder="john@example.com">
                            <div class="form-control-position pl-1"><i class="la la-envelope-o"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="inputMessage1">Message</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>
                            <div class="form-control-position pl-1"><i class="la la-commenting-o"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 mb-1">
                          <button class="btn btn-info float-right" type="button"><i class="la la-paper-plane-o"></i> Send </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </li>
              </ul>
            </li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
              <div class="search-input">
                <input class="input" type="text" placeholder="Explore Modern...">
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">{{ Auth::user()->name }}</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('karyawan.profile') }}"><i class="ft-user"></i> Edit Profile</a>
                @if(\Session::get('is_login_administrator'))
                <a href="{{ route('karyawan.back-to-administrator') }}"class="dropdown-item"> <i class="la la-key"></i> Back to Administrator</a>
                @endif
                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-id"></i><span class="selected-language"></span></a>
              <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
              </div>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">0</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">0 </span>
                </li>
                <li class="scrollable-container media-list w-100">
                  <p class="text-center"><i>Empty</i></p>
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{ route('administrator.dashboard') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a></li>
        <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Management From</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('karyawan.cuti.index') }}">Leave Employee</a></li>
            <li><a class="menu-item" href="{{ route('karyawan.payment-request.index') }}">Payment Request</a></li>
            <li><a class="menu-item" href="{{ route('karyawan.medical.index') }}">Medical Reimbursement</a></li>
            <li><a class="menu-item" href="{{ route('karyawan.overtime.index') }}">Overtime Sheet</a></li>
            <li><a class="menu-item" href="{{ route('karyawan.exit-interview.index') }}">Exit Interview & Clearance</a></li>
            <li><a class="menu-item" href="{{ route('karyawan.training.index') }}">Training & Business Trip</a></li>
          </ul>
        </li>

        @if(cek_approval_user())
        <li>
            <a href="javascript:void(0)" class="waves-effect">
                <i class="mdi mdi-account-check fa-fw"></i> <span class="hide-menu atas">Management Approval (Assign)<span class="fa arrow"></span></span>
                @if(cek_overtime_approval_user_2() > 0 || count_approval_payment_request() > 0 || count_approval_medical_karyawan('null') > 0 || count_approval_training('null') > 0 )
                    <div class="notify" style="position: absolute;top: 61px;right: 10px;"> <span class="heartbit"></span> <span class="point"></span> </div>
                @endif
            </a>
            <ul class="nav nav-second-level">
            @foreach(list_approval_user() as $item)
                <?php if($item['link'] == 'training_mengetahui') { continue; } ?>
                <li>
                    <a href="{{ route('karyawan.approval.'.  $item['link'].'.index') }}"><i class="ti-check-box fa-fw"></i><span class="hide-menu">{{ $item['nama_menu'] }}</span>
                        
                        @if($item['link'] == 'cuti')
                            <label class="btn btn-danger btn-xs" style="position: absolute;right:10px; top: 10px;">{{ count_cuti_approved_personalia() }}</label>
                        @endif

                        @if($item['link'] == 'overtime')
                            <label class="btn btn-danger btn-xs" style="position: absolute;right:10px; top: 10px;">{{cek_overtime_approval_user_2()}}</label>
                        @endif
                        
                        @if($item['link'] =='payment_request')
                            <label class="btn btn-danger btn-xs" style="position: absolute;right:10px; top: 10px;">{{ count_approval_payment_request() }}</label>
                        @endif

                        @if($item['link'] =='medical')
                            <label class="btn btn-danger btn-xs" style="position: absolute;right:10px; top: 10px;">{{ count_approval_medical_karyawan('null') }}</label>
                        @endif

                        @if($item['link'] =='training')
                            <label class="btn btn-danger btn-xs" style="position: absolute;right:10px; top: 10px;">{{ count_approval_training('null') }}</label>
                        @endif
                    </a>
                </li>
            @endforeach
            </ul>
        </li>
    @endif
    
      </ul>
    </div>
  </div>
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">@yield('title')</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="@yield('page-url')">@yield('title')</a></li>
                </ol>
              </div>
            </div>
          </div>
          @hasSection('content')
          <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
              @hasSection('page-create')
              <button class="btn btn-info round box-shadow-2 px-2" onclick="window.location='@yield('page-create')'" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ft-plus icon-left"></i> Create @yield('title')
              </button>
              @endif
              @yield('custom-button')
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-content collapse show">
                  <div class="card-body">
                    <p>@yield('content')</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        
        @hasSection('content-2')
           @yield('content-2')
        @endif

        @include('layouts.alert')
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('layouts.footer');
  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/ui/jquery-ui.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/general.js?v='. date('YmdHis')) }}"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}"
  type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"
  type="text/javascript"></script>
  <script src="{{ asset('app-assets/data/jvector/visitor-data.js') }}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('js/jquery.priceformat.min.js') }}"></script>
  <!-- END PAGE VENDOR JS-->
  <script src="{{ asset('js/bootbox.min.js') }}"></script> 
  <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}?rand={{ date('YmdHis') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  @include('layouts.form-popup-status')
  @yield('js')
  @yield('footer-script')
</body>
</html>