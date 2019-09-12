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

                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" width="30px" height="30px" src="
                              @if(Auth::user()->avatar == null)
                                  {{'upload/images/default.png'}}
                              @else
                                  {{'upload/images/' . Auth::user()->avatar }}
                              @endif
                            " alt="User Avatar">
                            </a>
              
                            <div class="user-menu dropdown-menu">
                                <a class="user-options" href="{{route('get-page-user-view')}}"><i class="fa fa- user"></i>Quản lý tài khoản</a>
            
                                <a class="user-options" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>
              
                                <a class="user-options" href="{{route('get-page-userProfile-editPassword')}}"><i class="fa fa -cog"></i>Đổi mật khẩu</a>
              
                                <a class="user-options" href="{{route('get-logout')}}"><i class="fa fa-power -off"></i>Logout</a>
                            </div>
                        </div>
                        <li><a href="{{route('get-page-user-view')}}"><span><i class="fa fa-lock"></i></span>Xin chào {{Auth::user()->username}}</a></li>
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