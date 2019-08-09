@extends('page_layout.page-masterpage')

@section('title')
Coming soon
@endsection

@section('content')

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="coming-soon-text" class="section-padding back-size">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="company-name"><span><i class="fa fa-plane"></i>Star</span>Travels</h3>
                        <h2>Coming Soon</h2>
                        <p>We are still working on it.</p>
                        <form>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="form-control input-lg" placeholder="your email and get notified" required/>
                                    <span class="input-group-btn"><button class="btn btn-orange"><i class="fa fa-angle-right"></i></button></span>
                                </div>
                            </div>
                        </form>
                        
                        <ul class="list-inline list-unstyled timer">
                            <li><span class="digit">24</span>days</li>
                            <li><span class="digit">23</span>hours</li>
                            <li><span class="digit">59</span>minutes</li>
                            <li><span class="digit">45</span>seconds</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end coming-soon-text -->
    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best-features')

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter-1')

@endsection
