@extends('page_layout.page_masterpage')

@section('title')
Về chúng tôi
@endsection

@section('content')

    <!--============= PAGE-COVER =============-->
    <section class="page-cover" id="cover-about-us">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">About Us Page</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">About Us Page</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
        
    
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="about-us">

            <div id="about-content" class="section-padding"> 
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="flex-content">
                            
                                <div class="flex-content-img about-img">
                                    <img src="page_asset/images/about-us.jpg" class="img-responsive" alt="about-img" />
                                </div><!-- end about-img -->
                                
                                <div class="about-text">
                                    <div class="about-detail">
                                        <h2>About Star Travels</h2>
                                        <p>Lorem ipsum dolor sit amet, conse adipiscing elit. Curabitur metus felis, venenatis eu ultricies vel, vehicula eu urna. Phasellus eget augue id est fringilla feugiat id a tellus. Sed hendrerit quam sed ante euismod posuere ultricies. Vestibulum suscipit convallis purus ut mattis. In eget turpis eget urna molestie ultricies in sagittis nunc. Sed accumsan leo in mauris rhoncus volutpat.</p>
                                        <p>Iuvaret detraxit disputando vel ea, ut virtute per.Lorem ipsum dolor si Iuvaret detraxit. disputando velr.Lorem ipsum dolor si. Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, pro an eros perpetua ullamcorper.</p>
                                    </div><!-- end about-detail -->
                                </div><!-- end about-text -->
                                
                            </div><!-- end flex-content -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end about-content -->
            
            <div id="video-banner" class="banner-padding back-size"> 
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Take a Video Tour</h2>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</p>
                            
                            <a href="https://youtube.com/watch?v=0O2aH4XLbto" class="popup-youtube" id="play-button"><span><i class="fa fa-play"></i></span></a>
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end video-banner -->
            
            <div id="team" class="section-padding"> 
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-heading">
                                <h2>Meet Our Team</h2>
                                <hr class="heading-line" />
                            </div><!-- end page-heading -->
                    
                            <div class="owl-carousel owl-theme" id="owl-team">
                            
                                <div class="item">
                                    <div class="member-block">
                                        <div class="member-img">
                                            <img src="page_asset/images/team-member-1.jpg" class="img-responsive img-circle" alt="member-img" />                                 
                                            <ul class="list-unstyled list-inline contact-links">
                                                <li><a href="#"><span><i class="fa fa-facebook-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-twitter-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-linkedin-square"></i></span></a></li>
                                            </ul>       
                                        </div><!-- end member-img -->
                                        
                                        <div class="member-name">
                                            <h3>John Doe</h3>
                                            <p>Director</p>
                                        </div><!-- end member-name -->
                                    </div><!-- end member-block -->
                                </div><!-- end item -->
                                
                                <div class="item">
                                    <div class="member-block">
                                        <div class="member-img">
                                            <img src="page_asset/images/team-member-2.jpg" class="img-responsive img-circle" alt="member-img" />                                 
                                            <ul class="list-unstyled list-inline contact-links">
                                                <li><a href="#"><span><i class="fa fa-facebook-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-twitter-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-linkedin-square"></i></span></a></li>
                                            </ul>       
                                        </div><!-- end member-img -->
                                        
                                        <div class="member-name">
                                            <h3>John Doe</h3>
                                            <p>Director</p>
                                        </div><!-- end member-name -->
                                    </div><!-- end member-block -->
                                </div><!-- end item -->
                                
                                <div class="item">
                                    <div class="member-block">
                                        <div class="member-img">
                                            <img src="page_asset/images/team-member-3.jpg" class="img-responsive img-circle" alt="member-img" />                                 
                                            <ul class="list-unstyled list-inline contact-links">
                                                <li><a href="#"><span><i class="fa fa-facebook-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-twitter-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-linkedin-square"></i></span></a></li>
                                            </ul>       
                                        </div><!-- end member-img -->
                                        
                                        <div class="member-name">
                                            <h3>John Doe</h3>
                                            <p>Director</p>
                                        </div><!-- end member-name -->
                                    </div><!-- end member-block -->
                                </div><!-- end item -->
                                
                                <div class="item">
                                    <div class="member-block">
                                        <div class="member-img">
                                            <img src="page_asset/images/team-member-4.jpg" class="img-responsive img-circle" alt="member-img" />                                 
                                            <ul class="list-unstyled list-inline contact-links">
                                                <li><a href="#"><span><i class="fa fa-facebook-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-twitter-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-linkedin-square"></i></span></a></li>
                                            </ul>       
                                        </div><!-- end member-img -->
                                        
                                        <div class="member-name">
                                            <h3>John Doe</h3>
                                            <p>Director</p>
                                        </div><!-- end member-name -->
                                    </div><!-- end member-block -->
                                </div><!-- end item -->
                                
                                <div class="item">
                                    <div class="member-block">
                                        <div class="member-img">
                                            <img src="page_asset/images/team-member-5.jpg" class="img-responsive img-circle" alt="member-img" />                                 
                                            <ul class="list-unstyled list-inline contact-links">
                                                <li><a href="#"><span><i class="fa fa-facebook-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-twitter-square"></i></span></a></li>
                                                <li><a href="#"><span><i class="fa fa-linkedin-square"></i></span></a></li>
                                            </ul>       
                                        </div><!-- end member-img -->
                                        
                                        <div class="member-name">
                                            <h3>John Doe</h3>
                                            <p>Director</p>
                                        </div><!-- end member-name -->
                                    </div><!-- end member-block -->
                                </div><!-- end item -->
                                
                            </div><!-- end owl-team -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end team -->
                        
        </div><!-- end about-us -->
    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')

@endsection
