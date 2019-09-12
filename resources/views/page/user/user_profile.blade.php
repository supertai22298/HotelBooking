@extends('page_layout.page_masterpage')

@section('title')
Thông tin tài khoản
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    .hide{
        display: none;
    }
    .uppercase-first-letter{
        text-transform: capitalize;
        font-weight: normal !important;
    }
    .input-edit{
        display: none;
        font-weight: normal !important;
    }
    .input-edit .btn-save:hover{
        background: #1abd9d;
        color: whitesmoke;
    }
    .input-edit .btn-close:hover{
        background: #e84c3c;
        color: whitesmoke;
    }
    .input-edit button{
        margin: 15px 10px 10px 10px;
        padding: 5px 12px;
        font-size: 16px;
        box-shadow: 1px 1px 3px 1px grey;
        border-radius: 3px;
        border: none;
    }
    .input-edit input,.input-edit textarea, .input-edit select{
        padding-left: 5px;
        box-shadow: 1px 1px 3px 1px grey;
        border: none;
        margin: 5px 5px 0px 5px;
        border-radius: 3px;
        width: 100%;
        display: block;
    }
    .old-value{
        text-transform: none;
        font-weight: normal !important;
    }

    .edit-btn:hover{
        background: #29c4e3;
        color: whitesmoke;
    }
    .edit-btn{
        box-shadow: 1px 1px 3px 1px grey;
        font-size: 25px;
        border-radius: 3px;
        border: none;
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
                                
                                <form id = "formData">
                                <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                    <h2 class="dash-content-title">Hồ sơ của tôi</h2>
                                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 style="display: inline; margin-right: 20px">Thông tin cá nhân </h4>
                                                <button type="button" id="btn-edit" style="margin-right: 10px;" class="edit-btn"><i class="fa fa-edit"></i></button>
                                                <span id="noti" class="">
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-4 user-img">
                                                        <img id="preview_avatar" width="222px" src="
                                                        @if (Auth::user()->avatar == null)
                                                            {{'upload/images/default.png'}}
                                                        @else
                                                        {{'upload/images/' . Auth::user()->avatar}}
                                                        @endif

                                                        " class="img-responsive" alt="user-img" />
                                                        <span class="input-edit">
                                                            <input name="avatar" id="avatar" style="padding-left: 0px" type="file" value="" placeholder="Ảnh đại diện"/>
                                                            <input name="id" type="hidden" value="{{Auth::user()->id}}">
                                                        </span>
                                                    </div><!-- end columns -->
                                                    
                                                    <div class="col-sm-6 col-md-8  user-detail mt-2">
                                                        <ul class="list-unstyled">
                                                            <li class="edit"><span>Tên:</span> 
                                                                <span id="name" class="uppercase-first-letter old-value">
                                                                    @if (Auth::user()->first_name == null && Auth::user()->last_name == null)
                                                                    <small style="text-transform: none">{{'Chưa cập nhật'}}</small>    
                                                                    @else
                                                                        {{Auth::user()->first_name . " " . Auth::user()->last_name}}
                                                                    @endif    
                                                                </span>
                                                                <span class="input-edit">
                                                                    <input name="name" type="text" value="{{Auth::user()->first_name . " " . Auth::user()->last_name}}" placeholder="Tên"/>
                                                                    <small id="noti_name" class="noti"></small>
                                                                </span>
                                                            </li>
                                                            <li class="edit"><span>Ngày sinh:</span>
                                                                <span id="date_of_birth" class="old-value">
                                                                    @if (Auth::user()->date_of_birth == null)
                                                                    <small style="text-transform: none">{{'Chưa cập nhật'}}</small>    
                                                                    @else
                                                                        {{ date('d/m/Y',strtotime(substr(Auth::user()->date_of_birth,0,-9)))}}
                                                                    @endif    
                                                                </span>
                                                                <span class="input-edit">
                                                                    <input name="date_of_birth" type="date" value="{{substr(Auth::user()->date_of_birth,0,-9)}}" placeholder="Ngày sinh"/>
                                                                    <small id="noti_date_of_birth" class="noti"></small>
                                                                </span>
                                                            </li>
                                                            <li class="edit"><span>Giới tính:</span>
                                                                <span id="gender" class="old-value">
                                                                    @if (Auth::user()->gender == null)
                                                                    <small style="text-transform: none">{{'Chưa cập nhật'}}</small>    
                                                                    @else
                                                                        {{Auth::user()->gender == 1 ? 'Nam' : 'Nữ'}}
                                                                    @endif    
                                                                </span>
                                                                <span class="input-edit">
                                                                    <select name="gender" id="select">
                                                                        @if (Auth::user()->gender == 1)
                                                                            <option value="0">Nữ</option>
                                                                            <option value="1" selected>Nam</option>
                                                                        @else
                                                                            <option value="0" selected>Nữ</option>
                                                                            <option value="1">Nam</option>
                                                                        @endif
                                                                    </select>
                                                                    <small id="noti_gender" class="noti"></small>
                                                                </span>
                                                            </li>
                                                            <li class="edit"><span>Email:</span>
                                                                <span style="text-transform: none; font-weight: normal">
                                                                    {{Auth::user()->email}}
                                                                </span>
                                                            </li>
                                                            <li class="edit"><span>Số điện thoại:</span>
                                                                <span id="phone_number" class="old-value">
                                                                    @if (Auth::user()->phone_number == null)
                                                                    <small style="text-transform: none">{{'Chưa cập nhật'}}</small>    
                                                                    @else
                                                                        {{Auth::user()->phone_number}}
                                                                    @endif    
                                                                </span>
                                                                <span class="input-edit">
                                                                    <input name="phone_number" type="text" value="{{Auth::user()->phone_number}}" placeholder="Số điện thoại"/>
                                                                    <small id="noti_phone_number" class="noti"></small>
                                                                </span>
                                                            </li>
                                                            <li class="edit"><span>Địa chỉ:</span>
                                                                <span id="address" class="old-value">
                                                                    @if (Auth::user()->address == null)
                                                                    <small style="text-transform: none">{{'Chưa cập nhật'}}</small>    
                                                                    @else
                                                                        {{Auth::user()->address}}
                                                                    @endif    
                                                                </span>
                                                                <span class="input-edit">
                                                                    <input name="address" type="text" value="{{Auth::user()->address}}" placeholder="Địa chỉ"/>
                                                                    <small id="noti_address" class="noti"></small>
                                                                </span>
                                                            </li>
                                                            <li class="edit"><span>Quốc tịch:</span>
                                                                <span id="country" class="old-value">
                                                                    @if (Auth::user()->country == null)
                                                                    <small style="text-transform: none">{{'Chưa cập nhật'}}</small>    
                                                                    @else
                                                                        {{Auth::user()->country}}
                                                                    @endif    
                                                                </span>
                                                                <span class="input-edit">
                                                                    <input name="country" type="text" value="{{Auth::user()->country}}" placeholder="Quốc tịch"/>
                                                                    <small id="noti_country" class="noti"></small>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        </div><!-- end columns -->
                                                    <div id="edit-profile" class="modal custom-modal fade" role="dialog">
                                                </div><!-- end edit-profile -->
                                                    <div class="col-sm-12 user-desc">
                                                        <h4>Các thông tin khác</h4>
                                                        <p id="description" class="old-value">    
                                                            @if (Auth::user()->description == null)
                                                                <span>{{'Chưa cập nhật'}}</span>
                                                            @else
                                                            {{Auth::user()->description}}
                                                            @endif
                                                            </li>
                                                        </p>
                                                        <small id="noti_description" class="noti"></small>
                                                        <span class="input-edit">
                                                            @if (Auth::user()->description == null)
                                                            <textarea name="description" cols="30" placeholder="Nội dung..." rows="10">{{'Chưa cập nhật'}}</textarea>
                                                            @else
                                                            <textarea name="description" cols="30" placeholder="Nội dung..." rows="10">{{Auth::user()->description}}</textarea>
                                                            @endif
                                                    </div><!-- end columns -->
                                                </div><!-- end row -->
                                                <div class="input-edit">
                                                        <button type="button" class="btn-save"><i class="fa fa-save"></i> Lưu</button>
                                                        <button type="button" class="btn-close"><i class="fa fa-close"></i> Hủy</button>
                                                </div>
                                        </div><!-- end panel-body -->
                                    </div><!-- end panel-detault -->
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </div><!-- end dashboard-wrapper -->
                    </form>
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
    $('#btn-edit').click(function(){
        $('.input-edit').fadeToggle(0);
    });
    $('.btn-close').click(function(){
        $('.input-edit').fadeOut(0);
    });
    // yyyy-mm-dd to dd/mm/yyyy
    function formatDate(dateString){
        var arrDate = dateString.split('-');
        return [arrDate[2],arrDate[1],arrDate[0]].join('/');
    }


    $('.btn-save').click(function () {
        var formData = new FormData($('#formData')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        request = $.ajax({
                url: "{{route('post-page-userProfile-update-ajax')}}",
                method: 'POST',
                processData: false,  // Phải có để gửi file
                contentType: false, // both of two option : is required to submit the file data
                data: formData
            }).done(function(jsonResult) {
                
                //set value on change
                $('#name').html(jsonResult.first_name +' ' + jsonResult.last_name);

                $('#date_of_birth').html(formatDate(jsonResult.date_of_birth.slice(0,10)));
                $('#gender').html((jsonResult.gender == 1) ? 'Nam' : 'Nữ');
                $('#phone_number').html((jsonResult.phone_number !=null) ? jsonResult.phone_number : 'Chưa cập nhật');
                $('#address').html((jsonResult.address !=null) ? jsonResult.address : 'Chưa cập nhật');
                $('#country').html((jsonResult.country !=null) ? jsonResult.country : 'Chưa cập nhật');
                $('#avatar').attr('src',"upload/images/" + jsonResult.avatar);
                $('#description').html((jsonResult.description != null) ? jsonResult.description : 'Chưa cập nhật');
                
                //close form
                $('.input-edit').fadeOut(0);
                
                //show noti
                $('#noti').html('Chỉnh sửa thành công');
                $('#noti').addClass('alert');
                $('#noti').addClass('alert-success');
                
                //remove noti after 3seconds
                setTimeout(function(){
                if ($('#noti').length > 0) {
                    $('#noti').html('');
                    $('#noti').removeClass('alert');
                    $('#noti').removeClass('alert-success');
                }
                }, 3000);
            });
        request.fail(function(jqXHR, textStatus) {
                $('#noti_name').html(jqXHR.responseJSON.errors.name);
                $('#noti_date_of_birth').html(jqXHR.responseJSON.errors.date_of_birth);
                $('#noti_address').html(jqXHR.responseJSON.errors.address);
                $('#noti_gender').html(jqXHR.responseJSON.errors.gender);
                $('#noti_phone_number').html(jqXHR.responseJSON.errors.phone_number);
                $('#noti_description').html(jqXHR.responseJSON.errors.description);
                $('#noti_country').html(jqXHR.responseJSON.errors.country);

                $('.noti').addClass('text-danger');
                setTimeout(function(){
                if ($('.noti').length > 0) {
                    $('.noti').html('');
                }
                }, 4000);
            });
    });

    </script>
    {{-- xem anh trc khi upload --}}
    <script src="admin_page_asset/js/validation/jquery.min.js"></script>
    <script>
    function readURL(file){
    if(file.files && file.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
        $('#preview_avatar').attr('src',e.target.result);
        }
        reader.readAsDataURL(file.files[0]);
    }
    };

    $("#avatar").change(function(){
    readURL(this)
    })
    </script>
    
@endsection
