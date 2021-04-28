
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
                                <li><span class="bread-blod">User</span>
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

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <select name="sort" wire:model='sort' class="form-control">
                    <option value="default" selected="">Order By</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="type">Type</option>
                    <option value="phone_number">Phone number</option>
                    <option value="created_at">Create Day</option>
                    <option value="updated_at">Update Day</option>
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Address Email</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Phone Number</th>
                            <th></th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{$user->id}}</td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">{{$user->utype}}</td>
                                <td class="text-center">{{$user->phone_number}}</td>
                                <td class="text-center"><a type="button" wire:click.prevent = 'detail({{$user->id}})' data-toggle="modal" data-target="#modalDetail" class="btn btn-primary">Detail</button></td>
                                @if ($user->utype == 'ADM')
                                <td class="text-center"><button disable title="Edit" wire:click.prevent = 'edit({{$user->id}})' data-toggle="modal" data-target="#modalEdit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                @else
                                <td class="text-center"><button disable title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                @endif
                                <td class=""> <button  title="Trash" onclick="return confirm('Are you sure you want to delete the brand?')" wire:click.prevent='delete({{$user->id}})' class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                <td>
                                    <a name="" id="" class="btn btn-danger" href="{{route('admin.user.PDF',['id'=>$user->id])}}" role="button">
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
        {{$users->links()}}
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
                            @if ($user_details)
                            <ul class="list-group">
                                <li class="list-group-item"><b>Name:</b>{{$user_details->name}}</li>
                                <li class="list-group-item"><b>Email:</b>{{$user_details->email}}</li>
                                <li class="list-group-item"><b>Type:</b>{{$user_details->utype}}</li>
                                <li class="list-group-item"><b>Phone Number:</b>{{$user_details->phone_number}}</li>
                                <li class="list-group-item"><b>Birth day:</b>{{$user_details->birth_day}}</li>
                                @if (isset($user_details->user_commune) && isset($user_details->user_district) && isset($user_details->user_province))
                                <li class="list-group-item"><b>Address:</b>{{$user_details->stress}}/{{$user_details->user_commune->name}}/{{$user_details->user_district->name}}/{{$user_details->user_province->name}}</li>
                                @endif
                                <li class="list-group-item"><b>Create day:</b>{{$user_details->created_at}}</li>
                                <li class="list-group-item"><b>Update day:</b>{{$user_details->created_at}}</li>
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
    </div>
    <!-- Modal Add -->
    <div wire:ignore.self class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-info">
                            <h5 class="modal-title">Create Admin</h5>
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
                                    <label for="" class="text-muted">Email</label>
                                    <input type="email" name="email" wire:model.defer='email' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('email')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Password</label>
                                    <input type="password" name="password" wire:model.defer='password' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('password')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Phone Number</label>
                                    <input type="text" name="phone_number" wire:model.defer='phone_number' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('phone_number')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Birth day</label>
                                    <input type="date" name="birth_day" wire:model.defer='birth_day' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('birth_day')
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
                                    <label for="" class="text-muted">Email</label>
                                    <input type="email" name="email" wire:model.defer='email' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('email')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Password</label>
                                    <input type="password" name="password" wire:model.defer='password' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('password')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Phone Number</label>
                                    <input type="text" name="phone_number" wire:model.defer='phone_number' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('phone_number')
                                    <small id="helpId" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-muted">Birth day</label>
                                    <input type="date" name="birth_day" wire:model.defer='birth_day' id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('birth_day')
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
    <!-- Import Excel -->
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
                    <form action="{{route('admin.user.EXCEL')}}" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <input  class="form-control" type="file" name="import_excel">
                        <button name="" id="" class="btn btn-success" type="submit"  role="button">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>

