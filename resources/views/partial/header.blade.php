<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item" >
                                <a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="" class="link-term mercado-item-title">About Us</a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('shop') }}" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('product.cart') }}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('check-out') }}" class="link-term mercado-item-title">Checkout</a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('contact') }}" class="link-term mercado-item-title">Contact Us</a>
                            </li>

                            <li class="menu-item lang-menu menu-item-has-children parent">
                                <a title="English" href="#"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang-en.png')}}" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu lang" >
                                    <li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang-hun.png')}}" alt="lang-hun"></span>Hungary</a></li>
                                    <li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang-ger.png')}}" alt="lang-ger" ></span>German</a></li>
                                    <li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang-fra.png')}}" alt="lang-fre"></span>French</a></li>
                                    <li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang-can.png')}}" alt="lang-can"></span>Canada</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu curency" >
                                    <li class="menu-item" >
                                        <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                    </li>
                                    <li class="menu-item" >
                                        <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                    </li>
                                    <li class="menu-item" >
                                        <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                    </li>
                                </ul>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->utype=='ADM')
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="Dollar (USD)" href="#">My Acount: {{ Auth::user()->name }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency" >
                                            <li class="menu-item" >
                                                <a title="Pound (GBP)" class="btn btn-warning btn-block" href="{{ route('admin.dashboard') }}">Home</a>
                                            </li>
                                            <li class="menu-item" >
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <input class="btn btn-danger btn-block" onclick=" return confirm('Surely you want to log out!')"  type="submit" name="" value="Logout">
                                                </form>
                                            </li>
                                            <li class="menu-item" >
                                                <a name="" id="" class="btn btn-primary btn-sm btn-block" href="{{route('user.account')}}" role="button">My account</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @else
                                        <li class="menu-item menu-item-has-children parent" >
                                            <a title="Dollar (USD)" href="#">My Acount: {{ Auth::user()->name }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency" >
                                                <li class="menu-item" >
                                                    <a title="Pound (GBP)" class="btn btn-warning btn-sm btn-block" href="{{ route('user.dashboard') }}">Home</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <form action="{{ route('logout') }}" method="post">
                                                        @csrf
                                                        <input class="btn btn-danger btn-block btn-sm" type="submit" onclick="return confirm('Surely you want to log out!')" value="Logout">
                                                    </form>
                                                </li>
                                                <li class="menu-item" >
                                                    <a name="" id="" class="btn btn-primary btn-sm btn-block" href="{{route('user.account')}}" role="button">My account</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a name="" id="" class="btn btn-success btn-sm btn-block" href="{{route('user.order')}}" role="button">My order</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                @else
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container-fluid ">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="{{route('home')}}" class="link-to-home"><img src="{{asset('Commerce/assets/images/logo-top-1.png')}}" alt="mercado"></a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="#" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <div class="wrap-list-cate">
                                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                                    <a href="#" class="link-control">All Category</a>
                                    <ul class="list-cate">
                                        <li class="level-0">All Category</li>
                                        @foreach ($categories as $category)
                                        <li class="level-1"><a class="text-muted" href="{{route('category.product',['slug_cat' => $category->slug])}}">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="#" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">0 item</span>
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{route('product.cart')}}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    @if (Cart::count() >0)
                                    <span class="index">{{Cart::count()}} items</span>
                                    @endif
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container-fluid ">
                <div class="nav-section header">
                    <div class="header-nav-section ">
                            <ul class="nav menu-nav clone-main-menu " id="mercado_haead_menu" data-menuname="Sale Info" >
                                <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
