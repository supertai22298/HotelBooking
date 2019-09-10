<nav class="navbar navbar-default main-navbar navbar-custom navbar-white" id="mynavbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" id="menu-button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="header-search hidden-lg">
                <a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a>
            </div>
            <a href="/" class="navbar-brand"><span><i class="fa fa-building"></i>HATA</span>BOOKS</a>
        </div><!-- end navbar-header -->

        <div class="collapse navbar-collapse" id="myNavbar1">
            <ul class="nav navbar-nav navbar-right">
                <li class="home-status active"><a href="/"   >Trang chủ  </a></li>
                <li class="hotel-status"><a href="{{ route('get-page-hotel-hotelGrid') }}">Khách sạn  </a></li>
                <li class="room-status"><a href="{{ route('get-page-room-roomGrid') }}">Phòng</a></li>
                <li class="blog-status"><a href="{{ route('get-page-blog-blogGrid') }}">Blog</a></li>
                <li class="introduce-status"><a href="#">Giới thiệu</a></li>
                <li class="contact-status"><a href="{{ route('get-page-contact-contact') }}">Liên hệ</a></li>
                <li><a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a></li>
            </ul>
        </div><!-- end navbar collapse -->
    </div><!-- end container -->
</nav><!-- end navbar -->

<div class="sidenav-content">
    <div id="mySidenav" class="sidenav" >
        <h2 id="web-name"><span><i class="fa fa-plane"></i></span>Star Travel</h2>

        <div id="main-menu">
            <div class="closebtn">
                <button class="btn btn-default" id="closebtn">&times;</button>
            </div><!-- end close-btn -->
            <div class="list-group panel">
                <a href="/" class="home-status list-group-item active"  ><span><i class="fa fa-home link-icon"></i></span>Trang chủ </a>
                <a href="{{ route('get-page-hotel-hotelGrid') }}" class="hotel-status list-group-item"  ><span><i class="fa fa-building link-icon"></i></span>Khách sạn </a>
                <a href="{{ route('get-page-room-roomGrid') }}" class="room-status list-group-item"  ><span><i class="fa fa-building link-icon"></i></span>Phòng </a>
                <a href="{{ route('get-page-blog-blogGrid') }}" class="blog-status list-group-item"  ><span><i class="fa fa-newspaper-o link-icon"></i></span>Blog </a>
                <a href="#" class="introduce-status list-group-item"  ><span><i class="fa fa-ship link-icon"></i></span>Giới thiệu</a>
                <a href="{{ route('get-page-contact-contact') }}" class="contact-status list-group-item"  ><span><i class="fa fa-car link-icon"></i></span>Liên hệ</a>
            </div><!-- end list-group -->
        </div><!-- end main-menu -->
    </div><!-- end mySidenav -->
</div><!-- end sidenav-content -->