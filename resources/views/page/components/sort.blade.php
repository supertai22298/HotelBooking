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
            
            <div class="panel panel-default">
                <div class="panel-heading">					
                    <a href="#panel-2" data-toggle="collapse" >Giá<span><i class="fa fa-angle-down"></i></span></a>
                </div><!-- end panel-heading -->
                
                <div id="panel-2" class="panel-collapse collapse">
                    <div class="panel-body text-left">
                        <ul class="list-unstyled my_check role_price">
                            <li class="custom-radio"><input type="radio" checked value=">0" id="0" name="radio"/>
                            <label for="1000"><span></span>Tất cả</label></li>
                            <li class="custom-radio"><input type="radio" value="<1000000" id="1000" name="radio"/>
                            <label for="1000"><span></span><= 1000.000</label></li>
                            <li class="custom-radio"><input type="radio" value="<2000000" id="2000" name="radio"/>
                            <label for="2000"><span></span><= 2000.000</label></li>
                            <li class="custom-radio"><input type="radio" value=">2000000" id="2001" name="radio"/>
                            <label for="2001"><span></span>>= 2000.000</label></li>
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

@section('javascript')
<script src="page_asset/js/pagination.min.js"></script>
<script>
        var roles = {
            rate : [],
            city : [],
            price : '',
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
                        roles.price = value;
                    }else{
                        roles.city.push(value);
                    }
                } else {
                    if ($(this).hasClass('role_rate')) {
                        removeValue(roles.rate,value);
                    } else if($(this).hasClass('role_city')) {
                        removeValue(roles.city,value);
                    }
                }

                // console.log(roles);
                // console.log(roles);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                request = $.ajax({
                    url: "{{route('get-page-sort-room-ajax')}}",
                    method: 'GET',
                    data: {
                        roles: roles,
                    }
                });
                request.done(function(jsonResult) {
                    // console.log( jsonResult );
                    dataSource = jsonResult;
                    //phaan trang
                    $('#contai11').pagination({
                        dataSource: jsonResult,
                        pageSize: 6,
                        showPrevious: false,
                        showNext: false,
                        callback: function(data, pagination) {
                            // console.log(data);
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
                
                html += '<div class="col-sm-6 col-md-6 col-lg-4">'
                        +   '<div class="grid-block main-block h-grid-block">'
                        +   '<div class="main-img h-grid-img">'
                        +   ' <a href="' + '/room/detail/' + item['id'] + '">'
                        +   '<img src="'
                        +   '{{ asset("upload/images") }}'+ '/' + item['image']
                        +   '" class="img-responsive" alt="hotel-img" style="width: 264px; height: 190px;" />'
                        +   '</a>'
                        +    '<div class="main-mask"><ul class="list-unstyled list-inline offer-price-1">'
                        +    '<li class="price">'
                        +    item['price']
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
                        +   '<p class="block-minor">Khách sạn:' + item['hotel_name'] + '</p>'
                        +   '<div class="grid-btn">'
                        +    '<a href="' + '/room/detail/' + item['id'] + '" class="btn btn-orange btn-block btn-lg">Xem chi tiết</a>'
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
@endsection