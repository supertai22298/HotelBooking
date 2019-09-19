@extends('page_layout.page_masterpage')

@section('title')
   Danh sách khách sạn
@endsections
@section('content')
        
        
    <!--=================== PAGE-COVER =================-->
    <section class="page-cover" id="cover-hotel-grid-list">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <h1 class="page-title">Danh sách khách sạn</h1>
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">Danh sách khách sạn</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
        
      
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
    <div id="hotel-grid" class="innerpage-section-padding">
            <div class="container">
                <div class="row">        	
                    
                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                                    
                        @include('page.components.sort')
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block main-block ad-block">
                                    <div class="main-img ad-img">
                                        <a href="#">
                                            <img src="page_asset/images/car-ad.jpg" class="img-responsive" alt="car-ad" />
                                            <div class="ad-mask">
                                                <div class="ad-text">
                                                    <span>Luxury</span>
                                                    <h2>Car</h2>
                                                    <span>Offer</span>
                                                </div><!-- end ad-text -->
                                            </div><!-- end columns -->
                                        </a>
                                    </div><!-- end ad-img -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->
                            
                            <div class="col-xs-12 col-sm-6 col-md-12">    
                                <div class="side-bar-block support-block">
                                    <h3>Cần hỗ trợ</h3>
                                    <p>Website hatabook hoạt động 24/24 để đáp ứng nhu cầu khách hàng </p>
                                    <div class="support-contact">
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>+84 123 456 789</p>
                                    </div><!-- end support-contact -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->
                            
                        </div><!-- end row -->
                    </div><!-- end columns -->
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side" id="contai11">
                        <div class="row" id="contai">
                            @foreach ($hotels as $hotel)
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <div class="grid-block main-block h-grid-block">
                                    <div class="main-img h-grid-img">
                                        <a href="{{ route('get-page-hotel-hotelDetail', ['id' => $hotel->id]) }}">
                                        <img src="{{ asset('upload/images' . '/'. $hotel->image) }}" class="img-responsive" alt="hotel-img" style="width: 264px; height: 190px;" />
                                            </a>
                                            <div class="main-mask">
                                                <ul class="list-unstyled list-inline offer-price-1">
                                                    <li class="price">{{ $hotel->rooms->avg('price') }}<span class="divider">|</span><span class="pkg">1 Đêm</span></li>
                                                </ul>
                                            </div><!-- end main-mask -->
                                    </div><!-- end h-grid-img -->
                                        
                                        <div class="block-info h-grid-info">
                                            <div class="rating">
                                               @for ($i = 0; $i < $hotel->hotel_star; $i++)
                                                <span><i class="fa fa-star orange"></i></span>
                                               @endfor
                                               @for ($i = 0; $i < (5 -$hotel->hotel_star); $i++)
                                                <span><i class="fa fa-star lightgrey"></i></span>
                                               @endfor
                                            </div><!-- end rating -->
                                            
                                            <h3 class="block-title"><a href="hotel-detail-left-sidebar.html">{{ $hotel->name }}</a></h3>
                                            <p class="block-minor">Từ: {{ $hotel->city }}</p>
                                            <div class="grid-btn">
                                            <a href="{{ route('get-page-hotel-hotelDetail', ['id' => $hotel->id]) }}" class="btn btn-orange btn-block btn-lg">Xem chi tiết</a>
                                            </div><!-- end grid-btn -->
                                        </div><!-- end h-grid-info -->
                                    </div><!-- end h-grid-block -->
                                </div><!-- end columns -->
                            @endforeach
                        </div><!-- end row -->
                        <div class="row text-center">
                            {{ $hotels->links() }}
                        </div><!-- end pages -->
                    </div><!-- end columns -->
    
                </div><!-- end row -->
        </div><!-- end container -->
        </div><!-- end hotel-grid -->
    </section><!-- end innerpage-wrapper -->
    
    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')
    
    
    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')
    b:sec
@endsection
@section('javascript')
    <script>
        $(document).ready(function(){
            $('.home-status').removeClass('active');
            $('.hotel-status').addClass('active');
        });
    
    </script>
@endsection