@extends('page_layout.page_masterpage')

@section('title')
   Thông tin chi tiết phòng {{ $room->name }}
@endsection

@section('content')
    <!--=================== PAGE-COVER =================-->
    <section class="page-cover" id="cover-hotel-grid-list">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                <h1 class="page-title">Thông tin phòng</h1>
                  <ul class="breadcrumb">
                      <li><a href="/">Trang chủ</a></li>
                      <li class="active">Phòng {{ $room->name }}</li>
                  </ul>
              </div><!-- end columns -->
          </div><!-- end row -->
      </div><!-- end container -->
    </section><!-- end page-cover -->
    
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
      <div id="hotel-details" class="innerpage-section-padding">
            <div class="container">
                <div class="row">        	
                    
                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                        
                        <div class="side-bar-block booking-form-block">
                            <h2 class="selected-price">VND {{ $room->price }} <br> <span>1 đêm</span></h2>
                          <div class="booking-form">
                              <h3>Đặt phòng ngay</h3>
                                <p>Nhanh chóng tận hưởng du lịch</p>
                                @if (session('success'))
                                <div class="alert alert-success">
                                {{session('success')}}
                                </div>
                                @endif
                                @if (session('errorSQL'))
                                    <div class="alert alert-danger">
                                    {{session('errorSQL')}}
                                    </div>
                                @endif
                                
                                <form action={{ route('post-page-room-booking',['id' => $room->id])}} method="post">
                                @csrf
                                  <div class="form-group">
                                    <input type="text" 
                                        name="first_name" 
                                        class="form-control" 
                                        placeholder="Họ" 
                                        required 
                                        @if (Auth::check())
                                            value="{{ Auth::user()->first_name }}"
                                        @else
                                            value="{{ old('first_name') }}"
                                        @endif
                                    />                                       
                                    </div>
                                    
                                    <div class="form-group">
                                    <input 
                                        type="text" 
                                        name="last_name" 
                                        class="form-control" 
                                        placeholder="Tên" 
                                        required
                                        @if (Auth::check())
                                            value="{{ Auth::user()->last_name }}"
                                        @else
                                            value="{{ old('last_name') }}"
                                        @endif   
                                    />                                    
                                    </div>
                                    
                                    <div class="form-group">
                                    <input 
                                        type="email" 
                                        name="email" 
                                        class="form-control" 
                                        placeholder="Email" 
                                        required
                                        @if (Auth::check())
                                            value="{{ Auth::user()->email }}"
                                        @else
                                            value="{{ old('email') }}"
                                        @endif
                                    />                                       
                                    </div>
                                    
                                    <div class="form-group">
                                    <input 
                                        type="text" 
                                        name="phone_number" 
                                        class="form-control" 
                                        placeholder="Số điện thoại" 
                                        required
                                         @if (Auth::check())
                                            value="{{ Auth::user()->phone_number }}"
                                        @else
                                            value="{{ old('phone_number') }}"
                                        @endif
                                    />                                       
                                    </div>
                                    
                                    <div class="form-group">
                                    <input type="text" onfocus="(this.type='date')" name="date_from" class="form-control" placeholder="Ngày đến" required/>                                       		
                                    </div>
                                    
                                    <div class="form-group">
                                    <input type="text" onfocus="(this.type='date')" name="date_to" class="form-control" placeholder="Ngày đi" required/>                                       		
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                            <div class="form-group right-icon">
                                                <input type="number" min="1"  name="room_num" class="form-control" placeholder="Số phòng" required/>  
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-l">    
                                            <div class="form-group right-icon">
                                                <input type="number" min="1" name="bed_num" class="form-control" placeholder="Giường" required/>  
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                            <div class="form-group right-icon">
                                                <input type="number" min="1" name="adult_num" class="form-control" placeholder="Người lớn" required/>  
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-l">    
                                            <div class="form-group right-icon">
                                                <input type="number" min="0" name="kid_num" class="form-control " placeholder="Trẻ em" />  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <textarea rows="4" cols="50" name="noti" class="form-control" placeholder="Lời nhắn">Ghi chú </textarea>    
                                    </div>
                                    
                                    <div class="form-group right-icon">
                                        <select class="form-control" name="payment">
                                            <option selected>Phương thức thanh toán</option>
                                            @foreach ($paymentTypes as $paymentType)
                                                <option value="{{ $paymentType->id }}">{{ $paymentType->payment_type }}</option>
                                            @endforeach
                                            
                                        </select>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    
                                    <div class="checkbox custom-check">
                                      <input type="checkbox" id="check01" name="checkbox" required/>
                                        <label for="check01"><span><i class="fa fa-check"></i></span>Bạn đồng ý với <a href="#">Điều khoản và chính sách</a></label>
                                    </div>
                                    
                                    <button class="btn btn-block btn-orange">Xác nhận đặt phòng</button>
                                </form>

                            </div><!-- end booking-form -->
                        </div><!-- end side-bar-block -->
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12 mt-0">    
                                <div class="side-bar-block support-block mt-0">
                                    <h3>Cần hỗ trợ</h3>
                                    <p>{{ $room->hotel->motto }}</p>
                                    <p>Liên hệ ngay với chúng tôi để được tư vấn cụ thể</p>
                                    <div class="support-contact">
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>+ {{ $room->hotel->main_phone_number }}</p>
                                        <span><i class="fa fa-envelope "></i></span>
                                        <p>{{ $room->hotel->company_email_address }}</p>
                                    </div><!-- end support-contact -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->
                            
                        </div><!-- end row -->
                    </div><!-- end columns -->
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                        
                        <div class="detail-slider">
                            <div class="feature-slider">
                                <div><img src="{{ asset('upload/images/' . '/'. $room->image) }}" class="img-responsive" alt="feature-img" style="width: 848px; height: 494px;"/></div>
                                {{-- Lấy ra những ảnh của phòng thuộc khách sạn --}}
                                @foreach ($room->room_images as $image)
                                    <div><img src="{{ asset('upload/images/' . '/'. $image->image) }}" class="img-responsive" alt="feature-img" style="width: 848px; height: 494px;"/></div>
                                @endforeach

                            </div><!-- end feature-slider -->
                          
                            <div class="feature-slider-nav">
                                <div><img src="{{ asset('upload/images/' . '/'. $room->image) }}" class="img-responsive" alt="feature-img" style=" height: 120px;"/></div>

                                {{-- Lấy ra những ảnh của phòng thuộc khách sạn --}}
                                @foreach ($room->room_images as $image)
                                    <div><img src="{{ asset('upload/images/' . '/'. $image->image) }}" class="img-responsive" alt="feature-img" style="height: 120px;"/></div>
                                @endforeach

                            </div><!-- end feature-slider-nav -->
                        </div>  <!-- end detail-slider -->

                        <div class="detail-tabs">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#hotel-overview" data-toggle="tab">Chi tiết phòng</a></li>
                            </ul>
                          
                            <div class="tab-content">

                                <div id="hotel-overview" class="tab-pane in active">
                                  <div class="row">
                                    <div class="col-sm-4 col-md-4 tab-img">
                                        <img src="{{ asset('upload/images/' .'/'. $room->image) }}" class="img-responsive" alt="hotel-detail-img" style="width: 216px; height: 193px;" />
                                        </div><!-- end columns -->
                                      
                                        <div class="col-sm-8 col-md-8 tab-text">
                                        <h3>Chi tiết phòng</h3>
                                            <p>Loại phòng: {{ $room->room_type->room_type }}</p>
                                            <p>Tình trạng: {{ $room->room_status->room_status }}</p>
                                            <h4>Giá gốc: {{ $room->price }}</h4>
                                            <h4 class="text text-danger">Giá ưu đãi: {{ ($room->price * (100 - $room->discount)/100)  }}</h4>
                                            <p>{{ $room->description }}</p>
                                        </div><!-- end columns -->
                                    </div><!-- end row -->
                                </div><!-- end hotel-overview -->
                            
                            </div><!-- end tab-content -->
                        </div><!-- end detail-tabs -->
                        
                        <div class="available-blocks" id="available-rooms">
                          <h2>Phòng tương tự</h2>
                            @if ($rooms)
                                @foreach ($rooms as $room)
                                <div class="list-block main-block room-block">
                                    <div class="list-content">
                                        <div class="main-img list-img room-img">
                                            <a href="{{ route('get-page-room-roomDetail', ['id' => $room->id]) }}">
                                                <img src="{{ asset('upload/images/'. '/'. $room->image) }}" class="img-responsive" alt="room-img" style="width: 360px; height: 240px"/>
                                            </a>
                                            <div class="main-mask">
                                                <ul class="list-unstyled list-inline offer-price-1">
                                                    <li class="price">{{ $room->price }}<span class="divider">|</span><span class="pkg">1 đêm</span></li>
                                                    <li class="rating">
                                                        @for ($i = 0; $i < $room->hotel->hotel_star; $i++)
                                                            <span><i class="fa fa-star orange"></i></span>
                                                        @endfor
                                                        
                                                        @for ($i = 0; $i < (5 - $room->hotel->hotel_star); $i++)
                                                            <span><i class="fa fa-star lightgrey"></i></span>
                                                        @endfor
                                                    </li>
                                                </ul>
                                            </div><!-- end main-mask -->
                                        </div><!-- end room-img -->
                                        
                                        <div class="list-info room-info">
                                            <h3 class="block-title"><a href="#">{{ $room->name }}</a></h3>
                                            <p class="block-minor">{{ $room->room_type->room_type }}</p>
                                            <p>
                                                @if ($room->description)
                                                    {{ $room->description }}
                                                @else 
                                                    Thông tin đang được cập nhật
                                                @endif
                                            </p>
                                            <a href="{{ route('get-page-room-roomDetail', ['id' => $room->id]) }}" class="btn btn-orange btn-lg">Xem chi tiết</a>
                                         </div><!-- end room-info -->
                                    </div><!-- end list-content -->
                                </div><!-- end room-block -->
                                @endforeach
                            @endif
                            
                            
                        </div><!-- end available-rooms -->
                        
                        
                        <div class="row text-center">
                            {{ $rooms->links() }}
                        </div><!-- end pages -->
                    </div><!-- end columns -->

                </div><!-- end row -->
          </div><!-- end container -->
        </div><!-- end hotel-details -->
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
            $('.room-status').addClass('active');
        });
    
    </script>
@endsection