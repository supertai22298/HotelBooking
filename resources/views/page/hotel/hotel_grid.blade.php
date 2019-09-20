@extends('page_layout.page_masterpage')

@section('title')
   Danh sách khách sạn
@endsection
@section('css')
    <link rel="stylesheet" href="page_asset/css/pagination.css">
@endsection
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
                                    
                        <div class="side-bar-block filter-block">
                        <h3>Tìm theo bộ lọc</h3>
                        <p>Tìm kiếm khách sạn trong mơ ngay</p>
                        
                        <div class="panels-group">
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">					
                                    <a href="#panel-1" data-toggle="collapse" >Địa điểm<span><i class="fa fa-angle-down"></i></span></a>
                                </div><!-- end panel-heading -->
                                
                                <div id="panel-1" class="panel-collapse collapse">
                                    <div class="panel-body text-left">
                                        <ul class="list-unstyled my_check role_city">
                                            <li class="custom-check"><input type="checkbox" value="all" id="check01" name="checkAll"/>
                                            <label for="check01"><span><i class="fa fa-check"></i></span>Tất cả</label></li>
                                            @foreach ($sorts['citys']  as $city)
                                                <li class="custom-check"><input type="checkbox" value="{{$city['city']}}" id="{{$city['city']}}" name="checkbox"/>
                                                <label for="{{$city['city']}}"><span><i class="fa fa-check"></i></span>{{$city['city']}}</label></li>
                                            @endforeach
                                        </ul>
                                    </div><!-- end panel-body -->
                                </div><!-- end panel-collapse -->
                            </div><!-- end panel-default -->
                            
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">					
                                    <a href="#panel-3" data-toggle="collapse" >Đánh giá <span><i class="fa fa-angle-down"></i></span></a>
                                </div><!-- end panel-heading -->
                                
                                <div id="panel-3" class="panel-collapse collapse">
                                    <div class="panel-body text-left">
                                        <ul class="list-unstyled my_check role_rate">
                                            @foreach ($sorts['stars']  as $star)
                                            <li class="custom-check"><input value="{{$star['hotel_star']}}" type="checkbox" id="{{$star['hotel_star']}}" name="checkbox"/>
                                                <label for="{{$star['hotel_star']}}"><span><i class="fa fa-check"></i></span>{{$star['hotel_star']}} <i style="color: #faa61a" class="fa fa-star"></i></label></li>
                                                @endforeach
                                            </ul>
                                        </div><!-- end panel-body -->
                                    </div><!-- end panel-collapse -->
                                </div><!-- end panel-default -->
                        </div><!-- end panel-group -->
                        <div class="price-slider">
                            <p><input type="text" id="amount" readonly></p>
                            <div id="slider-range"></div>
                        </div><!-- end price-slider -->
                    </div><!-- end side-bar-block -->
                        
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
                        <div id="oldPanigation" class="row text-center">
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
@endsection
@section('javascript')
<script src="page_asset/js/pagination.min.js"></script>
    <script>
        var roles = {
            rate : [],
            city : [],
            price : [],
        };
        // var dataSource;
        var dataContainer = $('#contai');

        function removeValue(arr,value){
            var index = arr.indexOf(value);
            if(index > -1){
                arr.splice(index,1);
            }
        }

        $('.my_check').click(function(ev){
            $('#oldPanigation').fadeOut(0);
            if(ev.target.value) {

                var isChecked = ev.target.checked;
                var value = ev.target.value;

                if (isChecked == true) {
                    if ($(this).hasClass('role_rate')) {
                        roles.rate.push(value);   
                    } else if($(this).hasClass('role_price')) {
                        roles.role_price.push(value);
                    }else{
                        roles.city.push(value);
                    }
                } else {
                    if ($(this).hasClass('role_rate')) {
                        removeValue(roles.rate,value);
                    } else if($(this).hasClass('role_price')) {
                        removeValue(roles.role_price,value);
                    }else{
                        removeValue(roles.city,value);
                    }
                }

                // console.log(roles);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                request = $.ajax({
                    url: "{{route('get-page-sort-ajax')}}",
                    method: 'GET',
                    data: {
                        roles: roles,
                    }
                });
                request.done(function(jsonResult) {
                    console.log( jsonResult.hotels );
                    // dataSource = jsonResult;
                    $('#contai11').pagination({
                        dataSource: jsonResult.hotels,
                        pageSize: 6,
                        showPrevious: false,
                        showNext: false,
                        callback: function(data, pagination) {
                            console.log(data);
                            // console.log(pagination);
                            var html = template(data);
                            // console.log(html);
                            dataContainer.html(html);
                        }
                    })
                });
                request.fail(function(jqXHR) {
                    console.log( jqXHR.responseJSON.errors );
                });

            }
        });
        function template(data){
            var html = '';
            $.each(data, function (index, item) {
                var arrPrice = [];
                // console.log(data[index].rooms);
                for (let i = 0; i < data[index].rooms.length; i++) {
                    arrPrice.push(data[index].rooms[i].price);
                }
                var hotelAVG = avg(arrPrice);
                console.log(arrPrice);
                console.log(hotelAVG);
                // template method of yourself
                html += '<div class="col-sm-6 col-md-6 col-lg-4">'
                        +   '<div class="grid-block main-block h-grid-block">'
                        +   '<div class="main-img h-grid-img">'
                        +   ' <a href="' + '/hotel/detail/' + item['id'] + '">'
                        +   '<img src="'
                        +   '{{ asset("upload/images") }}'+ '/' + item['image']
                        +   '" class="img-responsive" alt="hotel-img" style="width: 264px; height: 190px;" />'
                        +   '</a>'
                        +    '<div class="main-mask"><ul class="list-unstyled list-inline offer-price-1">'
                        +    '<li class="price">'
                        +    Math.round(hotelAVG)
                        +   '<span class="divider">|</span><span class="pkg">1 Đêm</span></li>'
                        +    '</ul>'
                        +    '</div><!-- end main-mask -->'
                        +    '</div><!-- end h-grid-img --><div class="block-info h-grid-info"><div class="rating">'
                        ;       
                            for (i = 0; i < item['hotel_star']; i++)
                            {html +='<span><i class="fa fa-star orange"></i></span>'};
                            for (i = 0; i < (5 -item['hotel_star']); i++)
                            {html +='<span><i class="fa fa-star lightgrey"></i></span>'};
                html += '</div><!-- end rating --><h3 class="block-title"><a href="hotel-detail-left-sidebar.html">'
                        +    item['name'] + '</a></h3>'
                        +   '<p class="block-minor">Từ:' + item['city'] + '</p>'
                        +   '<div class="grid-btn">'
                        +    '<a href="' + '/hotel/detail/' + item['id'] + '" class="btn btn-orange btn-block btn-lg">Xem chi tiết</a>'
                        +    '</div><!-- end grid-btn -->'
                        +   '</div><!-- end h-grid-info -->'
                        +   '</div><!-- end h-grid-block -->'
                        +   '</div><!-- end columns -->';
                    });
            return html;
        };

        function avg(arr) {
            if (arr.length > 0) {
                var sum = arr.map( function(elt){ // assure the value can be converted into an integer
                    return /^\d+$/.test(elt) ? parseInt(elt) : 0; 
                    })
                    .reduce( function(a,b){ // sum all resulting numbers
                    return a+b
                    });
                return sum / arr.length;
            } else {
                return 'dasdas';
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.home-status').removeClass('active');
            $('.hotel-status').addClass('active');
        });
    
    </script>
@endsection