<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('get-admin-index') }}"><i class="menu-icon fa fa-tachometer"></i>Bảng điều khiển </a>
                </li>
                <li class="menu-title">Chức năng</li><!-- /.menu-title -->
                <li>
                <a href="{{ route('get-user-view') }}"> <i class="menu-icon ti-user"></i>Quản lý người dùng</a>
                </li>
                <li >
                    <a href="{{ route('get-roombooking-view') }}" > <i class="menu-icon ti-receipt"></i>Quản lý đặt phòng</a>
                </li>
                <li >
                    <a href="{{ route('get-hotel-index') }}" > <i class="menu-icon fa fa-h-square"></i>Quản lý khách sạn</a>
                </li>
                <li >
                    <a href="{{ route('get-room-index') }}" > <i class="menu-icon fa fa-hotel"></i>Quản lý phòng</a>
                </li>
                <li >
                    <a href="{{ route('get-blog-view') }}" > <i class="menu-icon fa fa-file-text-o"></i>Quản lý bài đăng</a>
                </li>
                <li >
                    <a href="{{ route('get-contact-view') }}" > <i class="menu-icon fa fa-address-book"></i>Quản lý liên hệ</a>
                </li>
                <li class="menu-title">Chức năng bổ sung</li>
                <li >
                    <a href="{{ route('get-room-type-index') }}" > <i class="menu-icon fa fa-address-book"></i>Quản lý loại phòng</a>
                </li>
           
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>