@extends('page_layout.page_masterpage')

@section('title')
Đăng nhập
@endsection

@section('content')

    <!--============= PAGE-COVER =============-->
    <section class="page-cover" id="cover-login">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Login Page</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Login Page</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->

       
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="login" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
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
                                    <div class="checkbox">
                                            <label><input type="checkbox"> Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-orange btn-block">Login</button>
                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line">New Here ? <a href="#">Signup</a></p>
                                    <a class="simple-link" href="#">Forgot Password ?</a>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->
                            
                            <div class="flex-content-img custom-form-img">
                                <img src="page_asset/images/login.jpg" class="img-responsive" alt="registration-img" />
                            </div><!-- end custom-form-img -->
                        </div><!-- end form-content -->
                        
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->         
        </div><!-- end login -->
    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')


    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')

@endsection
