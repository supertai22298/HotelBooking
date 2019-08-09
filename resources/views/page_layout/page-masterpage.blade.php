<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
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
    @yield('css')
</head>
<body id="@yield('id-body')">

    <!--====== LOADER =====-->
    <div class="loader"></div>


    <!--======== SEARCH-OVERLAY =========-->
    @include('page_layout.search-overlay')


    <!--============= TOP-BAR ===========-->
    @include('page_layout.top-bar')

    <!--================ NAV BAR===============-->
    @include('page_layout.nav-bar')

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
<!-- Page Scripts Ends -->
@yield('javascript')
</body>
</html>
