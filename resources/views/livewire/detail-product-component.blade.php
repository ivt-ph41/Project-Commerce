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
							<div class="product-gallery">
							  <ul class="slides">
                                <li data-thumb="{{asset('Commerce/assets/images/products/'.$products->image)}}">
                                    <img src="{{asset('Commerce/assets/images/products/'.$products->image)}}" alt="product thumbnail" />
                                </li>
							    {{-- @foreach ($products->product_images as $images)
                                    <li data-thumb="{{asset('Commerce/assets/images/products/'.$images->images)}}">
                                        <img src="{{asset('Commerce/assets/images/products/'.$images->images)}}" alt="product thumbnail" />
                                    </li>
                                @endforeach --}}

							  </ul>
							</div>
						</div>
						<div class="detail-info">
							<div class="product-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <a href="#" class="count-review">(05 review)</a>
                            </div>
                            <h2 class="product-name">{{ $products->name }}</h2>
                            <p class="text-dark">View: <b class="text-info">{{$products->view}}</b></p>
                            <div class="short-desc">
                                <ul>
                                    <li>{{$products->short_description}}</li>
                                </ul>
                            </div>
                            {{-- <div class="wrap-social">
                            	<a class="link-socail" href="#"><img src="{{asset('Commerce/assets/images/products/'.$products->image)}}" alt=""></a>
                            </div> --}}
                            <div class="wrap-price"><span class="product-price text-warning">{{$products->regular_price}}</span>
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
							<div class="wrap-butons">
								<a href="#" wire:click.prevent="storeCart({{$products->id}},'{{$products->name}}',{{$quantity}},{{$products->regular_price}})" class="btn add-to-cart">Add to Cart</a>
                                <a href="#" wire:click.prevent="storeBuy({{$products->id}},'{{$products->name}}',{{$quantity}},{{$products->regular_price}})" class="btn buy-now">Buy Now</a>
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                                </div>
							</div>
						</div>
						<div class="advance-info">
							<div class="tab-contents">
                                <div class="" id="add_infomation">
                                    <h4 class="text-muted pt-3 pl-3">IFNOMATION</h4>
									<table class="shop_attributes ml-5">
										<tbody>
                                            <tr>
												<th>Origin</th><td class="product_weight">{{ $products->product_details->origin }}</td>
											</tr>
                                            <tr>
												<th>Brand</th><td class="product_weight">{{ $products->product_details->brand }}</td>
											</tr>
											<tr>
												<th>Weight</th><td class="product_weight">{{ $products->product_details->weight }}</td>
											</tr>
											<tr>
												<th>Dimensions</th><td class="product_dimensions">{{ $products->product_details->dimension }}</td>
											</tr>
											<tr>
												<th>Color</th><td><p>{{ $products->product_details->color }}</p></td>
											</tr>
										</tbody>
									</table>
								</div>
                                <div class="" id="description">
                                <h4 class="text-muted pt-3 pl-3">DESCRIPTION</h4>
                                    {{$products->description}}
								</div>
								<div class="text-dark pt-3 pl-3" id="reviews">
                                    <h4 class="text-muted">REVIEWS</h4>
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
                                                        <textarea id="comment" wire:model='comment' name="comment" class="w" rows="3"></textarea>
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
																<span class="woocommerce-review__dash">–</span>
																<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{$review->created_at}}</time>
															</p>
															<p>{{$review->comment}}</p>
                                                                <div id="" class="form_reply">
                                                                    <form action="" wire:submit.prevent='reply({{$review->id}})' method="post" class="mt-2">
                                                                        <div class="form-group">
                                                                          <input type="text" wire:model='relpy_comment'  name="" id="" class="form-control w-50" placeholder="" aria-describedby="helpId">
                                                                          @error('relpy_comment')
                                                                                <small class="text-primary">Vui lòng nhập phản hồi</small><br>
                                                                          @enderror
                                                                            <button type="submit" class="btn btn-outline-primary btn-sm mt-2"  id="id{{$review->id}}">Trả lời</button>
																			<div wire:loading.delay wire:target="reply({{$review->id}})">
																				<div class="spinner-border spinner-border-sm text-success"></div>Loading comments
																			</div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class='pl-5'>
                                                                    @foreach ($review->reply_reviews as $item)
                                                                        <strong class="woocommerce-review__author">{{$item->user}}</strong>
																        <span class="woocommerce-review__dash">–</span>
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
                                        <p>Vui lòng đăng nhập để tiếp tục</p>
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
												<figure><img src="{{asset('Commerce/assets/images/products/'.$item->image)}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$item->name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{ $item->regular_price}}</span></div>
										</div>
									</div>
								</li>
                                @endforeach

							</ul>
						</div>
					</div>

				</div><!--end sitebar-->

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
                                            <img class="card-img-top" src="{{asset('Commerce/assets/images/products/'.$item->image)}}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <p class="card-title text-warning">{{$item->name}}</p>
                                                <p class="card-text text-dark">{{$item->regular_price}}</p>
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
                                        <img class="card-img-top" src="{{asset('Commerce/assets/images/products/'.$item->image)}}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-title text-warning">{{$item->name}}</p>
                                            <p class="card-text text-dark">{{$item->regular_price}}</p>
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
