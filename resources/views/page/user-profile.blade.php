@extends('page_layout.page-masterpage')

@section('title')
Thông tin tài khoản
@endsection

@section('content')

    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">My Account</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="dashboard" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="dashboard-heading">
                            <h2>Travel <span>Profile</span></h2>
                            <p>Hi Lisa, Welcome to Star Travels!</p>
                            <p>All your trips booked with us will appear here and you'll be able to manage everything!</p>
                        </div><!-- end dashboard-heading -->
                        
                        <div class="dashboard-wrapper">
                            <div class="row">
                            
                                <div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                    <ul class="nav nav-tabs nav-stacked text-center">
                                        <li><a href="dashboard.html"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                        <li class="active"><a href="#"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                        <li><a href="booking.html"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                        <li><a href="wishlist.html"><span><i class="fa fa-heart"></i></span>Wishlist</a></li>
                                        <li><a href="cards.html"><span><i class="fa fa-credit-card"></i></span>My Cards</a></li>
                                    </ul>
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                    <h2 class="dash-content-title">My Profile</h2>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><h4>Profile Details</h4></div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-5 col-md-4 user-img">
                                                    <img src="page_asset/images/user-profile.jpg" class="img-responsive" alt="user-img" />
                                                </div><!-- end columns -->
                                                
                                                <div class="col-sm-7 col-md-8  user-detail">
                                                    <ul class="list-unstyled">
                                                        <li><span>Name:</span> Lisa Jorge</li>
                                                        <li><span>Date of Birth:</span> 25 Jan 1987</li>
                                                        <li><span>Email:</span> youremail@gmail.com</li>
                                                        <li><span>Phone:</span> +31 123 456 7890</li>
                                                        <li><span>Address:</span> 23 Block, Lorem Ipsum, California.</li>
                                                        <li><span>Country:</span> United States of America</li>
                                                    </ul>
                                                    <button class="btn" data-toggle="modal" data-target="#edit-profile">Edit Profile</button>
                                                    </div><!-- end columns -->
                                                
                                                <div class="col-sm-12 user-desc">
                                                    <h4>About You</h4>
                                                    <p>Vestibulum tristique, justo eu sollicitudin sagittis, metus dolor eleifend urna, quis scelerisque purus quam nec ligula. Suspendisse iaculis odio odio, ac vehicula nisi faucibus eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere semper sem ac aliquet. Duis vel bibendum tellus, eu hendrerit sapien. Proin fringilla, enim vel lobortis viverra, augue orci fringilla diam, sed cursus elit mi vel lacus. Nulla facilisi. Fusce sagittis, magna non vehicula gravida, ante arcu pulvinar arcu, aliquet luctus arcu purus sit amet sem. Mauris blandit odio sed nisi porttitor egestas. Mauris in quam interdum purus vehicula rutrum quis in sem. Integer interdum lectus at nulla dictum luctus. Sed risus felis, posuere id condimentum non, egestas pulvinar enim. Praesent pretium risus eget nisi ullamcorper fermentum. Duis lacinia nisi ac rhoncus vestibulum.</p>
                                                
                                                </div><!-- end columns -->
                                            </div><!-- end row -->
                                            
                                        </div><!-- end panel-body -->
                                    </div><!-- end panel-detault -->
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </div><!-- end dashboard-wrapper -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->          
        </div><!-- end dashboard -->
    </section><!-- end innerpage-wrapper -->

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter-1')

@endsection
