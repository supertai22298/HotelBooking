@extends('page_layout.page_masterpage')

@section('title')
Quản lý tài khoản
@endsection

@section('content')

    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Tài khoản của tôi</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('get-page-view')}}">Trang chủ</a></li>
                        <li class="active">Tài khoản của tôi</li>
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
                            
                            {{-- include component wellcome --}}
                            @include('page.components.wellcome')
                            {{-- end wellcome --}}
                            
                            <div class="dashboard-wrapper">
                                <div class="row">
                                
                                    <div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                        <ul class="nav nav-tabs nav-stacked text-center">
                                            <li class="active"><a href=""><span><i class="fa fa-cogs"></i></span>Bảng điều khiển</a></li>
                                            <li><a href="{{route('get-page-userProfile-view')}}"><span><i class="fa fa-user"></i></span>Hồ sơ cá nhân</a></li>
                                            <li><a href="booking.html"><span><i class="fa fa-briefcase"></i></span>Đặt phòng</a></li>
                                            {{-- <li><a href="wishlist.html"><span><i class="fa fa-heart"></i></span>Wishlist</a></li>
                                            <li><a href="cards.html"><span><i class="fa fa-credit-card"></i></span>My Cards</a></li> --}}
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content">
                                        <h2 class="dash-content-title">Total Traveled</h2>
                                        <div class="row info-stat">
                                        
                                            <div class="col-sm-6 col-md-3">
                                                <div class="stat-block">
                                                    <span><i class="fa fa-tachometer"></i></span>
                                                    <h3>1548</h3>
                                                    <p>Miles</p>
                                                </div><!-- end stat-block -->
                                            </div><!-- end columns -->
                                            
                                            <div class="col-sm-6 col-md-3">
                                                <div class="stat-block">
                                                    <span><i class="fa fa-globe"></i></span>
                                                    <h3>12%</h3>
                                                    <p>World</p>
                                                </div><!-- end stat-block -->
                                            </div><!-- end columns -->
                                            
                                            <div class="col-sm-6 col-md-3">
                                                <div class="stat-block">
                                                    <span><i class="fa fa-building"></i></span>
                                                    <h3>312</h3>
                                                    <p>Cities</p>
                                                </div><!-- end stat-block -->
                                            </div><!-- end columns -->
                                            
                                            <div class="col-sm-6 col-md-3">
                                                <div class="stat-block">
                                                    <span><i class="fa fa-paper-plane"></i></span>
                                                    <h3>102</h3>
                                                    <p>Trips</p>
                                                </div><!-- end stat-block -->
                                            </div><!-- end columns -->
                                            
                                        </div><!-- end row -->
                                        
                                        <div class="dashboard-listing recent-activity">
                                            <h3 class="dash-listing-heading">Hoạt động gần đây</h3>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bars"></i></td>
                                                            <td class="dash-list-text recent-ac-text">Your listing <span>The Star Travel</span> has been approved!</td>
                                                            <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="dash-list-icon recent-ac-icon"><i class="fa fa-star"></i></td>
                                                            <td class="dash-list-text recent-ac-text">Kathy Brown left a review on <span>The Star Travel</span></td>
                                                            <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bookmark"></i></td>
                                                            <td class="dash-list-text recent-ac-text">Someone bookmarked your Norma <span>Spa Center</span> listing!</td>
                                                            <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="dash-list-icon recent-ac-icon"><i class="fa fa-star"></i></td>
                                                            <td class="dash-list-text recent-ac-text">Kathy Brown left a review on <span>Auto Repair Shop</span></td>
                                                            <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bookmark"></i></td>
                                                            <td class="dash-list-text recent-ac-text">Someone bookmarked your <span>The Star Apartment</span> listing!</td>
                                                            <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div><!-- end recent-activity -->
                                        
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Hóa đơn</h3>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                            <td class="dash-list-text invoice-text">
                                                                <h4 class="invoice-title">Professional Plan</h4>
                                                                <ul class="list-unstyled list-inline invoice-info">
                                                                    <li class="invoice-status red">Unpaid</li>
                                                                    <li class="invoice-order"> Order: #00214</li>
                                                                    <li class="invoice-date"> Date: 25/08/2017</li>
                                                                </ul>
                                                            </td>
                                                            <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                            <td class="dash-list-text invoice-text">
                                                                <h4>Extended Plan</h4>
                                                                <ul class="list-unstyled list-inline invoice-info">
                                                                    <li class="invoice-status green">Paid</li>
                                                                    <li class="invoice-order"> Order: #00214</li>
                                                                    <li class="invoice-date"> Date: 25/08/2017</li>
                                                                </ul>
                                                            </td>
                                                            <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                            <td class="dash-list-text invoice-text">
                                                                <h4>Extended Plan</h4>
                                                                <ul class="list-unstyled list-inline invoice-info">
                                                                    <li class="invoice-status red">Unpaid</li>
                                                                    <li class="invoice-order"> Order: #00214</li>
                                                                    <li class="invoice-date"> Date: 25/08/2017</li>
                                                                </ul>
                                                            </td>
                                                            <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                            <td class="dash-list-text invoice-text">
                                                                <h4>Basic Plan</h4>
                                                                <ul class="list-unstyled list-inline invoice-info">
                                                                    <li class="invoice-status red">Unpaid</li>
                                                                    <li class="invoice-order"> Order: #00214</li>
                                                                    <li class="invoice-date"> Date: 25/08/2017</li>
                                                                </ul>
                                                            </td>
                                                            <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div><!-- end invoices -->
                                    </div><!-- end columns -->
                                    
                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->          
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')

@endsection
