<div>
    <main id="main" class="main-site">
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>cart</span></li>
				</ul>
			</div>
			<div class=" main-content-area">

				<div class="wrap-iten-in-cart">
                    @if (Session::has('success_cart'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>{{Session::get('success_cart')}}</strong>
                        </div>

                        <script>
                          $(".alert").alert();
                        </script>
                    @endif
                    @if (Cart::count() > 0)
					<h3 class="box-title">Products Name</h3>
					<ul class="products-cart">
						@foreach (Cart::content() as $item)
                        <li class="pr-cart-item">
                            <div>
                                <input class="" type="checkbox" name="">
                            </div>
							<div class="product-image">
								<figure><img src="{{asset('storage/'.$item->model->image)}}" alt=""></figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="{{route('product.detail',['slug' => $item->model->slug]) }}">{{$item->model->name}}
                                @foreach ($item->options as $option => $value)
                                <p class="text-muted small">Color:{{$value}}<p>
                                @endforeach
                                </a>
							</div>
							<div class="price-field produtc-price"><p class="price">{{number_format($item->model->regular_price)}} VNĐ</p></div>
							<div class="quantity">
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120"  data-min="1" pattern="[0-9]*" >
									<a class="btn btn-increase" wire:click.prevent = "upQuantity('{{$item->rowId}}')" href="#"></a>
									<a class="btn btn-reduce" wire:click.prevent = "downQuantity('{{$item->rowId}}')" href="#"></a>
								</div>
							</div>
							<div class="price-field sub-total"><p class="price">{{number_format($item->subtotal)}} VNĐ</p></div>
							<div class="delete">
								<a href="#" class="btn btn-delete" wire:click.prevent="remove('{{ $item->rowId }}')" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>

						</li>
                        @endforeach
					</ul>
                    @else
                        <img class="mr-auto" width="250" height="250" src="{{asset('Commerce/assets/images/cart/empty_cart.png')}}" alt="Empty_cart">
                    @endif
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index">{{number_format(Cart::subtotal(0,0,''))}} VNĐ</b></p>
					</div>
					<div class="checkout-info">
						<a class="btn btn-checkout" href="{{route('check-out')}}">Check out</a>
						<a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a class="btn btn-clear"  wire:click.prevent="destroyAll()" href="#">Clear Shopping Cart</a>

					</div>
				</div>

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most order Products</h3>
                    <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                        <!--Carousel Wrapper-->
                        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                            <!--Controls-->
                            <div class="controls-top">
                            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                            </div>
                            <!--/.Controls-->

                            <!--Indicators-->
                            <ol class="carousel-indicators">
                            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                            <li data-target="#multi-item-example" data-slide-to="1"></li>
                            </ol>
                            <!--/.Indicators-->

                            <!--Slides-->
                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                @foreach ($product_hot as $item)
                                    @if ($loop->iteration<=6)
                                    <div class="col-md-2">
                                        <a href="{{ route('product.detail',['slug' =>$item->slug]) }}">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="{{asset('storage/'.$item->image)}}"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <h6 class="card-title text-warning">{{$item->name}}</h6>
                                                    <h6 class="card-text text-dark"><u>đ </u>{{number_format($item->regular_price)}}</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                @endforeach

                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item ">

                                <div class="row">
                                @foreach ($product_hot as $item)
                                    @if ($loop->iteration>6 && $loop->iteration<=12)
                                    <div class="col-md-2">
                                        <a href="{{ route('product.detail',['slug' =>$item->slug]) }}">
                                            <div class="card mb-2">
                                            <img class="card-img-top" src="{{asset('storage/'.$item->image)}}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h6 class="card-title text-warning">{{$item->name}}</h6>
                                                <h6 class="card-text text-dark"><u>đ </u>{{number_format($item->regular_price)}}</h6>
                                            </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                            <!--/.Second slide-->


                            </div>
                            <!--/.Slides-->

                        </div>
                        <!--/.Carousel Wrapper-->
                    </div>
				</div>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
</div>

