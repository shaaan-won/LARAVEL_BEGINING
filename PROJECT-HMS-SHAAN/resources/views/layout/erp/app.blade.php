<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets')}}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.png" type="image/x-icon">
    <title>Mofi - Premium Admin Template</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/datatables.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">
    <link id="color" rel="stylesheet" href="{{asset('assets')}}/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/responsive.css">

    @yield('style')

    <script src="{{asset('assets')}}/js/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    {{-- csrf token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
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
      <!-- Page Header Start-->
      @include('layout.erp.header')
      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('layout.erp.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          @yield('page')
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('layout.erp.footer')
        <!-- footer end-->
      </div>
    </div>
    <!-- latest jquery-->
    
    {{-- <script src="{{asset('assets')}}/js/jquery-3.6.0.min.js"></script> --}}
    <!-- Bootstrap js-->
    <script src="{{asset('assets')}}/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="{{asset('assets')}}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{asset('assets')}}/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="{{asset('assets')}}/js/scrollbar/simplebar.js"></script>
    <script src="{{asset('assets')}}/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('assets')}}/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('assets')}}/js/sidebar-menu.js"></script>
    <script src="{{asset('assets')}}/js/sidebar-pin.js"></script>
    <script src="{{asset('assets')}}/js/slick/slick.min.js"></script>
    <script src="{{asset('assets')}}/js/slick/slick.js"></script>
    <script src="{{asset('assets')}}/js/header-slick.js"></script>
    <script src="{{asset('assets')}}/js/chart/apex-chart/apex-chart.js"></script>
    <script src="{{asset('assets')}}/js/chart/apex-chart/stock-prices.js"></script>
    <script src="{{asset('assets')}}/js/chart/apex-chart/moment.min.js"></script>
    <!-- calendar js-->
    <script src="{{asset('assets')}}/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/js/datatable/datatables/datatable.custom.js"></script>
    <script src="{{asset('assets')}}/js/datatable/datatables/datatable.custom1.js"></script>
    <script src="{{asset('assets')}}/js/dashboard/dashboard_4.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('assets')}}/js/script.js"></script>

    {{-- if you want another color theme then use it  --}}
    {{-- <script src="{{asset('assets')}}/js/theme-customizer/customizer.js"></script> --}}
    <!-- Plugin used-->

    @yield('script')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    
  </body>
</html>