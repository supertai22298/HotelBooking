@extends('page_layout.page_masterpage')

@section('title')
Thông tin tài khoản
@endsection

@section('css')
    <style>
    .green-headding{
        background-color: #39e460 !important;
    }
    .blue-headding{
        background-color: #007bff !important;
    }
    .uppercase-first-letter{
        text-transform: capitalize;
        font-weight: normal !important;
    }
    .user-profile .panel-default {
        box-shadow: 1px 1px 10px 2px #b5b1b1;
    }
    .panel-body {
        padding: 25px 40px !important;
    }
    .alert {
    padding: 10px !important;
    }
    .btn-100{
        width: 100%;
    }
    .btn-red:hover{
        background: red;
    }
    .invoice-info li::after{
        content: none !important;
    }
    .green{
        background: green !important;
        color: white;
    }
    .blue{
        background: blue !important;
        color: white;
    }
    .my-red{
        background: red !important;
        color: white;
    }
    .text-red{
        color: red !important;
    }
    .text-green{
        color: green !important;
    }
    .text-blue{
        color: blue !important;
    }
    </style>
@endsection

@section('breadcrumb')
    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Quản lý đặt phòng</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('get-page-view')}}">Trang chủ</a></li>
                        {{-- <li><a href="">Tài khoản của tôi</a></li> --}}
                        <li class="active">Quản lý đặt phòng</li>
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
                                    <h2 class="dash-content-title">Quản lý đặt phòng</h2>
                                    <div class="dashboard-listing invoices">
                                        <h3 class="dash-listing-heading">Danh sách đặt phòng
                                            @if(session('msg'))
                                            <small id="noti" class="alert alert-success p-2">
                                                {{session('msg')}}
                                            </small>
                                            @endif
                                        </h3>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                    @foreach ($bookings as $booking)
                                                    <tr>
                                                        <td class="dash-list-icon invoice-icon"><i id="status-icon-{{$booking->id}}" class="fa "></i></td>
                                                        <td class="dash-list-text invoice-text">
                                                            <h4 class="invoice-title">Thông tin phòng: <span>{{explode("@!@",$booking->description)[1]}}</span></h4>
                                                            <ul class="list-unstyled invoice-info red">
                                                                <li id="status-{{$booking->id}}" class="invoice-status red"><span>Trạng thái:</span>
                                                                    @if ($booking->booking_status_id == 1)
                                                                        {{'Đã xác nhận'}}
                                                                        <script>
                                                                            element = document.getElementById('status-icon-{{$booking->id}}');
                                                                            element.classList.add("fa-check");
                                                                            element.classList.add("green");
                                                                            element1 = document.getElementById('status-{{$booking->id}}');
                                                                            element1.classList.add("text-green");
                                                                        </script>
                                                                    @elseif($booking->booking_status_id == 2)
                                                                        {{'Chưa xác nhận'}}
                                                                        <script>
                                                                            element = document.getElementById('status-icon-{{$booking->id}}');
                                                                            element.classList.add("fa-share");
                                                                            element.classList.add("blue");
                                                                            element1 = document.getElementById('status-{{$booking->id}}');
                                                                            element1.classList.add("text-blue");
                                                                        </script>
                                                                    @else
                                                                        {{'Hủy'}}
                                                                        <script>
                                                                            element = document.getElementById('status-icon-{{$booking->id}}');
                                                                            element.classList.add("fa-close");
                                                                            element.classList.add("my-red");
                                                                            element1 = document.getElementById('status-{{$booking->id}}');
                                                                            element1.classList.add("text-red");
                                                                        </script>
                                                                    @endif
                                                                </li>
                                                                <li class="invoice-order">Ngày đặt: {{date('d/m/Y',strtotime(substr($booking->created_at,0,-9)))}}</li>
                                                                <li class="invoice-date">Ngày đến: {{date('d/m/Y',strtotime(substr($booking->date_from,0,-9)))}}</li>
                                                                <li class="invoice-date">Ngày đi: {{date('d/m/Y',strtotime(substr($booking->date_to,0,-9)))}}</li>
                                                                <li class="invoice-date">Ghi chú: {{explode("@!@",$booking->description)[0]}}</li>
                                                            </ul>
                                                        </td>
                                                        <td class="dash-list-btn" style="
                                                        vertical-align: inherit;" >
                                                            <a href="{{route('get-page-room-roomDetail',['id' => $booking->room_id])}}" class="btn btn-100 btn-orange">Chi tiết</a>
                                                            <button type="button" id="btn-cancel-{{$booking->id}}" class="btn btn-100 btn-red" data-toggle="modal" data-target="#del-cf-{{$booking->id}}" >Hủy</button>
                                                            @if ($booking->booking_status_id == 3)
                                                                <script>
                                                                document.getElementById('btn-cancel-{{$booking->id}}').disabled = true;
                                                                </script>
                                                            @endif
                                                        </td>
                                                        <div id="del-cf-{{$booking->id}}" class="modal custom-modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h3 class="modal-title">Xác nhận hủy</h3>
                                                                        </div><!-- end modal-header -->
                                                                        
                                                                        <div class="modal-body">
                                                                            <p>Bạn có chắc chắn muốn hủy đơn đặt phòng này của bạn?</p>
                                                                            <form action="{{route('post-page-booking-update',['id' => $booking->id])}}" method="POST">
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-orange">Đồng ý</button>
                                                                            </form>
                                                                            <button class="btn btn-orange" data-dismiss="modal">Đóng</button>
                                                                        </div><!-- end modal-bpdy -->
                                                                    </div><!-- end modal-content -->
                                                                </div><!-- end modal-dialog -->
                                                            </div><!-- end edit-profile -->
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div><!-- end table-responsive -->
                                    </div><!-- end invoices -->
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

    function formatDate(dateString){
        var arrDate = dateString.split('-');
        return [arrDate[2],arrDate[1],arrDate[0]].join('/');
    }

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
    setTimeout(function(){
                if ($('#noti').length > 0) {
                    $('#noti').html('');
                    $('#noti').removeClass('alert');
                    $('#noti').removeClass('alert-success');
                }
                }, 4000);
    $('.changepass').removeClass('active');
    $('.booking-management').addClass('active');
    $('.profile').removeClass('active');
    </script>
    
@endsection
