<div>
    <main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Digital & Electronics</span></li>
				</ul>
			</div>
			<div class="row bg-light" >
				<div class="col-lg-10 col-md-8 col-sm-8 col-xs-12 pt-5 main-content-area">
                    <!--  Banner Category -->
					<div class="banner-shop">
                        @if (isset($category_sliders))
                                <div id="carouselId" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselId" data-slide-to="1"></li>
                                        <li data-target="#carouselId" data-slide-to="2"></li>
                                        <li data-target="#carouselId" data-slide-to="3"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <?php $i=0; foreach ($category_sliders as $item): ?>
                                        <?php if ($i==0) {$set_ = 'active'; } else {$set_ = ''; } ?>
                                            <div class='carousel-item <?php echo $set_; ?>'>
                                                <a href="#" class="banner-link">
                                                    <figure><img src="{{asset('storage/'.$item->images)}}" alt="{{$item->images}}" class='d-block w-100'></figure>
                                                </a>
                                            </div>
                                        <?php $i++; endforeach ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                        @else
                        <a href="#" class="banner-link">
							<figure><img src="{{asset('Commerce/assets/images/shop-banner.jpg')}}" alt=""></figure>
						</a>
                        @endif
					</div>
                    <!--  /Banner Category -->
					<div class="wrap-shop-control">

						<h1 class="shop-title">Digital & Electronics</h1>

						<div class="wrap-right">

							<div class="sort-item orderby">
								<select name="orderby" class="" wire:model="sort" >
									<option value="default" selected="selected">Default sorting</option>
									<option value="popularity">Sort by popularity</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
							</div>

							<div class="sort-item orderby">
								<input class="" wire:model='search' type="text" name="" placeholder="Search...">
							</div>
							<div class="change-display-mode">
								<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
								<a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
							</div>

						</div>

					</div><!--end wrap shop control-->
                    {{-- {{dd($products->first()->product_images->first()->images)}} --}}
					<div class="row">
						@foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-3 h-10 ">
								<div class="product product-style-3 equal-elem card rounded">
									<div class="product-thumnail">
										<a href="{{route('product.detail',['slug' =>$product->slug ])}}" title="{{$product->name}}">
											<figure><img src="{{asset('storage/'.$product->image)}}" alt="{{ $product->image }}"></figure>
                                            @if($product->sale_percent > 0)
                                                <span class="badge badge-pill badge-primary" style="z-index:2;position:absolute;top:10px;left:10px">- {{$product->sale_percent}} %</span>
                                            @endif
										</a>
									</div>
                                    @php
                                        $date = strtotime($product->created_at);
                                        $day_create = date('Y-m-d h:i:sa', $date) ;
                                        $date_now = date('Y-m-d H:i:s') ; //current date
                                        $days = (strtotime($date_now) - strtotime($day_create)) / (60 * 60 * 24);
                                    @endphp
                                    @if ($days<5)
                                        <span class="badge badge-lg badge-danger" style="z-index:2;position:absolute;top:10px;right:10px">new</span>
                                    @endif
									<div class="product-info pl-3">
										<a href="#" class="product-name"><span>{{$product->name}}</span></a>
										<div class="wrap-price"><span class="product-price text-warning">{{number_format($product->regular_price)}} VNĐ</span></div>
                                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <a href="{{route('product.detail',['slug' =>$product->slug ])}}" title="{{$product->name}}">
                                                        <img class="border border-info" width="30" height="30" src="{{asset('storage/'.$product->image)}}" alt="First slide">
                                                    </a>
                                                </div>
                                                @foreach ($product->product_images as $images)
                                                    <div class="carousel-item">
                                                        <a href="{{route('product.detail',['slug' =>$product->slug ])}}" title="{{$product->name}}">
                                                            <img class="border border-warning" width="30" height="30" src="{{asset('storage/'.$images->images)}}" alt="First slide">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
										<a href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" class="btn add-to-cart">Add To Cart</a>
									</div>
								</div>
							</div>
                            @endforeach
					</div>
					<div class="wrap-pagination-info">
                        {{ $products->links() }}
						{{-- <ul class="page-numbers">
							<li><span class="page-number-item current" >1</span></li>
							<li><a class="page-number-item" href="#" >2</a></li>
							<li><a class="page-number-item" href="#" >3</a></li>
							<li><a class="page-number-item next-link" href="#" >Next</a></li>
						</ul>
						<p class="result-count">Showing 1-8 of 12 result</p> --}}
					</div>
				</div><!--end main products area-->

				<div class="col-lg-2 col-md-4 col-sm-4 pt-5 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							<ul class="list-category">
								@foreach ($categories as $category)
                                <li class="category-item has-child-cate">
									<a href="{{route('category.product',['slug_cat' => $category->slug])}}" class="cate-link">{{ $category->name }}</a>
									<span class="toggle-control">+</span>
									<ul class="sub-cate">
										<li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
									</ul>
								</li>
                                @endforeach
							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Brand</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list list-limited" data-show="6">
								@if (isset($slug_cat))
                                @foreach ($brand_show as $brand)
                                <li class="list-item"><a class="filter-link " href="{{route('brand.product',['slug_cat'=>$slug_cat,'slug_brand'=>$brand->slug])}}">{{$brand->name}}</a></li>
                                @endforeach
								<li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
								<li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                                @endif
							</ul>
						</div>
					</div><!-- brand widget-->

					<div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Price</h2>
						<div class="widget-content">
							<form class="form-inline">
                                <div class="form-group">
                                    <input type="text" name="" id="" class="form-control" style="width:80px" wire:model = 'price_start' placeholder="from" aria-describedby="helpId">-
                                    <input type="text" name="" id="" class="form-control" style="width:80px" wire:model = 'price_end' placeholder="to" aria-describedby="helpId">
                                </div>
                            </form>
						</div>
					</div><!-- Price-->

					@if (isset($SelectColor))
                    <div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Color</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list has-count-index">
								<li class="text-danger "><input class="" wire:model='SelectColor' type="checkbox" name="" value="Red"> Red</li>
								<li class="text-warning list-item"><input class="" wire:model='SelectColor' type="checkbox" name="" value="Yellow"> Yellow</li>
								<li class="text-dark list-item"><input class="" wire:model='SelectColor' type="checkbox" name="" value="Black"> Black</li>
								<li class="text-primary list-item"><input class="" wire:model='SelectColor' type="checkbox" name="" value="Blue"> Blue</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectColor' type="checkbox" name="" value="Grey"> Grey</li>
								<li class="list-item"><input class="" wire:model='SelectColor' type="checkbox" name="" value="Pink"> Pink</li>
							</ul>
						</div>
					</div><!-- Color -->
                    @endif
                    @if (isset($SelectRam))
                    <div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Memory Ram</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list has-count-index">
								<li class="text-muted "><input class="" wire:model='SelectRam' type="checkbox" name="" value="1"> 1Gb</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectRam' type="checkbox" name="" value="<i class="ri-24-hours-fill"></i> 2Gb</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectRam' type="checkbox" name="" value="3"> 3Gb</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectRam' type="checkbox" name="" value="4"> 4Gb</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectRam' type="checkbox" name="" value="5"> 5Gb</li>
								<li class="list-muted"><input class="" wire:model='SelectRam' type="checkbox" name="" value="6"> 6Gb</li>
							</ul>
						</div>
					</div><!-- Ram -->
                    @endif
                    @if (isset($SelectOS))
                    <div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Operating system</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list has-count-index">
								<li class="text-muted "><input class="" wire:model='SelectOS' type="checkbox" name="" value="Android"> Android</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectOS' type="checkbox" name="" value="Blackberry OS"> Blackberry OS</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectOS' type="checkbox" name="" value="iOS"> iOS</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectOS' type="checkbox" name="" value="Windows Phone"> Windows Phone</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectOS' type="checkbox" name="" value="Windows"> Windows</li>
								<li class="text-muted list-item"><input class="" wire:model='SelectOS' type="checkbox" name="" value="Mac OS"> Mac OS</li>
                                <li class="text-muted list-item"><input class="" wire:model='SelectOS' type="checkbox" name="" value="Linux"> Linux</li>
							</ul>
						</div>
					</div><!-- OS -->
                    @endif
                    @if (isset($Battery))
                    <div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Battery capacity</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list has-count-index">
								<li class="text-muted "><input class="" wire:model='Battery' type="checkbox" name="" value="1000"> 1000 mah</li>
								<li class="text-muted"><input class="" wire:model='Battery' type="checkbox" name="" value="2000"> 2000 mah</li>
								<li class="text-muted"><input class="" wire:model='Battery' type="checkbox" name="" value="3000"> 3000 mah</li>
								<li class="text-muted"><input class="" wire:model='Battery' type="checkbox" name="" value="4000"> 4000 mah</li>
								<li class="text-muted"><input class="" wire:model='Battery' type="checkbox" name="" value="5000"> 5000 mah</li>
								<li class="text-muted"><input class="" wire:model='Battery' type="checkbox" name="" value="6000"> 6000 mah</li>
                                <li class="text-muted"><input class="" wire:model='Battery' type="checkbox" name="" value="7000"> 7000 mah</li>
							</ul>
						</div>
					</div><!-- OS -->
                    @endif

					<div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Size</h2>
						<div class="widget-content">
							<ul class="list-style inline-round ">
								<li class="list-item"><a class="filter-link active" href="#">s</a></li>
								<li class="list-item"><a class="filter-link " href="#">M</a></li>
								<li class="list-item"><a class="filter-link " href="#">l</a></li>
								<li class="list-item"><a class="filter-link " href="#">xl</a></li>
							</ul>
							<div class="widget-banner">
								<figure><img src="{{asset('Commerce/assets/images/size-banner-widget.jpg')}}" width="270" height="331" alt=""></figure>
							</div>
						</div>
					</div><!-- Size -->

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
											<div class="wrap-price"><span class="product-price">{{$item->regular_price}}</span></div>
										</div>
									</div>
								</li>
                                @endforeach
							</ul>
						</div>
					</div><!-- brand widget-->

				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->
	</main>
</div>
