<div style="background:#9f0acc;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--  Banner Category -->
					<div class="banner-shop">
                        @if (isset($voucher_sliders))
                                <div id="carouselId" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselId" data-slide-to="1"></li>
                                        <li data-target="#carouselId" data-slide-to="2"></li>
                                        <li data-target="#carouselId" data-slide-to="3"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <?php $i=0; foreach ($voucher_sliders as $item): ?>
                                        <?php if ($i==0) {$set_ = 'active'; } else {$set_ = ''; } ?>
                                            <div class='carousel-item <?php echo $set_; ?>'>
                                                <a href="#" class="banner-link">
                                                    <figure><img src="{{asset('Commerce/assets/images/sliders/'.$item->image)}}" alt="{{$item->image}}" class='d-block w-100'></figure>
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
            </div>
        </div>
        <div class="row">
            <h1 class="text-light">Super Hot Voucher</h1>
            <div class="col-lg-12">
                <div class="card-columns text-muted">
                    @foreach ($vouchers as $voucher)
                    <div class="card">
                        <img class="card-img" src="{{ asset('Commerce/assets/images/icon/voucher.jpg') }}" alt="Card image">

                            @if ($voucher->discount_users->first())
                                @if ($voucher->discount_users->first()->id == Auth::user()->id)
                                <div class="card-img-overlay pl-5 mt-2 text-center">
                                    @if ($voucher->type==1)
                                    <h4 class="card-title ">Giảm {{$voucher->reduced_price}} VNĐ </h4>
                                    @else
                                    <h4 class="card-title ">Giảm {{$voucher->reduced_price}} % </h4>
                                    @endif
                                    <p class="card-text">{{$voucher->start_day}}-{{$voucher->end_day}}</p>
                                    <h4>Đã nhận</h4>
                                </div>
                                @else
                                <div class="card-img-overlay pl-5  text-center">
                                    @if ($voucher->type==1)
                                    <h4 class="card-title text-warning">Giảm {{$voucher->reduced_price}} VNĐ </h4>
                                    @else
                                    <h4 class="card-title text-warning">Giảm {{$voucher->reduced_price}} % </h4>
                                    @endif
                                    <p class="card-text text-info">{{$voucher->start_day}}-{{$voucher->end_day}}</p>
                                    <button wire:click.prevent = 'get_code({{$voucher->id}})' type="button" class="btn btn-primary">Lấy mã</button>
                                </div>
                                @endif
                            @else
                            <div class="card-img-overlay pl-5  text-center">
                                @if ($voucher->type==1)
                                <h4 class="card-title text-warning">Giảm {{number_format($voucher->reduced_price)}} VNĐ </h4>
                                @else
                                <h4 class="card-title text-warning">Giảm {{$voucher->reduced_price}} % </h4>
                                @endif
                                <p class="card-text text-info">{{$voucher->start_day}} - {{$voucher->end_day}}</p>
                                <button wire:click.prevent = 'get_code({{$voucher->id}})' type="button" class="btn btn-primary">Lấy mã</button>
                            </div>
                            @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
