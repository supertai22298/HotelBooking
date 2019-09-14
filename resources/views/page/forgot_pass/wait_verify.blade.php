@extends('page_layout.page_masterpage')

@section('title')
Quên mật khẩu
@endsection

@section('content')

    <!--============= PAGE-COVER =============-->
    <section class="page-cover" id="cover-login">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Quên mật khẩu</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('get-page-view')}}">Trang chủ</a></li>
                        <li class="active">Quên mật khẩu</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->

       
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="login" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>Quên mật khẩu</h3>
                                @if (session('msg'))
                                    <div class="alert alert-danger">
                                        {{session('msg')}}
                                    </div>
                                @endif
                                <p>Mật khẩu mới đã được gửi tới email của bạn.</p>
                                <p>Hãy đăng nhập vào tài khoản email để kính hoạt tài khoản.</p>
                            </div><!-- end custom-form -->
                            
                            <div class="flex-content-img custom-form-img">
                                <img src="page_asset/images/good-vacation-wishes5.jpg" class="img-responsive" alt="registration-img" />
                            </div><!-- end custom-form-img -->
                        </div><!-- end form-content -->
                        
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->         
        </div><!-- end login -->
    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')


    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')

@endsection
