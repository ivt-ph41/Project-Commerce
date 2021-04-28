<div>
    <main id="main">
		<div class="container">
			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
					@foreach ($sliders as $slider)
                        @if ($slider->type == 0)
                        <div class="item-slide">
                            <img src="{{asset('Commerce/assets/images/'.$slider->image)}}" alt="" class="img-slide">
                            <div class="slide-info slide-1">
                                <h2 class="f-title"><b>{{$slider->name}}</b></h2>
                                <span class="subtitle">{{$slider->description}}</span>
                                <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                                <a href="#" class="btn-link">Shop Now</a>
                            </div>
                        </div>
                        @endif
                    @endforeach
					{{-- <div class="item-slide">
						<img src="{{asset('Commerce/assets/images/main-slider-1-2.jpg')}}" alt="" class="img-slide">
						<div class="slide-info slide-2">
							<h2 class="f-title">Extra 25% Off</h2>
							<span class="f-subtitle">On online payments</span>
							<p class="discount-code">Use Code: #FA6868</p>
							<h4 class="s-title">Get Free</h4>
							<p class="s-subtitle">TRansparent Bra Straps</p>
						</div>
					</div>
					<div class="item-slide">
						<img src="{{asset('Commerce/assets/images/main-slider-1-3.jpg')}}" alt="" class="img-slide">
						<div class="slide-info slide-3">
							<h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
							<span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
							<p class="sale-info">Stating at: <b class="price">$225.00</b></p>
							<a href="#" class="btn-link">Shop Now</a>
						</div>
					</div> --}}
				</div>
			</div>
			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{asset('Commerce/assets/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{asset('Commerce/assets/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>

			<!--On Sale-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">{{ trans('messages.On_Sale') }}</h3>
				<p  class="wrap-countdown mercado-countdown h5 text-muted" id="demo"></p>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach ($product_sale as $item)
                    <div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="{{route('product.detail',['slug' =>$item->slug ])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('storage/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">-{{$item->sale_percent}} %</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>{{$item->name}}</span></a>
							<div class="wrap-price"><span class="product-price">{{number_format($item->regular_price)}} VNĐ</span></div>
						</div>
					</div>
                    @endforeach


				</div>
			</div>
            <!--Category-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">{{ trans('messages.Categories') }}</h3>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" >
                    @foreach ($categories as $category)
                    <div class="product product-style-2 equal-elem " style="width:100px">
						<div class="product-thumnail">
							<a href="{{route('category.product',['slug_cat' => $category->slug])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset('storage/'.$category->image)}}" width="400" height="400" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
						</div>
						<div class="product-info">
							<a  href="#" class="product-name"><span class="text-center">{{$category->name}}</span></a>
						</div>
					</div>
                    @endforeach
                </div>
			</div>
            <!-- Products related-->
			@if (count($related_products))
            <div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Private for you</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{asset('Commerce/assets/images/digital-electronic-banner.jpg')}}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
									@foreach ($related_products as $item)
                                    <div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{ route('product.detail',['slug' => $item->slug]) }}" title="{{$item->name}}">
												<figure><img src="{{asset('storage/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
											</a>

                                            <div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>

											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$item->name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{number_format($item->regular_price)}} VNĐ</span></div>
										</div>
									</div>
                                    @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            @endif
			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">{{ trans('messages.Latest_Products') }}</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{asset('Commerce/assets/images/digital-electronic-banner.jpg')}}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

									@foreach ($product_new as $item)
                                    @php
                                        $date = strtotime($item->created_at);
                                        $day_create = date('Y-m-d h:i:sa', $date) ;
                                        $date_now = date('Y-m-d H:i:s') ; //current date
                                        $days = (strtotime($date_now) - strtotime($day_create)) / (60 * 60 * 24);
                                        @endphp
                                    @if ($days<5)
                                    <div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{ route('product.detail',['slug' => $item->slug]) }}" title="{{$item->name}}">
												<figure><img src="{{asset('storage/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
											</a>

                                            <div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>

											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$item->name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{number_format($item->regular_price)}} VNĐ</span></div>
										</div>
									</div>
                                    @endif
                                    @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">{{ trans('messages.Categories') }}</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{asset('Commerce/assets/images/fashion-accesories-banner.jpg')}}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">
                            <?php $j=0 ?>
                            @foreach ($category_product as $cate)
							<a href="#product{{$j}}" class="tab-control-item <?php if($j==0){echo'active';}else{echo'';} ?>">{{$cate->name}}</a>
                            <?php $j++ ?>
                            @endforeach
						</div>
						<div class="tab-contents">
                            <?php $i=0 ?>
                            @foreach ($category_product as $pro)
                            <div class="tab-content-item <?php if($i==0){echo'active';}else{echo'';} ?>" id="product{{$i}}">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    @foreach ($pro->cate_products as $item)
                                    <div class="product product-style-2 equal-elem">
										<div class="product-thumnail">
											<a href="{{ route('product.detail',['slug' => $item->slug]) }}" title="{{$item->name}}">
												<figure><img src="{{asset('storage/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$item->name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{number_format($item->regular_price)}} VNĐ</span></div>
										</div>
									</div>
                                    @endforeach

								</div>
							</div>
                            <?php $i++;  ?>
                            @endforeach

						</div>
					</div>
				</div>
			</div>

		</div>

	</main>
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("2021-04-30 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
