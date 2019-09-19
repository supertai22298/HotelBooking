@extends('page_layout.page_masterpage')
@section('title')
    Trang chủ
@endsection

@section('id-body')
main-homepage
@endsection
@section('content')
    <!--========================= FLEX SLIDER =====================-->
    <section class="flexslider-container" id="flexslider-container-1">

        <div class="flexslider slider" id="slider-1">
            <ul class="slides">
                
                <li class="item-1" style="background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(page_asset/images/homepage-slider-1.jpg) 50% 0%;
                    background-size:cover;
                    height:100%;">
                    <div class=" meta">         
                        <div class="container">
                            <h2>Khám phá</h2>
                            <h1>Đà Nẵng - Việt Nam</h1>
                            {{-- Route dẫn đến địa điểm tìm kiếm các khách sạn thuộc đà nẵng --}}
                            <a href="#" class="btn btn-default">Xem thêm</a>
                        </div><!-- end container -->  
                    </div><!-- end meta -->
                </li><!-- end item-1 -->
                
                <li class="item-2" style="background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(page_asset/images/homepage-slider-2.jpg) 50% 0%;
                    background-size:cover;
                    height:100%;">
                    <div class=" meta">         
                        <div class="container">
                            <h2>Tận hưởng</h2>
                            <h1>Không gian sang trọng</h1>
                            <a href="#" class="btn btn-default">Xem thêm</a>
                        </div><!-- end container -->  
                    </div><!-- end meta -->
                </li><!-- end item-2 -->
               
            </ul>
        </div><!-- end slider -->
        
        <div class="search-tabs" id="search-tabs-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    
                        <ul class="nav nav-tabs center-tabs">
                            <li class="active"><a href="#hotels" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">Đặt phòng ngay</span></a></li>
                        </ul>
    
                        <div class="tab-content">
                            <div id="hotels" class="tab-pane in active">
                                <form action="{{route('get-page-searchFilter-store')}}" method="GET">
                                    {{-- @csrf --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="form-group left-icon">
                                                        <input name="date_from" type="text" class="form-control dpd1" placeholder="Ngày đến" >
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="form-group left-icon">
                                                        <input name="date_to" type="text" class="form-control dpd2" placeholder="Ngày đi" >
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->
    
                                            </div><!-- end row -->								
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                            <div class="row">
                                            
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group right-icon">
                                                        <select name="room_type" class="form-control">
                                                            <option value="-1">Phòng</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-6 col-sm-6 col-md-4">
                                                    <div class="form-group right-icon">
                                                        <select name="adult" class="form-control">
                                                            <option value="-1">Người lớn</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-6 col-sm-6 col-md-4">
                                                    <div class="form-group right-icon">
                                                        <select name="kid" class="form-control">
                                                            <option value="-1">Trẻ em</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                            <button type="submit" class="btn btn-orange">Tìm phòng</button>
                                        </div><!-- end columns -->
                                        
                                    </div><!-- end row -->
                                </form>
                            </div><!-- end hotels -->
                        </div><!-- end tab-content -->
                        
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end search-tabs -->
        
    </section><!-- end flexslider-container -->
    
    <!--=============== HOTEL OFFERS ===============-->
    @include('page.components.hotel_offers')

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')

    <!--=============== LUXURY ROOMS ===============-->
    @include('page.components.luxury_rooms')
        
    <!--================ PACKAGES ==============-->
    @include('page.components.packages')

    <!--==================== VIDEO BANNER ===================-->
    @include('page.components.video_banner')
    
    <!--==================== HIGHLIGHTS ====================-->
    @include('page.components.hightlights')
    
    <!--==================== TESTIMONIALS ====================-->
    @include('page.components.testimonials')   
    
    <!--================ LATEST BLOG ==============-->
    @include('page.components.lasted_blog')

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')
    
    {{-- alert middleware --}}
    @if (session('alert'))
        <script>
            alert('Bạn cần logout để sử dụng chức năng này');
        </script>
    @endif
@endsection
