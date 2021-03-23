<div>
    <main id="main" class="main-site">
		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>checkout</span></li>
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
                    @if (Auth::check())
                        <h5 class="text-info"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                          </svg> Address Customer</h5>
                        <h6><span><b class="text-dark">{{$users->name}} {{$users->phone_number}}</b></span>
                                @if (isset($users->user_province) && isset($users->user_district) && isset($users->user_commune) && isset($users->stress))
                                <span><p class="text-muted">{{$users->stress}}/{{$users->user_commune->name}}/{{$users->user_district->name}}/{{$users->user_province->name}}</p></span>
                                <span><button type="button" data-toggle="modal" data-target="#modelAddress" class="btn btn-primary">Update</button></span>
                                @else
                                <button type="button" data-toggle="modal" data-target="#modelAddress" class="btn btn-primary">
                                    Set up your delivery information</button>
                                @endif
                        </h6>
                    @endif
					<h3 class="box-title">Products</h3>
					<ul class="products-cart">
						@foreach (Cart::content() as $item)
                        <li class="pr-cart-item">
                            <div>
                                <input class="" type="checkbox" name="">
                            </div>
							<div class="product-image">
								<figure><img src="{{asset('Commerce/assets/images/products/'.$item->model->image)}}" alt=""></figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="{{route('product.detail',['slug' => $item->model->slug]) }}">{{$item->model->name}}</a>
							</div>
							<div class="price-field produtc-price"><p class="price">{{$item->model->regular_price}}</p></div>
							<div class="quantity">
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="{{$item->qty}}" data-max="12" pattern="[0-9]*" >
									<a class="btn btn-increase" wire:click.prevent = "upQuantity('{{$item->rowId}}')" href="#"></a>
									<a class="btn btn-reduce" wire:click.prevent = "downQuantity('{{$item->rowId}}')" href="#"></a>
								</div>
							</div>
							<div class="price-field sub-total"><p class="price">{{$item->subtotal}}</p></div>
							<div class="delete">
								<a href="#" class="btn btn-delete" wire:click.prevent="remove('{{ $item->rowId }}')" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
						</li>
                        {{Cart::setTax($item->rowId,10)}}
                        @endforeach
					</ul>
                    @else
                        <p>No item Cart</p>
                    @endif
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index">{{Cart::subtotal(0)}}</b></p>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">{{Cart::Tax(0)}}</b></p>
						<p class="summary-info total-info "><span class="title">Total</span><b class="index">{{Cart::total(0)}}</b></p>
					</div>
				</div>
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" wire:model ='payment_method' id="payment-method-bank" value="Bank" type="radio">
								<span>Direct Bank Transder</span>
								<span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" wire:model ='payment_method' id="payment-method-visa" value="Visa" type="radio">
								<span>visa</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" wire:model ='payment_method' id="payment-method-paypal" value="Paypal" type="radio">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
                            <label class="payment-method">
								<input name="payment-method" wire:model ='payment_method' id="payment-method-paypal" value="Payment on delivery" type="radio" checked='checked'>
								<span>Payment on delivery</span>
								<span class="payment-desc">Please prepare the corresponding amount upon receipt of the goods</span>
							</label>
						</div>
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{Cart::total(0)}}</span></p>
						<a wire:click.prevent = 'checkout' class="btn btn-medium">Place order now</a>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $50.00</span></p>
						<h4 class="title-box">Discount Codes</h4>
						<p class="row-in-form">
							<label for="coupon-code">Enter Your Coupon code:</label>
							<input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">
						</p>
						<a href="#" class="btn btn-small">Apply</a>
					</div>
				</div>

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('Commerce/assets/images/products/digital_04.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('Commerce/assets/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('Commerce/assets/images/products/digital_15.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('Commerce/assets/images/products/digital_01.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('Commerce/assets/images/products/digital_21.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('Commerce/assets/images/products/digital_03.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('Commerce/assets/images/products/digital_04.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset('Commerce/assets/images/products/digital_05.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>
						</div>
					</div><!--End wrap-products-->
				</div>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="modelAddress" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-light">Update your delivery information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" class="text-dark" wire:submit.prevent = 'update' method="post" name="frm-billing">
                                    <p class="row-in-form">
                                        <label for="fname">Name<span>*</span></label>
                                        <input id="fname" wire:model = 'name' type="text" name="fname" class="form-control" value="" placeholder="Your name">
                                    </p>
                                    @error('name')
                                        <small class = 'text-danger'>{{$message}}</small>
                                    @enderror
                                    <p class="row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input id="phone" wire:model = 'phone' type="number" name="phone" class="form-control" value="" placeholder="10 digits format">
                                    </p>
                                    @error('phone')
                                        <small class = 'text-danger'>{{$message}}</small>
                                    @enderror
                                    <div class="form-group w-50">
                                        <label for="my-select">Province/city</label>
                                        <select id="my-select"  wire:model='province' class="form-control" name="" >
                                            @foreach ($provinces as $province)
                                                <option value="{{$province->matp}}">{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('province')
                                        <small class = 'text-danger'>{{$message}}</small>
                                    @enderror
                                    <div class="form-group w-50">
                                        <label for="my-select">District</label>
                                        <select id="my-select" wire:model='district' class="form-control" name="">
                                            @foreach ($districts as $district)
                                                <option value="{{$district->maqh}}">{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('district')
                                        <small class = 'text-danger'>{{$message}}</small>
                                    @enderror
                                    <div class="form-group w-50">
                                        <label for="my-select">Commune</label>
                                        <select id="my-select" wire:model='commune' class="form-control" name="">
                                            @foreach ($communes as $commune)
                                                <option value="{{$commune->xaid}}">{{$commune->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('commune')
                                        <small class = 'text-danger'>{{$message}}</small>
                                    @enderror
                                    <div class="form-group w-50">
                                    <label for="">Stress</label>
                                        <input type="text" wire:model='stress' name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                    @error('stress')
                                     <small class = 'text-danger'>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                             </form>
                        </div>
                    </div>
                </div>
			</div><!--end main content area-->
		</div><!--end container-->

	</main>
</div>
