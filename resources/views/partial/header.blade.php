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
                                <a href="{{route('about-us')}}" class="link-term mercado-item-title">{{ trans('messages.US') }}</a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('shop') }}" class="link-term mercado-item-title">{{ trans('messages.Shop') }}</a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('product.cart') }}" class="link-term mercado-item-title">{{ trans('messages.Cart') }}</a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('check-out') }}" class="link-term mercado-item-title">{{ trans('messages.Checkout') }}</a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('user.chat') }}" class="link-term mercado-item-title">{{ __('Chat') }}<span class="badge badge-pill badge-primary">1</span></a>
                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a href="{{ route('contact') }}" class="link-term mercado-item-title">{{ trans('messages.Contact') }}</a>
                            </li>
                            <li class="menu-item lang-menu menu-item-has-children parent">
                                @if (Session::get('language') == 'en')
                                <a title="English" href="{!! route('user.change-language', ['en']) !!}"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang/lang-en.png')}}" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu lang" >
                                    <li class="menu-item text-dark" ><a class="text-dark" title="Tiếng Việt" href="{!! route('user.change-language', ['vi']) !!}"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang/lang-vi.png')}}" alt="lang-hun"></span>Tiếng Việt</a></li>

                                </ul>
                                @elseif(Session::get('language') == 'vi')
                                <a title="Tiếng Việt" href="{!! route('user.change-language', ['vi']) !!}"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang/lang-vi.png')}}" alt="lang-en"></span>Tiếng Việt<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu lang" >
                                    <li class="menu-item text-dark" ><a class="text-dark" title="English" href="{!! route('user.change-language', ['en']) !!}"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang/lang-en.png')}}" alt="lang-hun"></span>English</a></li>

                                </ul>
                                @else
                                <a title="Tiếng Việt" href="{!! route('user.change-language', ['vi']) !!}"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang/lang-vi.png')}}" alt="lang-en"></span>Tiếng Việt<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu lang" >
                                    <li class="menu-item text-dark" ><a class="text-dark" title="English" href="{!! route('user.change-language', ['en']) !!}"><span class="img label-before"><img src="{{asset('Commerce/assets/images/lang/lang-en.png')}}" alt="lang-hun"></span>English</a></li>

                                </ul>
                                @endif
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->utype=='ADM')
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="Dollar (USD)" href="#">{{ trans('messages.My_Acount') }}: {{ Auth::user()->name }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
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
                                            <a title="Dollar (USD)" href="#">{{ trans('messages.My_Acount') }}: {{ Auth::user()->name }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
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
                                                <li class="menu-item" >
                                                    <a name="" id="" class="btn btn-info btn-sm btn-block" href="{{route('user.my-voucher')}}" role="button">My Voucher</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                @else
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">{{ trans('messages.Login') }}</a></li>
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">{{ trans('messages.Register') }}</a></li>
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
                            <form action="{{route('product.search')}}" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" class="typeahead" value="" placeholder="Search here...">
                                <button form="form-search-top" type="submit"><i class="fa fa-search " aria-hidden="true"></i></button>
                                <div class="wrap-list-cate">
                                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                                    <a href="#" class="link-control">{{ trans('messages.All_category') }}</a>
                                    <ul class="list-cate">
                                        <li class="level-0">{{ trans('messages.All_category') }}</li>
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
                            <a href="{{route('user.my-wishlist')}}" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">{{isset($countWishlist) ? $countWishlist : 0}} item</span>
                                    <span class="title">{{ trans('messages.WishList') }}</span>
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
                                    <span class="title">{{ trans('messages.Cart') }}</span>
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
                                <li class="menu-item"><a href="#" class="link-term">{{ trans('messages.Weekly_Featured') }}</a><span class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="{{route('user.voucher')}}" class="link-term">{{ trans('messages.Voucher') }}</a><span class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="{{route('shop.topnew')}}" class="link-term">{{ trans('messages.Top_new_items') }}</a><span class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="{{route('shop.topsale')}}" class="link-term">{{ trans('messages.Top_Selling') }}</a><span class="nav-label hot-label">hot</span></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
 <!-- bootstrap-3-typeahead -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous"></script>
  <script>
        var path = "{{route('autoSearch')}}";

        $('input.typeahead').typeahead({
            source: function(terms,process){
                return $.get(path,{terms:terms},function(data){
                    return process(data);
                })
            }
        })
    </script>
