<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{ asset('admin/assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>

                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>Post</span></a>
                        <ul class="collapse">
                            <li class="active"><a href="#">Show Post</a></li>
                            <li><a href="#">Post Details</a></li>
                            <li><a href="{{ route('user.list') }}">Admin Panel</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
