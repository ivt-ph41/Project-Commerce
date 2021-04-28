<div>
    <div class="container-fluid">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>my-voucher</span></li>
            </ul>
        </div>
        <div class="row">
            <h1 class="text-light">Super Hot Voucher</h1>
            <div class="col-lg-12">
                <div class="card-columns text-muted">
                    @foreach ($Myvouchers->user_discounts as $Myvoucher)
                    <div class="card">
                        <img class="card-img" src="{{ asset('Commerce/assets/images/icon/voucher.jpg') }}" alt="Card image">
                        @if ($Myvoucher->end_day >= now() && $Myvoucher->pivot->status == 'enable')
                                <div class="card-img-overlay pl-5  text-center">
                                    @if ($Myvoucher->type==1)
                                    <h4 class="card-title text-warning">Sale  {{$Myvoucher->reduced_price}} VNĐ </h4>
                                    @else
                                    <h4 class="card-title text-warning">Sale  {{$Myvoucher->reduced_price}} % </h4>
                                    @endif
                                    <p class="card-text text-info">{{$Myvoucher->start_day}}-{{$Myvoucher->end_day}}</p>
                                    <h3>Code: {{$Myvoucher->code}}</h3>
                                </div>
                        @else
                            <div class="card-img-overlay mr-auto mt-2 text-center">
                                @if ($Myvoucher->type==1)
                                <h4 class="card-title ">Sale {{$Myvoucher->reduced_price}} VNĐ </h4>
                                @else
                                <h4 class="card-title">Sale {{$Myvoucher->reduced_price}} % </h4>
                                @endif
                                <p class="card-text">{{$Myvoucher->start_day}}-{{$Myvoucher->end_day}}</p>
                                <h5 class="text-dark pl-5">You have used an expired discount card or discount card</h5>
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
