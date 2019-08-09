@extends('page_layout.page-masterpage')

@section('title')
Liên hệ với chúng tôi
@endsection

@section('content')

    <!--================ PAGE-COVER ===============-->
    <section class="page-cover" id="cover-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Contact Us Page</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="contact-us" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-md-5 no-pd-r">
                        <div class="custom-form contact-form">
                            <h3>Contact Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            <form>
                                    
                                <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name"  required/>
                                        <span><i class="fa fa-user"></i></span>
                                </div>

                                <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email"  required/>
                                        <span><i class="fa fa-envelope"></i></span>
                                </div>
                                
                                <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject"  required/>
                                        <span><i class="fa fa-info-circle"></i></span>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                                
                                <button class="btn btn-orange btn-block">Send</button>
                            </form>
                        </div><!-- end contact-form -->
                    </div><!-- end columns -->
                    
                    <div class="col-sm-12 col-md-7 no-pd-l">
                        <div class="map">
                            <iframe src=		"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509729.487836256!2d-123.77686152799836!3d37.1864783963941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia!5e0!3m2!1sen!2s!4v1490695907554" allowfullscreen></iframe>
                        </div><!-- end map -->
                    </div><!-- end columns -->
                    
                </div><!-- end row -->
            </div><!-- end container -->   
        </div><!-- end contact-us -->
    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best-features')

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter-1')

@endsection
