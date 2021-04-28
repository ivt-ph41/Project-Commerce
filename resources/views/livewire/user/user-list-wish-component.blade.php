<div>

<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="row">
                <div class="col-lg-2">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <a class="text-dark" href="{{route('user.account')}}" ><b>Account management</b></a>
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a class="text-dark" href="{{route('user.order')}}" ><b>My order</b></a>
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a class="text-dark" href="{{route('user.my-voucher')}}" ><b>My Voucher</b></a>
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a class="text-dark" href="{{route('user.my-wishlist')}}" ><b>Favorite products</b></a>
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a class="text-dark" href="" ><b>My comment</b></a>
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a class="text-dark" href="{{route('contact')}}" ><b>Contact Us</b></a>
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                </div>
                <div class="col-lg-10 text-muted">
                    <div class="wrap-iten-in-cart">
                        <h3 class="box-title">list of favorite products</h3>
                        <ul class="products-cart">
                            @foreach ($wishlists as $wishlist)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{asset('storage/'.$wishlist->wishlist_products->image)}}" alt=""></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{route('product.detail',['slug' => $wishlist->wishlist_products->slug]) }}">{{$wishlist->wishlist_products->name}}</a>
                                </div>
                                <div class="price-field produtc-price"><p class="price"><u class="text-warning">đ</u>{{number_format($wishlist->wishlist_products->regular_price)}}</p></div>
                                <div class="delete">
                                    <button type="button" wire:click.prevent="storeCart({{$wishlist->wishlist_products->id}},'{{$wishlist->wishlist_products->name}}',{{$wishlist->wishlist_products->regular_price}})" class="btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                          </svg>
                                    </button>
                                </div>
                                <div class="delete">
                                    <a href="#" class="btn btn-delete"  wire:click.prevent="remove('{{$wishlist->id }}')" title="Delete favorite products">
                                        <span>Delete favorite products</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</div>
