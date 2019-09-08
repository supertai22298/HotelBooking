<div id="top-bar" class="tb-text-grey">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="info">
                    <ul class="list-unstyled list-inline">
                        <li><span><i class="fa fa-map-marker"></i></span>ĐH Duy Tân, Đà Nẵng</li>
                        <li><span><i class="fa fa-phone"></i></span>0123 456 789</li>
                    </ul>
                </div><!-- end info -->
            </div><!-- end columns -->

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="links">
                    <ul class="list-unstyled list-inline">
                        @if(isset(Auth::user()->username))
                        <li><a href="#"><span><i class="fa fa-lock"></i></span>Xin chào {{Auth::user()->username}}</a></li>
                        <li><a href="{{route('get-logout')}}"><span><i class="fa fa-lock"></i></span>Log out</a></li>
                        @else
                        <li><a href="{{route('get-login')}}"><span><i class="fa fa-lock"></i></span>Đăng Nhập</a></li>
                        <li><a href="registration.html"><span><i class="fa fa-plus"></i></span>Đăng Ký</a></li>
                        @endif

                    </ul>
                </div><!-- end links -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end top-bar -->