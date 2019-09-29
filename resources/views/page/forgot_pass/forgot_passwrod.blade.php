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
                                <p>Chức năng này sẽ gửi lại mật khẩu mới về tài khoản email của bạn.</p>
                                <p>Hãy chắc chắn rằng tài khoản email bạn nhập là tài khoản của bạn!</p>
                                @if (session('msg'))
                                    <div class="alert alert-danger">
                                        {{session('msg')}}
                                    </div>
                                @endif
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
                                    @csrf 
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Tên tài khoản"  required/>
                                        <span><i class="fa fa-user"></i></span>
                                        @if($errors->has('username'))
                                            <small class="text-danger w-100">
                                                {{$errors->first('username')}}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Địa chỉ email"  required/>
                                        <span><i class="fa fa-user"></i></span>
                                        @if($errors->has('email'))
                                            <small class="text-danger w-100">
                                                {{$errors->first('email')}}
                                            </small>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-orange btn-block">Xác nhận</button>
                                </form>
                                <div class="other-links">
                                    <p class="link-line">Bạn chưa có tài khoản? <a href="{{route('get-page-registration-view')}}">Đăng ký</a></p>
                                    <a class="simple-link" href="{{route('get-login')}}">Đăng nhập</a>
                                </div><!-- end other-links -->
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
