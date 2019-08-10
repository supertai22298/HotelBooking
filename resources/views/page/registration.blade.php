@extends('page_layout.page_masterpage')

@section('title')
Đăng ký
@endsection

@section('content')

    <!--================ PAGE-COVER =================-->
    <section class="page-cover" id="cover-registration">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Registration Page</h1>
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">Registration Page</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
       

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="registration" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>Registration</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <form>
                                        
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username"  required/>
                                        <span><i class="fa fa-user"></i></span>
                                    </div>
    
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email"  required/>
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password"  required/>
                                        <span><i class="fa fa-lock"></i></span>
                                    </div>
    
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password"  required/>
                                        <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    
                                    <button class="btn btn-orange btn-block">Register</button>
                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line">Already Have An Account ? <a href="#">Login Here</a></p>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->
                            
                            <div class="flex-content-img custom-form-img">
                                <img src="page_asset/images/registration.jpg" class="img-responsive" alt="registration-img" />
                            </div><!-- end custom-form-img -->
                        </div><!-- end form-content -->
                        
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->         
        </div><!-- end registration -->
    </section><!-- end innerpage-wrapper -->


    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')


    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')

@endsection
