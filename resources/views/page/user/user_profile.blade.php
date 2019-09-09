@extends('page_layout.page_masterpage')

@section('title')
Thông tin tài khoản
@endsection

@section('css')
    <style>
    .uppercase-first-letter{
        text-transform: capitalize;
        font-weight: normal !important;
    }
    </style>
@endsection

@section('breadcrumb')
    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Tài khoản của tôi</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('get-page-view')}}">Trang chủ</a></li>
                        <li><a href="{{route('get-page-user-view')}}">Tài khoản của tôi</a></li>
                        <li class="active">Tài khoản của tôi</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
@endsection

@section('content')

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
                                        <li><a href="{{route('get-page-user-view')}}"><span><i class="fa fa-cogs"></i></span>Bảng điều khiển</a></li>
                                        <li class="active"><a href="{{route('get-page-userProfile-view')}}"><span><i class="fa fa-user"></i></span>Hồ sơ cá nhân</a></li>
                                        <li><a href="booking.html"><span><i class="fa fa-briefcase"></i></span>Đặt phòng</a></li>
                                        {{-- <li><a href="wishlist.html"><span><i class="fa fa-heart"></i></span>Wishlist</a></li>
                                        <li><a href="cards.html"><span><i class="fa fa-credit-card"></i></span>My Cards</a></li> --}}
                                    </ul>
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                    <h2 class="dash-content-title">Hồ sơ của tôi</h2>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><h4>Thông tin cá nhân</h4></div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-5 col-md-4 user-img">
                                                    <img width="222px" src="
                                                    @if (Auth::user()->avatar == null)
                                                        {{'upload/images/default.png'}}
                                                    @else
                                                    {{'upload/images/' . Auth::user()->avatar}}
                                                    @endif

                                                    " class="img-responsive" alt="user-img" />
                                                </div><!-- end columns -->
                                                
                                                <div class="col-sm-7 col-md-8  user-detail">
                                                    <ul class="list-unstyled">
                                                        <li><span>Tên:</span> <span class="uppercase-first-letter">{{Auth::user()->first_name . " " . Auth::user()->last_name}}</span></li>
                                                        <li><span>Ngày sinh:</span>
                                                        @if (Auth::user()->date_of_birth == null)
                                                            <small>{{'Chưa cập nhật'}}</small>
                                                        @else
                                                            {{substr(Auth::user()->date_of_birth,0,-9)}}
                                                        @endif
                                                        </li>
                                                        <li><span>Email:</span> {{Auth::user()->email}}</li>
                                                        <li><span>Số điện thoại:</span>
                                                        @if (Auth::user()->date_of_birth == null)
                                                            <small>{{'Chưa cập nhật'}}</small>
                                                        @else
                                                            {{substr(Auth::user()->date_of_birth,0,-9)}}
                                                        @endif
                                                        </li>
                                                        <li><span>Địa chỉ:</span>
                                                        @if (Auth::user()->address == null || Auth::user()->city == null)
                                                            <small>{{'Chưa cập nhật'}}</small>
                                                        @else
                                                            {{Auth::user()->address . " - " . Auth::user()->city}}
                                                        @endif
                                                        </li>
                                                        <li><span>Quốc tịch:</span>
                                                        @if (Auth::user()->country == null)
                                                            <small>{{'Chưa cập nhật'}}</small>
                                                        @else
                                                            {{Auth::user()->country}}
                                                        @endif
                                                        </li>
                                                    </ul>
                                                    <button class="btn" data-toggle="modal" data-target="#edit-profile">Chỉnh sửa</button>
                                                    </div><!-- end columns -->
                                                <div id="edit-profile" class="modal custom-modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h3 class="modal-title">Edit Profile</h3>
                                                        </div><!-- end modal-header -->
                                                        
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label>Họ</label>
                                                                    <input type="text" class="form-control" placeholder="họ"/>
                                                                </div><!-- end form-group -->
                                                                
                                                                <div class="form-group">
                                                                    <label>Tên</label>
                                                                    <input type="text" class="form-control" placeholder="Tên"/>
                                                                </div><!-- end form-group -->

                                                                <div class="form-group">
                                                                    <label>Ngày sinh</label>
                                                                    <input type="date" class="form-control"/>
                                                                </div><!-- end form-group -->
                                                                
                                                                <div class="form-group">
                                                                    <label>Địa chỉ email</label>
                                                                    <input type="email" class="form-control" placeholder="Email" />
                                                                </div><!-- end form-group -->
                                                                
                                                                <div class="form-group">
                                                                    <label>Số điện thoại</label>
                                                                    <input type="text" class="form-control" placeholder="Số điện thoại" />
                                                                </div><!-- end form-group -->
                                                                
                                                                <div class="form-group">
                                                                    <label>Địa chỉ</label>
                                                                    <input type="text" class="form-control" placeholder="Địa chỉ" />
                                                                </div><!-- end form-group -->
                                                                
                                                                <div class="form-group">
                                                                    <label>Thành phố</label>
                                                                    <input type="text" class="form-control" placeholder="Thành phố" />
                                                                </div><!-- end form-group -->
                                                                
                                                                <div class="form-group">
                                                                    <label>Quốc tịch</label>
                                                                    <input type="text" class="form-control" placeholder="Quốc tịch" />
                                                                </div><!-- end form-group -->
                                                                
                                                                <button class="btn btn-orange">Save Changes</button>
                                                            </form>
                                                        </div><!-- end modal-bpdy -->
                                                    </div><!-- end modal-content -->
                                                </div><!-- end modal-dialog -->
                                            </div><!-- end edit-profile -->
                                                <div class="col-sm-12 user-desc">
                                                    <h4>Các thông tin khác</h4>
                                                    <p>
                                                        @if (Auth::user()->description == null)
                                                            <span>{{'Chưa cập nhật'}}</>
                                                        @else
                                                            {{Auth::user()->description}}
                                                        @endif
                                                        </li>
                                                    </p>
                                                
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
    @include('page.components.newsletter_1')

@endsection
