<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
    <ul class="nav nav-tabs nav-stacked text-center">
        <li class="profile"><a href="{{route('get-page-userProfile-view')}}"><span><i class="fa fa-user"></i></span>Quản lý tài khoản</a></li>
        <li class="changepass"><a href="{{route('get-page-userProfile-editPassword')}}"><span><i class="fa fa-lock"></i></span>Đổi mật khẩu</a></li>
        <li class="booking-management"><a href="{{route('get-page-booking-view')}}"><span><i class="fa fa-briefcase"></i></span>Quản lý đặt phòng</a></li>
        @if (Auth::user()->role == 1)
        <li><a href="{{route('get-admin-view')}}"><span><i class="fa fa-cog"></i></span>Quản lý</a></li>
        @endif
        {{-- <li><a href="cards.html"><span><i class="fa fa-credit-card"></i></span>My Cards</a></li> --}}
    </ul>
</div><!-- end columns -->