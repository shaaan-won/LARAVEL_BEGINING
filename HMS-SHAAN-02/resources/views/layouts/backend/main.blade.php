<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets-mofi')}}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets-mofi')}}/images/favicon.png" type="image/x-icon">
    <title>Mofi-Shaan's</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/datatables.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/style.css">
    <link id="color" rel="stylesheet" href="{{ asset('assets-mofi')}}/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-mofi')}}/css/responsive.css">
    <script src="{{ asset('assets-mofi')}}/js/jquery.min.js"></script>
  </head>
  <body> 
    <div class="loader-wrapper"> 
      <div class="loader loader-1">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
        <div class="loader-inner-1"></div>
      </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper StartMy Currencies-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <div class="page-header row">
        <!-- Page Header Start-->
        @include('layouts.backend.header')
        <!-- Page Header Ends                              -->
      </div>
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('layouts.backend.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          @yield('page-content')
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('layouts.backend.footer')
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets-mofi')}}/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets-mofi')}}/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets-mofi')}}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('assets-mofi')}}/js/scrollbar/simplebar.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets-mofi')}}/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets-mofi')}}/js/sidebar-menu.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/sidebar-pin.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/slick/slick.min.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/slick/slick.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/header-slick.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/chart/apex-chart/apex-chart.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/chart/apex-chart/stock-prices.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/chart/apex-chart/moment.min.js"></script>
    <!-- calendar js-->
    <script src="{{ asset('assets-mofi')}}/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/datatable/datatables/datatable.custom.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/datatable/datatables/datatable.custom1.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/dashboard/dashboard_4.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets-mofi')}}/js/script.js"></script>
    <script src="{{ asset('assets-mofi')}}/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    <script src="{{ asset('assets-mofi')}}/js/custom-script.js"></script>
  </body>
</html>