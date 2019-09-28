<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="page_asset/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="page_asset/css/bootstrap.min.css">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="page_asset/css/font-awesome.min.css">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="page_asset/css/style.css">
    <link rel="stylesheet" id="cpswitch" href="page_asset/css/orange.css">
    <link rel="stylesheet" href="page_asset/css/responsive.css">

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="page_asset/css/owl.carousel.css">
    <link rel="stylesheet" href="page_asset/css/owl.theme.css">

    <!-- Flex Slider Stylesheet -->
    <link rel="stylesheet" href="page_asset/css/flexslider.css" type="text/css" />

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="page_asset/css/datepicker.css">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="page_asset/css/magnific-popup.css">

    <!-- Slick Stylesheet -->
		<link rel="stylesheet" href="page_asset/css/slick.css">
    <link rel="stylesheet" href="page_asset/css/slick-theme.css">
    <style>
        .user-area {
            float: right;
            padding-right: 0;
            position: relative;
            padding-left: 20px;
        }
        .dropdown .dropdown-toggle {
            line-height: 55px;
            
        }
        .user-area .dropdown-toggle {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .user-area .dropdown-toggle {
            position: relative;
            z-index: 0;
        }
        .user-area .user-menu {
            background: #fff;
            border: none;
            left: inherit !important;
            right: 0;
            top: 40px !important;
            margin: 0;
            max-width: 150px;
            padding: 5px 10px;
            position: absolute;
            width: 100%;
            z-index: 999;
            -webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, 0.7);
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.7);
        }
        .user-area .user-avatar {
            float: right;
            width: 30px;
            border: 2px solid #849896;
        }
        .rounded-circle {
            border-radius: 50%!important;
        }
        .user-options{
            overflow-wrap: break-word;
            word-wrap: break-word;
            hyphens: auto;
            padding: 0px;
            display: block;
            margin-left: -5px;
            color: #58595b;
        }
        .count-noti{
            background: red;
            border-radius: 50%;
            color: #fff;
            font-size: 11px;
            line-height: 10px;
            right: 0px;
            top: -2px;
            min-width: 12px;
            min-height: 12px;
            position: absolute;
            padding: 2px;
            text-align: center;
        }
    </style>
    @yield('css')
</head>
<body id="@yield('id-body')">

    <!--====== LOADER =====-->
    <div class="loader"></div>


    <!--======== SEARCH-OVERLAY =========-->
    @include('page_layout.search_overlay')


    <!--============= TOP-BAR ===========-->
    @include('page_layout.top_bar')

    <!--================ NAV BAR===============-->
    @include('page_layout.nav_bar')

    @yield('breadcrumb')

    @yield('content')

    <!--======================= FOOTER =======================-->
    @include('page_layout.footer')


<!-- Page Scripts Starts -->
<script src="page_asset/js/jquery.min.js"></script>
<script src="page_asset/js/jquery.magnific-popup.min.js"></script>
<script src="page_asset/js/bootstrap.min.js"></script>
<script src="page_asset/js/jquery.flexslider.js"></script>
<script src="page_asset/js/bootstrap-datepicker.js"></script>
<script src="page_asset/js/owl.carousel.min.js"></script>
<script src="page_asset/js/custom-navigation.js"></script>
<script src="page_asset/js/custom-flex.js"></script>
<script src="page_asset/js/custom-owl.js"></script>
<script src="page_asset/js/custom-date-picker.js"></script>
<script src="page_asset/js/custom-gallery.js"></script>
<script src="page_asset/js/slick.min.js"></script>
<script src="page_asset/js/custom-slick.js"></script>
<script src="page_asset/js/custom-ajax.js"></script>
<!-- Page Scripts Ends -->
@yield('javascript')

</body>
</html>
