@extends('page_layout.page_masterpage')

@section('title')
Quên mật khẩu
@endsection

@section('content')

    <!--================== PAGE-COVER ==================-->
    <section class="page-cover" id="cover-forgot-password">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Forgot Password Page</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Forgot Password Page</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
        
        
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="forgot-password" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    
                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>Forgot Password</h3>
                                <p>When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
                                <form>   
                                    <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Email"  required/>
                                            <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    
                                    <button class="btn btn-orange btn-block">Send</button>
                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line">Already Have An Account ? <a href="#">Login Here</a></p>
                                    <p class="link-line">New Here ? <a href="#">Join Us</a></p>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->
                            
                            <div class="flex-content-img custom-form-img">
                                <img src="page_asset/images/forgot-password.jpg" class="img-responsive" alt="registration-img" />
                            </div><!-- end custom-form-img -->
                        </div><!-- end form-content -->
                        
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->         
        </div><!-- end forgot-password -->
    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')

@endsection
