<div style="background:#9f0acc;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-columns text-muted">
                    @foreach ($vouchers as $voucher)
                    <div class="card">
                        <img class="card-img" src="{{ asset('Commerce/assets/images/icon/voucher.jpg') }}" alt="Card image">
                        @if ( $voucher->quantity >0  && $voucher->end_day >= now())
                            {{-- {{dd(($voucher->discount_users))}} --}}
                            @if ($voucher->discount_users->first())
                                @if ($voucher->discount_users->first()->user_id == Auth::user()->id);
                                <div class="card-img-overlay pl-5  text-center">
                                    @if ($voucher->type==1)
                                    <h4 class="card-title text-warning">Giảm {{$voucher->reduced_price}} VNĐ </h4>
                                    @else
                                    <h4 class="card-title text-warning">Giảm {{$voucher->reduced_price}} % </h4>
                                    @endif
                                    <p class="card-text text-info">{{$voucher->start_day}}-{{$voucher->end_day}}</p>
                                    <button wire:click.prevent = 'get_code({{$voucher->id}})' type="button" class="btn btn-primary">Lấy mã</button>
                                </div>
                                @else
                                    <div class="card-img-overlay pl-5 mt-2 text-center">
                                        @if ($voucher->type==1)
                                        <h4 class="card-title ">Giảm {{$voucher->reduced_price}} VNĐ </h4>
                                        @else
                                        <h4 class="card-title ">Giảm {{$voucher->reduced_price}} % </h4>
                                        @endif
                                        <p class="card-text">{{$voucher->start_day}}-{{$voucher->end_day}}</p>
                                        <h4>Đã nhận</h4>
                                    </div>
                                @endif
                            @else
                            <div class="card-img-overlay pl-5  text-center">
                                @if ($voucher->type==1)
                                <h4 class="card-title text-warning">Giảm {{$voucher->reduced_price}} VNĐ </h4>
                                @else
                                <h4 class="card-title text-warning">Giảm {{$voucher->reduced_price}} % </h4>
                                @endif
                                <p class="card-text text-info">{{$voucher->start_day}} - {{$voucher->end_day}}</p>
                                <button wire:click.prevent = 'get_code({{$voucher->id}})' type="button" class="btn btn-primary">Lấy mã</button>
                            </div>
                            @endif
                        @else
                            <div class="card-img-overlay mr-auto mt-2 text-center">
                                @if ($voucher->type==1)
                                <h4 class="card-title ">Giảm {{$voucher->reduced_price}} VNĐ </h4>
                                @else
                                <h4 class="card-title">Giảm {{$voucher->reduced_price}} % </h4>
                                @endif
                                <p class="card-text">{{$voucher->start_day}}-{{$voucher->end_day}}</p>
                                <h4>Đã hết</h4>
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
