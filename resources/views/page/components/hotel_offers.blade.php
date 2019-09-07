<section id="hotel-offers" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>Ưu đãi khách sạn</h2>
                    <hr class="heading-line" />
                </div><!-- end page-heading -->
                
                <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
                    
                    @if ($hotels)
                        @foreach ($hotels as $hotel)
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">
                                        <a href="{{ route('get-page-hotel-hotelDetail', ['id' => $hotel->id]) }}">
                                            <img src="{{ asset('upload/images/'. '/'. $hotel->image) }}" class="img-responsive" alt="hotel-img" style="width: 360px; height: 240px;" />
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="price">VND {{ $hotel->rooms->avg('price')}}<span class="divider">|</span><span class="pkg">Trung bình/Đêm</span></li>
                                                <li class="rating">
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    @if ($hotel->hotel_star == 4)
                                                        <span><i class="fa fa-star lightgrey"></i></span>
                                                    @else
                                                        <span><i class="fa fa-star orange"></i></span>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end offer-img -->
                                    
                                    <div class="main-info hotel-info">
                                        <div class="arrow">
                                            <a href="{{ route('get-page-hotel-hotelDetail', ['id' => $hotel->id]) }}"><span><i class="fa fa-angle-right"></i></span></a>
                                        </div><!-- end arrow -->
                                        
                                        <div class="main-title hotel-title">
                                            <a href="{{ route('get-page-hotel-hotelDetail', ['id' => $hotel->id]) }}">{{ $hotel->name }}</a>
                                            <p>Địa điểm: {{ $hotel->city }}</p>
                                        </div><!-- end hotel-title -->
                                    </div><!-- end hotel-info -->
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                        
                        @endforeach
                    @endif
                    
                </div><!-- end owl-hotel-offers -->
                
                <div class="view-all text-center">
                    <a href="{{ route('get-page-hotel-hotelGrid') }}" class="btn btn-orange">Xem thêm</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hotel-offers -->