@extends('page_layout.page-masterpage')

@section('title')
404 - Not Found
@endsection

@section('content')

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="error-text" class="section-padding back-size">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="company-name"><span><i class="fa fa-plane"></i></span>StarTravels</h3>
                        <h2>404</h2>
                        <p>The page you were looking for could not be found.</p>
                        <a href="index.html" class="btn btn-w-border">Go Back Home</a>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end error-text -->
    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best-features')

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter-1')

@endsection
