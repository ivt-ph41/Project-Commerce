
<main id="main" class="main-site">

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
                <div class="col-lg-7 text-muted">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Account Information</h3>
                        <form action="#" wire:submit.prevent = 'update' method="get" name="frm-billing">
                            <p class="row-in-form">
                                <label for="fname">full name<span>*</span></label>
                                <input id="fname" wire:model = 'name' type="text" name="fname" class="form-control" value="" placeholder="Your name">
                            </p>
                            <p class="row-in-form">
                                <label for="lname">Email Addreess<span>*</span></label>
                                <input id="lname" wire:model = 'email' type="email" name="lname" class="form-control" value="" placeholder="Your last name">
                            </p>
                            <p class="row-in-form">
                                <label for="email">Birth day</label>
                                <input id="email" wire:model = 'birthday' type="date" class="form-control"  name="email" value="" placeholder="Type your email">
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input id="phone" wire:model = 'phone' type="number" name="phone" class="form-control" value="" placeholder="10 digits format">
                            </p>
                            <div class="form-group w-50">
                                <label for="my-select">Province/city</label>
                                <select id="my-select"  wire:model='province' class="form-control" name="" >
                                    @foreach ($provinces as $province)
                                        <option value="{{$province->matp}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label for="my-select">District</label>
                                <select id="my-select" wire:model='district' class="form-control" name="">
                                    @foreach ($districts as $district)
                                        <option value="{{$district->maqh}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label for="my-select">Commune</label>
                                <select id="my-select" wire:model='commune' class="form-control" name="">
                                    @foreach ($communes as $commune)
                                        <option value="{{$commune->xaid}}">{{$commune->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                              <label for="">Stress</label>
                              <input type="text" wire:model='stress' name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="create-account" id="create-account" value="forever" type="checkbox">
                                    <span>Create an account?</span>
                                </label>
                                <label class="checkbox-field">
                                    <input name="different-add" id="different-add" value="forever" type="checkbox">
                                    <span>Ship to a different address?</span>
                                </label>
                            </p>
                            <div class="form-group">
                                <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('Commerce\assets\images\icon\user2.png')}}" alt="User">
                        <div class="card-body">
                            <h4 class="card-title text-dark">{{$users->name}}</h4>
                            <p class="card-text text-muted">{{$users->email}}</p>
                            <p class="card-text text-muted">{{$users->phone_number}}</p>
                            <p class="card-text text-muted">{{$users->birth_day}}</p>
                            <p class="card-text text-muted">{{$users->stress}}</p>
                                @if (isset($users->user_province) && isset($users->user_district) && isset($users->user_commune))
                                <p class="card-text text-muted"> {{$users->user_province->name}}/{{$users->user_district->name}}/{{$users->user_commune->name}}</p>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
