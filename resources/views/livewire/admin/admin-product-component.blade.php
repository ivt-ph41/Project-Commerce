
<div class="tab-contents">
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
                                <li><span class="bread-blod">product</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="button-ap-list responsive-btn">
                    <div class="btn-group btn-custom-groups btn-custom-groups-one btn-mg-b-10">
                        <button type="button"  data-toggle="modal" data-target="#modalAdd" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                                <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            Create new</button>
                        <button type="button"  onclick=" return confirm('Surely you want to log out!')" wire:click.prevent = 'deleteAll' class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-x" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                            Delete selections</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <select name="sort" wire:model='sort' class="form-control">
                    <option value="default" selected="">Order By</option>
                    <option value="name">Name</option>
                    <option value="price_up">Price Up</option>
                    <option value="price_down">Price Down</option>
                    <option value="view">View</option>
                    <option value="created_at">Create Day</option>
                    <option value="updated_at">Update Day</option>
                    <option value="status">Status</option>
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
                            <th></th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Images</th>
                            <th class="text-center">Orgin Price</th>
                            <th class="text-center">Sale Price</th>
                            <th class="text-center">Status</th>
                            <th></th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                            <tr>
                                <td><input class="form-control" type="hidden" wire:model = 'id_dt' name=""></td>
                                <td class="text-center"><input type="checkbox" wire:model = 'SelectDelete' value='{{$product->id}}' ></td>
                                <td class="text-center" scope="row">{{$product->id}}</td>
                                <td class="text-center">{{$product->name}}</td>
                                <td class="text-center"><img class="products" width="50" height="50" src="{{asset('storage/'.$product->image)}}" alt="{{$product->image}}"></td>
                                <td class="text-center">{{number_format($product->origin_price)}}</td>
                                <td class="text-center">{{number_format($product->regular_price)}}</td>
                                <td class="text-center">
                                    @if ($product->stock_status=='instock')
                                        <a name="" id="" wire:click.prevent='status({{$product->id}})' class="btn btn-success" href="#" role="button">{{$product->stock_status}}</a>
                                    @else
                                        <a name="" id="" wire:click.prevent='status({{$product->id}})' class="btn btn-danger" href="#" role="button">{{$product->stock_status}}</a>
                                    @endif
                                </td>
                                <td class="text-center"><a type="button" wire:click.prevent = 'detail({{$product->id}})' data-toggle="modal" data-target="#modalDetail" class="btn btn-primary">Detail</button></td>
                                <td class="text-center"><button  title="Edit" wire:click.prevent = 'edit({{$product->id}})' data-toggle="modal" data-target="#modalEdit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                <td class=""> <button  title="Trash" onclick="return confirm('Are you sure you want to delete the product?')" wire:click.prevent='delete({{$product->id}})' class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                            </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
        {{$products->links()}}
    </div>
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
                            @if ($product_details)
                            <ul class="list-group">
                                <li class="list-group-item"><b>Name: </b>{{$product_details->name}}</li>
                                <li class="list-group-item"><b>Image: </b><img src="{{asset('storage/'.$product_details->image)}}" width='100' height="100"></li>
                                <li class="list-group-item"><b>Slug: </b>{{$product_details->slug}}</li>
                                @if ($product_details->product_categories)
                                <li class="list-group-item"><a href="{{route('admin.category')}}"><b>Category: </b>{{$product_details->product_categories->name}}</a></li>
                                @endif
                                @if ($product_details->product_brands)
                                <li class="list-group-item"><b>Brand: </b>{{$product_details->product_brands->name}}</li>
                                @endif
                                <li class="list-group-item"><b>Origin Price: </b>{{$product_details->origin_price}}</li>
                                <li class="list-group-item"><b>Sale Percent: </b>{{$product_details->sale_percent}}</li>
                                <li class="list-group-item"><b>Sale price: </b>{{$product_details->regular_price}}</li>
                                <li class="list-group-item"><b>Short Description: </b>{{$product_details->short_description}}</li>
                                <li class="list-group-item"><b>Description: </b>{{$product_details->description}}</li>
                                <li class="list-group-item"><b>SKU: </b>{{$product_details->SKU}}</li>
                                <li class="list-group-item"><b>Status: </b>{{$product_details->stock_status}}</li>
                                <li class="list-group-item"><b>Quantity: </b>{{$product_details->quantity}}</li>
                                <li class="list-group-item"><b>View: </b>{{$product_details->view}}</li>
                                <li class="list-group-item"><b>Origin: </b>{{$product_details->origin}}</li>
                                <li class="list-group-item"><b>Weight: </b>{{$product_details->weight}}</li>
                                <li class="list-group-item"><b>Dimension: </b>{{$product_details->Dimension}}</li>
                                <li class="list-group-item"><b>Ram: </b>{{$product_details->ram}}</li>
                                <li class="list-group-item"><b>Battery capacity: </b>{{$product_details->battery_capacity}}</li>
                                <li class="list-group-item"><b>Color: </b>{{$product_details->color}}</li>
                                <li class="list-group-item"><b>Network_connect: </b>{{$product_details->network_connect}}</li>
                                <li class="list-group-item"><b>Operating system: </b>{{$product_details->operating_system}}</li>
                                <li class="list-group-item"><b>Date created: </b>{{$product_details->created_at}}</li>
                                <li class="list-group-item"><b>Update day: </b>{{$product_details->updated_at}}</li>
                            </ul>
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
      <!-- Modal Add -->
      <div wire:ignore.self   class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-info">
                            <h5 class="modal-title">Create product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div >
                            <form  action="" class="dropzone dz-clickable" id="image-upload"  method="post" wire:submit.prevent='store' enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label for="" class="text-muted">Name:</label>
                                        <input type="text" name="name" wire:model='name' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                        @error('name')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Images:</label>
                                            <div class="file-upload-inner ts-forms">
                                                <div class="input prepend-big-btn">
                                                    <label class="icon-right" for="prepend-big-btn">
                                                            <i class="fa fa-download"></i>
                                                        </label>
                                                    <div class="file-button">
                                                        Browse
                                                        <input type="file" wire:model='file' accept="image/*" onchange="loadFile(event)">
                                                    </div>
                                                    <input type="text" id="prepend-big-btn" placeholder="">
                                                </div>
                                                <img id="output"/>
                                            </div>
                                            @error('file')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Detailed image:</label>
                                            <div class="file-upload-inner ts-forms">
                                                <div class="input prepend-big-btn">
                                                    <label class="icon-right" for="prepend-big-btn">
                                                            <i class="fa fa-download"></i>
                                                        </label>
                                                    <div class="file-button">
                                                        Browse
                                                        <input type="file" wire:model='detail_image' onchange="document.getElementById('prepend-big-btn').value = this.value;" multiple>
                                                    </div>
                                                    <input type="text" id="prepend-big-btn" placeholder="">
                                                </div>
                                            </div>
                                            @error('detail_image')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">SKU</label>
                                            <input type="text" name="sku" wire:model='sku' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('sku')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Quantity</label>
                                            <input type="number" name="quantity" wire:model='quantity' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('quantity')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Short Desciption</label>
                                            <input type="text" name="short_description" wire:model='short_description' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('short_description')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Desciption</label>
                                              <textarea class="form-control" name="short_description" wire:model='description' id="" rows="3"></textarea>
                                            @error('description')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="" class="text-muted">Orgin Price:</label>
                                            <input type="number" name="origin_price" wire:model='origin_price' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('origin_price')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Sale Percent:</label>
                                                <input type="number" name="sale_percent" wire:model='sale_percent' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                @error('sale_percent')
                                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Category</label>
                                                <select class="form-control" wire:model = 'category_id' name="category_id" id="">
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @if(isset($category_id))
                                            <div class="form-group">
                                                <label for="" class="text-muted">Brand</label>
                                                <select class="form-control" wire:model = 'manufacturer_id' name="manufacturer_id" id="">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="" class="text-muted">Color:</label>
                                                <select class="form-control" wire:model = 'color' name="color" id="">
                                                    <option value="">Select Color</option>
                                                    <option value="Red">Red</option>
                                                    <option value="Yellow">Yellow</option>
                                                    <option value="Black">Black</option>
                                                    <option value="White">White</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Pink">Pink</option>
                                            </select>
                                                @error('color')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">origin:</label>
                                                <input type="text" name="origin" wire:model='origin' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                @error('origin')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Weight:</label>
                                                <input type="number" name="weight" wire:model='weight' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                @error('weight')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Dimension:</label>
                                                <input type="text" name="Dimension" wire:model='Dimension' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                @error('Dimension')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Ram</label>
                                                <select class="form-control" wire:model = 'ram' name="ram" id="">
                                                        <option value="">Select Ram</option>
                                                        <option value="1">1Gb</option>
                                                        <option value="2">2Gb</option>
                                                        <option value="3">3Gb</option>
                                                        <option value="4">4Gb</option>
                                                        <option value="5">5Gb</option>
                                                        <option value="6">6Gb</option>
                                                        <option value="6">8Gb</option>
                                                        <option value="6">16Gb</option>
                                                        <option value="6">32Gb</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Operating system:</label>
                                                <select class="form-control" wire:model = 'operating_system' name="operating_system" id="">
                                                        <option value="">Select OS</option>
                                                        <option value="Android">Android</option>
                                                        <option value="Blackberry OS">Blackberry OS</option>
                                                        <option value="iOS">iOS</option>
                                                        <option value="Windows Phone">Windows Phone</option>
                                                        <option value="Windows">Windows</option>
                                                        <option value="Mac OS">Mac OS</option>
                                                        <option value="Linux">Linux</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Network connect</label>
                                                <select class="form-control" wire:model = 'network_connect' name="operating_system" id="">
                                                    <option value="">Select Network connect</option>
                                                    <option value="Bluetooth">Bluetooth</option>
                                                    <option value="4G">4G</option>
                                                    <option value="5G">5G</option>
                                                    <option value="Wifi">Wifi</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Battery capacity</label>
                                                <select class="form-control" wire:model = 'battery_capacity' name="battery_capacity" id="">
                                                    <option value="">Select Battery capacity</option>
                                                    <option value="1000">1000 mah</option>
                                                    <option value="2000">2000 mah</option>
                                                    <option value="3000">3000 mah</option>
                                                    <option value="4000">4000 mah</option>
                                                    <option value="5000">5000 mah</option>
                                                    <option value="6000">6000 mah</option>
                                            </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="" id="" class="btn btn-primary btn-block" type="submit" value="Create Product">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- Modal Edit -->
    <div wire:ignore.self class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-violet">
                            <h5 class="modal-title text-light">Update product</h5>
                                <button type="button" class="close" id="Edit_close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div >
                            <form  action="" class="dropzone dz-clickable" id="image-upload"  method="post" wire:submit.prevent='update' enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input id="my-input" type="hidden" wire:model = 'ids' name="" value="">
                                        <div class="form-group">
                                        <label for="" class="text-muted">Name:</label>
                                        <input type="text" name="name" wire:model='name' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                        @error('name')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Images:</label>
                                            <div class="file-upload-inner ts-forms">
                                                <div class="input prepend-big-btn">
                                                    <label class="icon-right" for="prepend-big-btn">
                                                            <i class="fa fa-download"></i>
                                                        </label>
                                                    <div class="file-button">
                                                        Browse
                                                        <input type="file" wire:model='file' onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                    </div>
                                                    <input type="text" id="prepend-big-btn" placeholder="">
                                                </div>
                                            </div>
                                            @error('file')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Detailed image:</label>
                                            <div class="file-upload-inner ts-forms">
                                                <div class="input prepend-big-btn">
                                                    <label class="icon-right" for="prepend-big-btn">
                                                            <i class="fa fa-download"></i>
                                                        </label>
                                                    <div class="file-button">
                                                        Browse
                                                        <input type="file" wire:model='detail_image' onchange="document.getElementById('prepend-big-btn').value = this.value;" multiple>
                                                    </div>
                                                    <input type="text" id="prepend-big-btn" placeholder="">
                                                </div>
                                            </div>
                                            @error('detail_image')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Slug</label>
                                            <input type="text" name="slug" wire:model='slug' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('slug')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">SKU</label>
                                            <input type="text" name="sku" wire:model='sku' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('sku')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Quantity</label>
                                            <input type="number" name="quantity" wire:model='quantity' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('quantity')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Short Desciption</label>
                                            <input type="text" name="short_description" wire:model='short_description' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('short_description')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-muted">Desciption</label>
                                              <textarea class="form-control" name="short_description" wire:model='description' id="" rows="3"></textarea>
                                            @error('description')
                                            <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="" class="text-muted">Orgin Price:</label>
                                            <input type="number" name="origin_price" wire:model='origin_price' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            @error('origin_price')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Sale Percent:</label>
                                                <input type="number" name="sale_percent" wire:model='sale_percent' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                @error('sale_percent')
                                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="" class="text-muted">Category-{{$name}}</label>
                                                <select class="form-control" wire:model = 'category_id' name="category_id" id="">
                                                    <option value="" disable>Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}" {{ $category->id == $category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @isset($category_id)
                                            <div class="form-group">
                                                <label for="" class="text-muted">Brand</label>
                                                <select class="form-control" wire:model = 'manufacturer_id' name="manufacturer_id" id="">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @endisset
                                            <div class="form-group">
                                                <label for="" class="text-muted">Color:</label>
                                                <select class="form-control" wire:model = 'color' name="color" id="">
                                                    <option value="">Select Color</option>
                                                    <option value="Red">Red</option>
                                                    <option value="Yellow">Yellow</option>
                                                    <option value="Black">Black</option>
                                                    <option value="White">White</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Pink">Pink</option>
                                            </select>
                                                @error('color')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">origin:</label>
                                                <input type="text" name="origin" wire:model='origin' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                @error('origin')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Weight:</label>
                                                <input type="number" name="weight" wire:model='weight' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                @error('weight')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Dimension:</label>
                                                <input type="text" name="Dimension" wire:model='Dimension' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                @error('Dimension')
                                                <small id="helpId" class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="" class="text-muted">Ram</label>
                                                <select class="form-control" wire:model = 'ram' name="ram" id="">
                                                        <option value="">Select Ram</option>
                                                        <option value="1">1Gb</option>
                                                        <option value="2">2Gb</option>
                                                        <option value="3">3Gb</option>
                                                        <option value="4">4Gb</option>
                                                        <option value="5">5Gb</option>
                                                        <option value="6">6Gb</option>
                                                        <option value="6">8Gb</option>
                                                        <option value="6">16Gb</option>
                                                        <option value="6">32Gb</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Operating system:</label>
                                                <select class="form-control" wire:model = 'operating_system' name="operating_system" id="">
                                                        <option value="">Select OS</option>
                                                        <option value="Android">Android</option>
                                                        <option value="Blackberry OS">Blackberry OS</option>
                                                        <option value="iOS">iOS</option>
                                                        <option value="Windows Phone">Windows Phone</option>
                                                        <option value="Windows">Windows</option>
                                                        <option value="Mac OS">Mac OS</option>
                                                        <option value="Linux">Linux</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Network connect</label>
                                                <select class="form-control" wire:model = 'network_connect' name="operating_system" id="">
                                                    <option value="">Select Network connect</option>
                                                    <option value="Bluetooth">Bluetooth</option>
                                                    <option value="4G">4G</option>
                                                    <option value="5G">5G</option>
                                                    <option value="Wifi">Wifi</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-muted">Battery capacity</label>
                                                <select class="form-control" wire:model = 'battery_capacity' name="battery_capacity" id="">
                                                    <option value="">Select Battery capacity</option>
                                                    <option value="1000">1000 mah</option>
                                                    <option value="2000">2000 mah</option>
                                                    <option value="3000">3000 mah</option>
                                                    <option value="4000">4000 mah</option>
                                                    <option value="5000">5000 mah</option>
                                                    <option value="6000">6000 mah</option>
                                            </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="" id="" class="btn btn-primary btn-block" type="submit" value="Edit Product">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var imgs = document.querySelectorAll('img');
        Array.prototype.forEach.call(imgs, function(el, i) {
            if (el.tabIndex <= 0) el.tabIndex = 10000;
        });
    });
</script>

