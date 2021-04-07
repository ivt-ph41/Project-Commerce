
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
                            <a class="text-dark" href="" ><b>Favorite products</b></a>
                          <span class="badge badge-primary badge-pill">1</span>
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
                                <th>
                                    <a title='cancel order' onclick=" return confirm('You definitely want to cancel this order')" wire:click.prevent = 'cancel({{$order->id}})'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                    </svg></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_items as $order_item)
                            <tr>
                                <td><b>{{App\Models\Product::where('id',$order_item->product_id)->first()->name}}</b></td>
                                <td><img src="{{asset('storage/'.App\Models\Product::where('id',$order_item->product_id)->first()->image)}}" width=50 height=50 alt='The product has stopped selling at the store' ></td>
                                <td>Qty: <span class="text-muted">{{$order_item->quantity}}</span></td>
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
