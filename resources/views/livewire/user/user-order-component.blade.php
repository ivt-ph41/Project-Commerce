
<main id="main" class="main-site" style='background: #f5f3f3 '>
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>my-order</span></li>
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
                          <span class="badge badge-primary badge-pill"></span>
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
                    <h6>My Order</h6>
                    <div class="form-group">
                        <select class="form-control form-control-sm" wire:model = 'sort' name="" id="">
                        <option value='default'>5 nearest orders</option>
                        <option value="week">Orders of the week</option>
                        <option value="all">All orders</option>
                      </select>
                    </div>
                    <hr>
                    @foreach ($orders as $order)
                    <table class="table border-0 bg-white">
                        <thead>
                            <tr>
                                <th>Order: <span class="text-info">{{$order->id}}</span></th>
                                <th>Set the date: <span class="text-info">{{$order->created_at}}</span></th>
                                <th>Status:
                                    @if ($order->status == 'Cancelled')
                                        <span class="text-danger">{{$order->status}}</span>
                                    @else
                                        <span class="text-info">{{$order->status}}</span>
                                    @endif
                                </th>
                                <th>Total: <span class="text-info">{{number_format($order->total)}} VNĐ</span></th>
                                    @if ($order->status== 'new orders'||$order->status== 'processing')
                                    <th>
                                        <button title='cancel order' onclick=" return confirm('You definitely want to cancel this order')" wire:click.prevent = 'cancel({{$order->id}})' type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                    </th>
                                    @endif

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_items as $order_item)
                            <tr>
                                <td><b>{{App\Models\Product::where('id',$order_item->product_id)->first()->name}}</b></td>
                                <td><img src="{{asset('storage/'.App\Models\Product::where('id',$order_item->product_id)->first()->image)}}" width=50 height=50 alt='The product has stopped selling at the store' ></td>
                                <td>Qty: <span class="text-muted">{{$order_item->quantity}}</span></td>
                                <td>Color: <span class="text-muted">{{$order_item->color}}</span></td>
                                <td><span class="text-muted">{{number_format($order_item->price)}} VNĐ</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endforeach
            </div>
        </div>
    </div>
</main>
