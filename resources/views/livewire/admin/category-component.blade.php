
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
                                <li><span class="bread-blod">Category</span>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modelExcel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                                    <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                </svg>
                                Import Excel
                            </button>
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
                <select name="sort" wire:model.defer='sort' class="form-control">
                    <option value="default" selected="">Order By</option>
                    <option value="name">Name</option>
                    <option value="slug">Slug</option>
                    <option value="created_at">Create Day</option>
                    <option value="updated_at">Update Day</option>
                    <option value="status">Status</option>
                </select>
            </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="breadcome-heading ml-5">
                        <form role="search" class="sr-input-func">
                            <input type="text" wire:model.defer = 'search' placeholder="Search..." class="search-int form-control">
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
                            <th class="text-center">Image</th>
                            <th class="text-center">Slider Images</th>
                            <th class="text-center">Brands</th>
                            <th class="text-center">Status</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                            <tr>
                                <td class="text-center"><input type="checkbox" wire:model.defer = 'SelectDelete' value='{{$category->id}}' ></td>
                                <td class="text-center" scope="row">{{$category->id}}</td>
                                <td class="text-center">{{$category->name}}</td>
                                <td class="text-center"><img width="50" height="50" src="{{asset('storage/'.$category->image)}}" alt="{{$category->image}}"></td>
                                <td class="text-center">
                                    <div class="form-group">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Sliders
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                @foreach ($category->category_sliders as $category_slider)
                                                <a class="dropdown-item" href="#"><img src="{{asset('storage/'.$category_slider->images)}}" width="1170" height="240" alt="{{$category_slider->images}}"></a>
                                                @endforeach

                                            </div>
                                          </div>
                                    </div>
                                <td>
                                      <select class="form-control" name="" id="">
                                        @foreach ($category->cate_manus as $item)
                                            <option value="">{{$item->name}}</option>
                                        @endforeach
                                      </select>
                                </td>
                                <td class="text-center">
                                    @if ($category->status=='enable')
                                        <a name="" id="" wire:click.prevent='status({{$category->id}})' class="btn btn-success" href="#" role="button">{{$category->status}}</a>
                                    @else
                                        <a name="" id="" wire:click.prevent='status({{$category->id}})' class="btn btn-danger" href="#" role="button">{{$category->status}}</a>
                                    @endif
                                </td>
                                <td class="text-center"><button  title="Edit" wire:click.prevent = 'edit({{$category->id}})' data-toggle="modal" data-target="#modalEdit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                <td class=""> <button  title="Trash" onclick="return confirm('Are you sure you want to delete the category?')" wire:click.prevent='delete({{$category->id}})' class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                            </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
        {{$categories->links()}}
    </div>
    <!-- Modal Add -->
    <div wire:ignore.self class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-info">
                            <h5 class="modal-title">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div >
                            <form  action="" class="dropzone dz-clickable" id="image-upload"  method="post" wire:submit.prevent='store' enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="" class="text-muted">Name:</label>
                                <input type="text" name="name" wire:model.defer='name' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                @error('name')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Images:</label>
                                    <input type="file" name="file" wire:model.defer='file' id="file" class="form-control-file" placeholder="" aria-describedby="helpId">
                                    @error('file')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Slug</label>
                                    <input type="text" name="slug" wire:model.defer='slug' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('slug')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Category Sliders</label>
                                    <input type="file" name="file_banner" wire:model.defer='file_banner' multiple id="" class="form-control-file" placeholder="" aria-describedby="helpId">
                                    @error('file_banner')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Brand</label>
                                      <select class="form-control" wire:model.defer = 'brand' name="" id="" multiple>
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                      </select>
                                    @error('brand')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="" id="" class="btn btn-primary btn-block" type="submit" value="Create Product">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div wire:ignore.self class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-violet text-light">
                            <h5 class="modal-title text-dark" >Update Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form  action="" method="post" wire:submit.prevent='update' enctype="multipart/form-data" id="form1" runat="server">
                            <input id="my-input" type="hidden" wire:model.defer = 'ids' name="" value="">
                            <div class="form-group">
                              <label for="" class="text-muted">Name:</label>
                              <input type="text" name="name" wire:model.defer='name' id="" class="form-control" placeholder="" aria-describedby="helpId">
                              @error('name')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="text-muted">Images:</label>
                                <input type="file" name="file" wire:model.defer = 'file' id="imgInp" class="form-control-file" placeholder="" aria-describedby="helpId" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                <img id="pic" />
                                @error('file')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="text-muted">Slug</label>
                                <input type="text" name="slug" wire:model.defer='slug' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                @error('slug')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="text-muted">Category Sliders</label>
                                <input type="file" name="file_banner" wire:model.defer='file_banner' multiple id="" class="form-control-file" placeholder="" aria-describedby="helpId">
                                @error('file_banner')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="text-muted">Brand</label>
                                  <select class="form-control" wire:model.defer = 'brand' name="" id="" multiple>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                  </select>
                                @error('brand')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input name="" id="" class="btn btn-primary btn-block" type="submit" value="Edit Product">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Button trigger modal -->
  <div class="modal fade" id="modelExcel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.category.EXCEL')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <input  class="form-control" type="file" name="import_excel">
                    <button name="" id="" class="btn btn-success" href="{{route('admin.category.EXCEL')}}" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                            <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg>
                        Import Excel
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
