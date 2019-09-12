@extends('page_layout.page_masterpage')

@section('title')
Đổi mật khẩu
@endsection
@section('content')

    <!--================ PAGE-COVER =================-->
    <section class="page-cover" id="cover-registration">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Đổi mật khẩu</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('get-page-view')}}">Trang chủ</a></li>
                        <li><a href="{{route('get-page-user-view')}}">Tài khoản của tôi</a></li>
                        <li class="active">Đổi mật khẩu</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
       

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="registration" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>Đổi mật khẩu</h3>
                                <p style="margin-bottom: 20px">Xác nhận các thông tin sau để thay đổi mật khẩu</p>
                                <span id="noti" class="">
                                </span>
                                <form id="formData">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu cũ"  required/>
                                        <span><i class="fa fa-lock"></i></span>
                                        <span id="noti_password" class="noti-valid"></span>
                                    </div>
    
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="new_password" placeholder="Mật khẩu mới"  required/>
                                        <span><i class="fa fa-lock"></i></span>
                                        <span id="noti_new_password" class="noti-valid"></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="cfnew_password" placeholder="Nhập lại mật khẩu mới"  required/>
                                        <span><i class="fa fa-lock"></i></span>
                                        <span id="noti_cfnew_password" class="noti-valid"></span>
                                    </div>

                                    <button id="save" type="button" class="btn btn-orange btn-block">Thay đổi</button>
                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line"><a href="#">Quên mật khẩu ?</a></p>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->
                            
                            <div class="flex-content-img custom-form-img">
                                <img src="page_asset/images/registration.jpg" class="img-responsive" alt="registration-img" />
                            </div><!-- end custom-form-img -->
                        </div><!-- end form-content -->
                        
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->         
        </div><!-- end registration -->
    </section><!-- end innerpage-wrapper -->


    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')


    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')

@endsection

@section('javascript')
    <script>
    $('#save').click(function () {
        var formData = new FormData($('#formData')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        request = $.ajax({
                url: "{{route('post-page-userProfile-updatePassword')}}",
                method: 'POST',
                processData: false,  // Phải có để gửi file
                contentType: false, // both of two option : is required to submit the file data
                data: formData
            }).done(function(jsonResult) {
                $('#noti').html(jsonResult);

                $('#noti').addClass('alert');
                if(jsonResult === 'Hãy nhập đúng mật khẩu hiện tại'){
                    $('#noti').addClass('alert-danger');
                }else{
                    $('#noti').addClass('alert-success');
                }
                
                setTimeout(function(){
                if ($('#noti').length > 0) {
                    $('#noti').html('');
                    $('#noti').removeClass('alert');
                    $('#noti').removeClass('alert-danger');
                    $('#noti').removeClass('alert-success');
                }
                }, 4000);
            });
        request.fail(function(jqXHR, textStatus) {
                msg = jqXHR.responseJSON.errors;
                $('#noti_password').html(msg.password);
                $('#noti_new_password').html(msg.new_password);
                $('#noti_cfnew_password').html(msg.cfnew_password);
                
                //show noti
                $('.noti-valid').addClass('text-danger');
                
                //remove noti after 3seconds
                setTimeout(function(){
                if ($('.noti-valid').length > 0) {
                    $('.noti-valid').html('');
                    $('.noti-valid').removeClass('text-danger');
                }
                }, 5000);
            });
    });

    </script>
@endsection
