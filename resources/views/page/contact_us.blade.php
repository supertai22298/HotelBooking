@extends('page_layout.page_masterpage')

@section('title')
Liên hệ với chúng tôi
@endsection

@section('content')

    <!--================ PAGE-COVER ===============-->
    <section class="page-cover" id="cover-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Liên hệ với chúng tôi</h1>
                    <ul class="breadcrumb">
                        <li><a href="/">Trang chủ</a></li>
                        <li class="active">Liên hệ</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="contact-us" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="d-none" id="div-message">

                    </div>
                    <div class="col-sm-12 col-md-5 no-pd-r">
                        <div class="custom-form contact-form">
                            <h3>Liên hệ ngay</h3>
                            <p>Chúng tôi luôn luôn lắng nghe khách hàng nhằm cải thiện dịch vụ</p>
                            <div id="frm-contact" >
                                    
                                <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Họ và tên" value="{{ Auth::check() ? Auth::user()->first_name : '' }}" required/>
                                        <span><i class="fa fa-user"></i></span>
                                </div>

                                <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required/>
                                        <span><i class="fa fa-envelope"></i></span>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Tiêu đề"  required/>
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="4" placeholder="Tin nhắn của bạn" required></textarea>
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                                <div >
                                    <input type="checkbox" value="1" name="is_received_news" placeholder="Bạn có muốn nhận thông báo"/>
                                    <label for="is_received_news" >Đăng ký nhận thông tin</label>
                                </div>
                                
                                <button id="btn-contact"  class="btn btn-orange btn-block">Gửi</button>
                            </div>
                        </div><!-- end contact-form -->
                    </div><!-- end columns -->
                    
                    <div class="col-sm-12 col-md-7 no-pd-l">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAPrSkaBK4HPR-vFfJ-farhnl7sYPdWBb8%20&q=Duy+Tan+University,Da%20Nang,%20Viet%20Nam%22" allowfullscreen></iframe>
                        </div><!-- end map -->
                    </div><!-- end columns -->
                    
                </div><!-- end row -->
            </div><!-- end container -->   
        </div><!-- end contact-us -->
    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    @include('page.components.best_features')

    <!--========================= NEWSLETTER-1 ==========================-->
    @include('page.components.newsletter_1')

@endsection

