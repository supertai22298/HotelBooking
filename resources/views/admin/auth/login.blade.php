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
    

</head>
<body>

    <!--====== LOADER =====-->
    <div class="loader"></div>


    <!--======== SEARCH-OVERLAY =========-->
    @include('page_layout.search_overlay')

    <!--================ NAV BAR===============-->
    @include('page_layout.nav_bar')

    <section class="innerpage-wrapper">
        <div id="login" class="innerpage-section-padding">
            <div class="container" style="    display: flex; justify-content: center;">
                    <div class="col-sm-8">
                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>Login</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <form id="loginForm" action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                            <input name="username" type="text" class="form-control" placeholder="Username"  required/>
                                            <span><i class="fa fa-user"></i></span>
                                    </div>
                                    <div class="form-group">
                                            <input name="password" type="password" class="form-control" placeholder="Password"  required/>
                                            <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    <div class="checkbox" style="margin-bottom: 10px;">
                                            <label><input type="checkbox"> Remember me</label>
                                    </div>
                                    @if (session('msg'))
                                        <p class=" alert alert-danger">
                                        {{session('msg')}}
                                        </p>
                                    @endif
                                    <button type="submit" class="btn btn-orange btn-block">Login</button>
                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line">New Here ? <a href="#">Signup</a></p>
                                    <a class="simple-link" href="#">Forgot Password ?</a>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->
                        </div><!-- end form-content -->
                </div><!-- end row -->
            </div><!-- end container -->         
        </div><!-- end login -->
    </section><!-- end innerpage-wrapper -->

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
</body>
</html>
