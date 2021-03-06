<div>
    <main id="main" class="main-site">
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>detail</span></li>
				</ul>
			</div>
			<div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail">
						<div class="detail-media">
                            <div class="wrapper">
                                <div class="card">
                                    <div class="img-magnifier-container">
                                        <img id="myimage" src="{{asset('storage/'.$products->image)}}" width="300" height="240" alt="Girl">
                                        <div class="thumbnail text-center">
                                            @foreach ($products->product_images as $images)
                                            <img id="name" onclick="change_image(this)" src="{{asset('storage/'.$images->images)}}" width="70">
                                            @endforeach
                                        </div>
                                      </div>
                                </div>
                            </div>
						</div>
						<div class="detail-info">
							<div class="product-rating">
                                <div class="star-rating">
                                    <span class="width-{{number_format($review_avg)}}-percent">Rated <strong class="rating">5</strong> out of 5</span>
                                </div>
                                <a href="#" class="count-review">({{$review_count}} review)</a>
                            </div>
                            <h2 class="product-name">{{ $products->name }}</h2>
                            @if ($products->quantity > 0)
                            <p class="text-dark">View: <b class="text-info">{{$products->view}}</b></p>
                            <div class="short-desc">
                                <ul>
                                    <li>{{$products->short_description}}</li>
                                </ul>
                            </div>
                            {{-- <div class="wrap-social">
                            	<a class="link-socail" href="#"><img src="{{asset('Commerce/assets/images/products/'.$products->image)}}" alt=""></a>
                            </div> --}}
                            <div class="wrap-price"><span class="product-price text-warning">{{number_format($products->regular_price)}} VN??</span>
                                @if ($products->sale_percent>0)
                                <span class="text-dark"> -{{$products->sale_percent}}%</span>
                                @endif
                            </div>
                            <div class="stock-info in-stock">
                                <p class="availability">Availability: <b>{{$products->stock_status}}</b></p>
                            </div>
                            <div class="quantity">
                            	<span>Quantity:</span>
								<div class="quantity-input">
									<input type="text" name="product-quatity" wire:model = 'quantity' data-max="120" pattern="[0-9]*" >

									<a class="btn btn-reduce" wire:click.prevent = 'down_quantity' href="#"></a>
									<a class="btn btn-increase" wire:click.prevent = 'up_quantity' href="#"></a>
								</div>
							</div>
                            <div class="quantity">
                            	<span>Color:</span>
                                    <label class="btn btn-dark btn-sm active ">
                                        <input class="form-check-input" wire:model.defer = 'color' type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Black" checked='checked'>Black
                                    </label>
                                    <label class="btn btn-danger btn-sm">
                                        <input class="form-check-input" wire:model.defer = 'color' type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Red">Red
                                    </label>
                                    <label class="btn btn-info btn-sm">
                                        <input class="form-check-input" wire:model.defer = 'color' type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Blue">Blue
                                    </label>
                                    <label class="btn btn-light btn-sm">
                                        <input class="form-check-input" wire:model.defer = 'color' type="radio" name="inlineRadioOptions" id="inlineRadio3" value="White">White
                                    </label>
                                    <label class="btn btn-warning btn-sm">
                                        <input class="form-check-input" wire:model.defer = 'color' type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Yellow">Yellow
                                    </label>
                                    <label class="btn btn-secondary btn-sm">
                                        <input class="form-check-input" wire:model.defer = 'color' type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Gray">Gray
                                    </label>
							</div>
							<div class="wrap-butons">
								<a href="#" wire:click.prevent="storeCart({{$products->id}},'{{$products->name}}',{{$quantity}},{{$products->regular_price}})" class="btn add-to-cart">Add to Cart</a>
                                <a href="#" wire:click.prevent="storeBuy({{$products->id}},'{{$products->name}}',{{$quantity}},{{$products->regular_price}})" class="btn buy-now">Buy Now</a>
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    @if ($wishlist_check!=Null)
                                        @if ($wishlist_check->id == $products->id)
                                            <button type="button" class="btn btn-wishlist">Liked</button>
                                        @else
                                        <a href="#" wire:click.prevent = 'Wishlist({{$products->id}})' class="btn btn-wishlist">Add Wishlist</a>
                                        @endif
                                    @else
                                    <a href="#" wire:click.prevent = 'Wishlist({{$products->id}})' class="btn btn-wishlist">Add Wishlist</a>
                                    @endif
                                </div>
							</div>
                            @else
                                <h2>OUT OF STOCK</h2>
                            @endif
						</div>
						<div class="advance-info">
							<div class="tab-contents">
                                <div class="text-dark pt-3 pl-3" id="add_infomation">
                                    <div class="order-summary">
                                        <h4 class="title-box">Infomation</h4>
                                    </div>
									<table class="shop_attributes ml-5">
										<tbody>
                                            <tr>
												<th>Origin</th><td class="product_weight">{{ $products->origin }}</td>
											</tr>
                                            <tr>
												<th>Brand</th><td class="product_weight">@if ($products->product_brands)
                                                    {{ $products->product_brands->name}}
                                                @endif</td>
											</tr>
											<tr>
												<th>Weight</th><td class="product_weight">{{ $products->weight }}Kg</td>
											</tr>
											<tr>
												<th>Dimensions</th><td class="product_dimensions">{{ $products->Dimension }}</td>
											</tr>
											<tr>
												<th>Color</th><td><p>{{ $products->color }}</p></td>
											</tr>
                                            <tr>
												<th>Operating system</th><td><p>{{ $products->operating_system }}</p></td>
											</tr>
                                            <tr>
												<th>Ram</th><td><p>{{ $products->ram }} GB</p></td>
											</tr>
                                            <tr>
												<th>Network connect</th><td><p>{{ $products->network_connect }}</p></td>
											</tr>
                                            <tr>
												<th>Battery capacity</th><td><p>{{ $products->battery_capacity }}</p></td>
											</tr>
										</tbody>
									</table>
								</div>
                                <div class="text-dark pt-3 pl-3" id="description">
                                    <div class="order-summary">
                                        <h4 class="title-box">Description</h4>
                                    </div>
                                    {{$products->description}}
								</div>
								<div class="text-dark pt-3 pl-3" id="reviews" wire:poll.10000ms = 'render'>
                                    <div class="order-summary">
                                        <h4 class="title-box">Reviews</h4>
                                    </div>
                                    @if (Auth::check())
                                    <div id="review_form_wrapper" class="ml-5">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">

                                                <form action="#" method="post" wire:keydown.enter='review' id="commentform" class="comment-form" novalidate="">
                                                    <p class="comment-notes">
                                                        <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <span>Your rating</span>
                                                        <p class="stars">
                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" wire:model='rating' name="rating" value="1" checked='checked'>
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" wire:model='rating' name="rating" value="2">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" wire:model='rating' name="rating" value="3">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" wire:model='rating' name="rating" value="4">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" wire:model='rating' name="rating" value="5" >
                                                        </p>
                                                    </div>

                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review <span class="required">*</span>
                                                        </label>
                                                        <textarea id="comment" wire:model.defer='comment' name="comment" class="w" rows="3"></textarea>
                                                        @error('comment')
                                                            <small class="text-primary">{{$message}}</small>
                                                        @enderror
                                                    </p>
                                                </form>

                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div><!-- #review_form_wrapper -->
                                    <div class="wrap-review-form">
                                        @foreach ($reviews as $review)
                                        <div id="comments">
											<ol class="commentlist">
												<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
													<div id="comment-20" class="comment_container">
														<img alt="" src="{{asset('Commerce/assets/images/icon/users.png')}}" height="80" width="80">
														<div class="comment-text">
															<div class="star-rating">
																<span class="width-{{$review->rating}}-percent">Rated <strong class="rating">5</strong> out of 5</span>
															</div>
															<p class="meta">
																<strong class="woocommerce-review__author">{{$review->review_users->name}}</strong>
																<span class="woocommerce-review__dash">???</span>
																<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{$review->created_at}}</time>
															</p>
															<p>{{$review->comment}}</p>
                                                                <div id="" class="form_reply">
                                                                    <form action="" wire:submit.prevent='reply({{$review->id}})' method="post" class="mt-2">
                                                                        <div class="form-group">
                                                                          <input type="text" wire:model.lazy='relpy_comment'  name="" id="" class="form-control w-50" placeholder="" aria-describedby="helpId">
                                                                          @error('relpy_comment')
                                                                                <small class="text-primary">Vui l??ng nh???p ph???n h???i</small><br>
                                                                          @enderror
                                                                            <button type="submit" class="btn btn-outline-primary btn-sm mt-2"  id="id{{$review->id}}">Tr??? l???i</button>
																			<div wire:loading.delay wire:target="reply({{$review->id}})">
																				<div class="spinner-border spinner-border-sm text-success"></div>Loading comments
																			</div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class='pl-5'>
                                                                    @foreach ($review->reply_reviews as $item)
                                                                        <strong class="woocommerce-review__author">{{$item->user}}</strong>
																        <span class="woocommerce-review__dash">???</span>
																        <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{$item->created_at}}</time>
                                                                        <p>{{$item->comment}}</p>

                                                                    @endforeach
                                                                </div>
                                                                <script>

                                                                // $('#id'+<?=$review->id?>).click(function(){
                                                                //     $('#form'+<?=$review->id?>).fadeToggle(1000);
                                                                // })
                                                                </script>
														</div>
													</div>
												</li>
											</ol>
										</div><!-- #comments -->
                                        @endforeach
									</div>
                                    @else
                                        <p>Vui l??ng ????ng nh???p ????? ti???p t???c</p>
                                    @endif

								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget widget-our-services ">
						<div class="widget-content">
							<ul class="our-services">

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Free Shipping</b>
											<span class="subtitle">On Oder Over $99</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-gift" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Special Offer</b>
											<span class="subtitle">Get a gift!</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-reply" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Order Return</b>
											<span class="subtitle">Return within 7 days</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Popular Products</h2>
						<div class="widget-content">
							<ul class="products">
								@foreach ($popular_product as $item)
                                <li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{ route('product.detail',['slug' =>$item->slug]) }}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{asset('storage/'.$item->image)}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$item->name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{number_format($item->regular_price)}} VN??</span></div>
										</div>
									</div>
								</li>
                                @endforeach

							</ul>
						</div>
					</div>

				</div><!--end sitebar-->
                <div class="wrap-show-advance-info-box">
                    <h3 class="title-box">Related products</h3>
                </div>
				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                        <li data-target="#multi-item-example" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->

                        <!--Slides-->
                        <!--First slide-->
                        <div class="carousel-item active">
                            <div class="row">
                            @foreach ($related_product as $item)
                                @if ($loop->iteration<=6)
                                <div class="col-md-2">
                                    <a href="{{ route('product.detail',['slug' =>$item->slug]) }}">
                                        <div class="card mb-2">
                                            <img class="card-img-top" src="{{asset('storage/'.$item->image)}}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <p class="card-title text-warning">{{$item->name}}</p>
                                                <p class="card-text text-dark">{{number_format($item->regular_price)}} VN??</p>
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
                            @foreach ($related_product as $item)
                                @if ($loop->iteration>6 && $loop->iteration<=12)
                                <div class="col-md-2">
                                    <a href="{{ route('product.detail',['slug' =>$item->slug]) }}">
                                        <div class="card mb-2">
                                        <img class="card-img-top" src="{{asset('storage/'.$item->image)}}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-title text-warning">{{$item->name}}</p>
                                            <p class="card-text text-dark">{{number_format($item->regular_price)}} VN??</p>
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

			</div><!--end row-->

		</div><!--end container-->

	</main>
</div>
<script>
function change_image(image){
var image_container = document.getElementById("myimage");


image_container.src = image.src;

}
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);

  /* Create magnifier glass: */
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");

  /* Insert magnifier glass: */
  img.parentElement.insertBefore(glass, img);

  /* Set background properties for the magnifier glass: */
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;

  /* Execute a function when someone moves the magnifier glass over the image: */
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);

  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /* Prevent any other actions that may occur when moving over the image */
    e.preventDefault();
    /* Get the cursor's x and y positions: */
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /* Prevent the magnifier glass from being positioned outside the image: */
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /* Set the position of the magnifier glass: */
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /* Display what the magnifier glass "sees": */
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /* Get the x and y positions of the image: */
    a = img.getBoundingClientRect();
    /* Calculate the cursor's x and y coordinates, relative to the image: */
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /* Consider any page scrolling: */
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
/* Execute the magnify function: */
magnify("myimage", 3);
/* Specify the id of the image, and the strength of the magnifier glass: */
</script>

