<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{asset('Admintle/img/logo/logo.png')}}"" alt="" /></a>
            <strong><a href="index.html"><img src="{{asset('Admintle/img/logo/logosn.png')}}"" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="active">
                        <a class="has-arrow" href="index.html">
                               <span class="educate-icon educate-home icon-wrap"></span>
                               <span class="mini-click-non">Manager</span>
                            </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Dashboard v.1" href="{{route('admin.category')}}"><span class="mini-sub-pro">Categories</span></a></li>
                        </ul>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Product" href="{{route('admin.product')}}"><span class="mini-sub-pro">Products</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a title="Landing Page" href="{{route('admin.chat')}}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Chat</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
