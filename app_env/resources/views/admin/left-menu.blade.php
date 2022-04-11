<div class="navbar nav_title" style="border: 0;">
    <img src="https://media.discordapp.net/attachments/636266390675783699/962426694336118894/logo1.png" class="site_title">
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<li class="nav-item dropdown open" style="padding-left: 15px;">
    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
        <img src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t1.6435-9/73014730_797834324009077_2271776728781160448_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=yRk141sKQb4AX8l_GRE&_nc_ht=scontent.fsgn2-5.fna&oh=00_AT8U1mwcyJ45vqPIElLl50vNU8dz46ze97HeajRZUvqotQ&oe=6274549B" alt="..." class="">
        @if (!empty(session()->get('nv1')))
            <span>Welcome, {{session()->get('TenNV')}}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item"  href="{{route('admin.logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
    </div>
</li>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('listing.index',['model'=>'Thucpham'])}}">Sản phẩm</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Loaithucpham'])}}">Loại</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Nhasanxuat'])}}">Nhà sản xuất</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Hoadonkhachhang'])}}">Đơn hàng</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Khachhang'])}}">Khách hàng</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Khuyenmai'])}}">Khuyến mại</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Lohang'])}}">Lô hàng</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Nhanvien'])}}">Nhân viên</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->