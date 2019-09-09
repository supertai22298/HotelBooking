@extends('page_layout.page_masterpage')
        

    @section('title')
        Danh sách bài viết hay
    @endsection
    @section('content')
        
        <!--================= PAGE-COVER ================-->
        <section class="page-cover" id="cover-blog-listing">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Danh sách bài viết</h1>
                        <ul class="breadcrumb">
                            <li><a href="/">Trang chủ</a></li>
                            <li class="active">Danh sách bài viết</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->
        
        
        <!--==== INNERPAGE-WRAPPER =====-->
        <section class="innerpage-wrapper">
        	<div id="blog-listings" class="innerpage-section-padding">
        		<div class="container">
        			<div class="row">
                    	
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 side-bar blog-sidebar left-side-bar">
                            <div class="row">
                            	
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block ad-block">
                                        <div class="main-img ad-img">
                                            <a href="{{ route('get-page-hotel-hotelGrid') }}">
                                                <img src="{{ asset('page_asset/images/advertise.jpg') }}" class="img-responsive" alt="car-ad" />
                                            </a>
                                        </div><!-- end ad-img -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->  
                            </div><!-- end row -->
                                
                            <div class="row">    
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block contact">
                                        <h2 class="side-bar-heading">Liên hệ ngay</h2>
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-envelope"></i></span></div>
                                            <div class="text"><p>duytanuniversity@duytan.com</p></div>
                                        </div><!-- end c-list -->
                                        
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-phone"></i></span></div>
                                            <div class="text"><p>+123 456 789</p></div>
                                        </div><!-- end c-list -->
                                        
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-map-marker"></i></span></div>
                                            <div class="text"><p>Đà Nẵng, Việt Nam</p></div>
                                        </div><!-- end c-list -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
                            
                            	<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block recent-post">
                                        <h2 class="side-bar-heading">Bài viết cũ</h2>
                                        @if (count($recentBlogs) > 0)
                                            
                                            @foreach ($recentBlogs as $recentBlog)
                                                <div class="recent-block">
                                                    <div class="recent-img">
                                                        <a href="{{ route('get-page-blog-blogDetail', ['id' => $recentBlog->id]) }}"><img src="{{ asset('upload/images/' .'/'. $recentBlog->image) }}" class="img-reponsive" alt="recent-blog-image" height="67px"/></a>
                                                    </div><!-- end recent-img -->
                                                    
                                                    <div class="recent-text">
                                                        <a href="{{ route('get-page-blog-blogDetail', ['id' => $recentBlog->id]) }}"><h5>{{ $recentBlog->title }}</h5></a>
                                                        <span class="date">{{ $recentBlog->created_at }}</span>
                                                    </div><!-- end recent-text -->
                                                </div><!-- end recent-block -->
                                            @endforeach
                                        @else 
                                             Đang được cập nhật   
                                        @endif
                                    
                                   </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
							</div><!-- end row -->
                            
							<div class="row">
                            
                            	<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block follow-us">
                                        <h2 class="side-bar-heading">Theo dõi ngay</h2>
                                        <ul class="list-unstyled list-inline">
                                            <li><a href="http://facebook.com" target="_blanc"><span><i class="fa fa-facebook"></i></span></a></li>
                                            <li><a href="http://twitter.com" target="_blanc"><span><i class="fa fa-twitter"></i></span></a></li>
                                            <li><a href="http://linkedin.com" target="_blanc"><span><i class="fa fa-linkedin"></i></span></a></li>
                                            <li><a href="http://google.com" target="_blanc"><span><i class="fa fa-google-plus"></i></span></a></li>
                                            <li><a href="http://pinterest.com" target="_blanc"><span><i class="fa fa-pinterest-p"></i></span></a></li>
                                        </ul>
                                    </div><!-- end side-bar-block -->
								</div><!-- end columns -->
                                
								<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block tags">
                                        <h2 class="side-bar-heading">Thẻ</h2>
                                        <ul class="list-unstyled list-inline">
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">SPA</a></li>
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">Nhà hàng</a></li>
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">Dịch vụ</a></li>
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">Wifi</a></li>
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">Tv</a></li>
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">Phòng</a></li>
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">Hồ bơi</a></li>
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">Làm việc</a></li>
                                            <li><a href="javascript:void(0)" class="btn btn-g-border">Thể Thao</a></li>
                                        </ul>
                                    </div><!-- end side-bar-block -->
								</div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </div><!-- end columns -->
                        
                    	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                        	<div class="space-right">
                                @foreach ($blogs as $blog)
                                    <div class="main-block blog-post blog-list">
                                        <div class="main-img blog-post-img">
                                            <a href="{{ route('get-page-blog-blogDetail', ['id' => $blog->id]) }}">
                                                <img src="{{ asset('upload/images/' .'/'. $blog->image) }}" class="img-responsive" alt="blog-post-image" />
                                            </a>
                                            <div class="main-mask blog-post-info">
                                                <ul class="list-inline list-unstyled blog-post-info">
                                                    <li><span><i class="fa fa-calendar"></i></span>{{ $blog->created_at }}</li>
                                                    <li><span><i class="fa fa-user"></i></span>Người viết: <a href="javascript:void(0)">{{ $blog->author }}</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- end blog-post-img -->
                                        
                                        <div class="blog-post-detail">
                                            <h2 class="blog-post-title"><a href="blog-detail-left-sidebar.html">{{ $blog->title }}</a></h2>
                                            <p>{!! substr($blog->description, 0, 300) !!}</p>
                                            <a href="{{ route('get-page-blog-blogDetail', ['id' => $blog->id]) }}" class="btn btn-orange">Xem thêm</a>
                                        </div><!-- end blog-post-detail -->
                                    </div><!-- end blog-post -->
                                @endforeach
                                
                                <div class="row text-center">
                                    {{ $blogs->links() }}
                                </div><!-- end pages -->
                            
                            </div><!-- end space-right -->
                        </div><!-- end columns -->

                    </div><!-- end row -->
        		</div><!-- end container -->
        	</div><!-- end blog-listings --> 
        </section><!-- end innerpage-wrapper -->

        <!--======================= BEST FEATURES =====================-->
        @include('page.components.best_features')

        <!--========================= NEWSLETTER-1 ==========================-->
        @include('page.components.newsletter_1')

    @endsection
    @section('javascript')
        <script>
            $(document).ready(function(){
                $('.home-status').removeClass('active');
                $('.blog-status').addClass('active');
            });
        
        </script>
    @endsection
