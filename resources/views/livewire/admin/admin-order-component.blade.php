
<div class="tab-contents" wire:poll.10000ms>

    <div class="tab-content-item active" id="description">
        <a name="" id=""  href="#" role="button" data-toggle="modal" data-target="#modalAdd">

        </a>
        <a name="" id=""    onclick=" return confirm('Surely you want to log out!')" wire:click.prevent = 'deleteAll' href="#" role="button">

        </a>
        <div class="row mb-2">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Order</span>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="button-ap-list responsive-btn">
                    <div class="btn-group btn-custom-groups btn-custom-groups-one btn-mg-b-10">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <select name="sort" wire:model='sort' class="form-control">
                    <option value="default" selected="">Order By</option>
                </select>
            </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="breadcome-heading ml-5">
                        <form role="search" class="sr-input-func">
                            <input type="text" wire:model = 'search' placeholder="Search..." class="search-int form-control">
                            <a href="#"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
        </div>
        <div class="row">
            <table class="table border ">
                <thead class="bg-primary">
                        <tr class="">
                            <th class="text-center">ID</th>
                            <th class="text-center">Customer</th>
                            <th class="text-center">Phone Number</th>
                            <th class="text-center">Delivery address</th>
                            <th class="text-center">Total payment</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Pay method</th>
                            <th class="text-center">Order Date</th>
                            <th class="text-center"></th>
                            <th class="text-center">Note</th>
                            <th></th>
                            <th colspan="1" class="text-center">Action</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                            <tr>
                                <td class="text-center">{{$order->id}}</td>
                                <td class="text-center">{{$order->order_users->name}}</td>
                                <td class="text-center">{{$order->order_users->phone_number}}</td>
                                <td class="text-center">{{$order->order_users->stress}}/{{App\Models\Commune::where('xaid',$order->order_users->commune_id)->first()->name}}/{{App\Models\District::where('maqh',$order->order_users->district_id)->first()->name}}/{{App\Models\Province::where('matp',$order->order_users->province_id)->first()->name}}</td>
                                <td class="text-center">{{number_format($order->total)}} VNĐ</td>
                                <td class="text-center">
                                @if ($order->status=='new orders')
                                    <button type="button" wire:click.prevent = 'status({{$order->id}})' class="btn btn-info">{{$order->status}}</button>
                                @elseif($order->status=='processing')
                                    <button type="button" wire:click.prevent = 'status({{$order->id}})' class="btn btn-primary">{{$order->status}}</button>
                                @elseif($order->status=='shipping')
                                    <button type="button" wire:click.prevent = 'status({{$order->id}})' class="btn btn-warning">{{$order->status}}</button>
                                @elseif($order->status=='delivered')
                                    <button type="button" wire:click.prevent = 'status({{$order->id}})' class="btn btn-success">{{$order->status}}</button>
                                @elseif($order->status=='Cancelled')
                                    <button type="button" class="btn btn-danger">{{$order->status}}</button>
                                @endif
                                </td>
                                <td class="text-center">{{$order->pay_method}}</td>
                                <td class="text-center">{{$order->created_at}}</td>
                                <td class="text-center"><a type="button" wire:click.prevent = 'detail({{$order->id}})' data-toggle="modal" data-target="#modalDetail" class="btn btn-primary">Detail</button></td>
                                <td><input class="form-control" type="text" name=""></td>
                                <td class=""> <button  title="Cancel" onclick="return confirm('Are you sure you want to delete the brand?')" wire:click.prevent='delete({{$order->id}})' class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                <td>
                                    <a name="" id="" class="btn btn-danger" href="{{route('admin.order.PDF',['id' => $order->id])}}" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
                                            <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z"/>
                                          </svg>
                                        Export PDF
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
        {{$orders->links()}}
    <!-- Modal Detail -->
    <div wire:ignore.self class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-info">
                            <h5 class="modal-title">Detail product</h5>
                                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div>
                            @if ($order_details)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($order_details as $order_detail)
                                    <tr>
                                        <td scope="row">{{App\Models\Product::find($order_detail->product_id)->name}}</td>
                                        <td><img width='60' height="60" src="{{asset('storage/'.App\Models\Product::find($order_detail->product_id)->image)}}"></td>
                                        <td>qty: {{$order_detail->quantity}}</td>
                                        <td>color: {{$order_detail->color}}</td>
                                        <td>price: {{number_format($order_detail->price)}} VNĐ</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<div dropzone="copy"></div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var imgs = document.querySelectorAll('img');
        Array.prototype.forEach.call(imgs, function(el, i) {
            if (el.tabIndex <= 0) el.tabIndex = 10000;
        });
    });

</script>


