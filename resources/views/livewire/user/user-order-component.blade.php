
<main id="main" class="main-site" style='background: #f5f3f3 '>
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 text-muted">
                    <h6>My Order</h6>
                    <hr>
                    @foreach ($orders as $order)
                    <table class="table border-0 bg-white">
                        <thead>
                            <tr>
                                <th>Order: <span class="text-info">{{$order->id}}</span></th>
                                <th>Set the date: <span class="text-info">{{$order->created_at}}</span></th>
                                <th>Total: <span class="text-info">{{$order->total}} VNĐ</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_items as $order_item)
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Qty: <span class="text-muted">{{$order_item->quantity}}</span></td>
                                <td><span class="text-muted">{{$order_item->price}} VNĐ</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endforeach
            </div>
        </div>
    </div>
</main>
