@extends('page_layout.page_masterpage')

@section('title')
Đổi mật khẩu
@endsection
@section('css')
    <style>
    .user-profile .panel-default {
        box-shadow: 1px 1px 10px 2px #b5b1b1;
    }
    .panel-body {
        padding: 25px 40px !important;
    }
    .bg-light{
        background: #efeff0;
        padding: 20px 40px;
    }
    .bg-light p{
        margin-bottom: 0px !important;
    }
    .custom-form{
        background: none !important;
        padding: 20px 40px;
    }
    .input-edit input{
        padding-left: 5px;
        box-shadow: 1px 1px 3px 1px grey;
        border: none !important;
        margin: 5px 5px 0px 5px;
        border-radius: 3px !important;
        width: 100%;
        display: block;
    }
    .dashboard-content .btn,.panel-heading h4 {
        font-weight: bold !important;
    }
    .alert {
    padding: 10px !important;
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
                        <li><a href="{{route('get-page-userProfile-view')}}">Tài khoản của tôi</a></li>
                        <li class="active">Đổi mật khẩu</li>
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
                            
                                @include('page.components.user_dasboard')
                                <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                    <h2 class="dash-content-title">Đổi mật khẩu</h2>
                                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 style="display: inline; margin-right: 20px">Đổi mật khẩu</h4>
                                                <span id="noti" class="">
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                <div class="bg-light">
                                                    <p>Xác nhận các thông tin sau để thay đổi mật khẩu</p>
                                                </div>
                                                <div class="custom-form custom-form-fields">
                                                    <form id="formData">
                                                        @csrf
                                                        <div class="form-group input-edit">
                                                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu hiện tại"  required/>
                                                            <span><i class="fa fa-lock"></i></span>
                                                            <span id="noti_password" class="noti-valid"></span>
                                                        </div>
                        
                                                        <div class="form-group input-edit">
                                                            <input type="password" class="form-control" name="new_password" placeholder="Mật khẩu mới"  required/>
                                                            <span><i class="fa fa-lock"></i></span>
                                                            <span id="noti_new_password" class="noti-valid"></span>
                                                        </div>
                                                        
                                                        <div class="form-group input-edit">
                                                            <input type="password" class="form-control" name="cfnew_password" placeholder="Nhập lại mật khẩu mới"  required/>
                                                            <span><i class="fa fa-lock"></i></span>
                                                            <span id="noti_cfnew_password" class="noti-valid"></span>
                                                        </div>

                                                        <button id="save" type="button" class="btn btn-orange center-block">Thay đổi</button>
                                                    </form>
                                                    
                                                    <div class="other-links">
                                                        <p class="link-line"><a href="#">Quên mật khẩu ?</a></p>
                                                    </div><!-- end other-links -->
                                                </div><!-- end custom-form -->
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

    $('.profile').removeClass('active');
    $('.changepass').addClass('active');
    $('.booking-management').removeClass('active');

    </script>
@endsection
