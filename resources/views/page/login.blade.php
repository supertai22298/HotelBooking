@extends('page_layout.page_masterpage')

@section('title')
Đăng nhập
@endsection

@section('content')

    <!--============= PAGE-COVER =============-->
    <section class="page-cover" id="cover-login">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Login Page</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Login Page</li>
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
                                <h3>Login</h3>
                                @if (session('msg'))
                                    <div class="alert alert-danger">
                                        {{session('msg')}}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                <form id="login" action="{{route('post-login')}}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
                                    @csrf 
                                    <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Tên tài khoản"  required/>
                                            <span><i class="fa fa-user"></i></span>
                                    </div>
                                    <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu"  required/>

                                            <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    <div class="checkbox">
                                            <label><input type="checkbox"> Lưu tài khoản</label>
                                    </div>
                                    <button type="submit" class="btn btn-orange btn-block">Đăng nhập</button>
                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line"><a href="{{route('get-page-registration-view')}}">Tạo mới tài khoản</a></p>
                                    <a class="simple-link" href="{{route('get-page-forgot-view')}}">Quên mật khẩu ?</a>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->
                            
                            <div class="flex-content-img custom-form-img">
                                <img src="page_asset/images/login.jpg" class="img-responsive" alt="registration-img" />
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
