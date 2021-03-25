<?php

namespace App\Http\Livewire;

use App\Models\Commune;
use App\Models\Discount;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $name;
    public $phone;
    public $province;
    public $district;
    public $commune;
    public $stress;
    public $payment_method;
    public $discount;
    public function mount(){
        $this->name = Auth::user()->name;
        $this->phone = Auth::user()->phone_number;
        $this->province = Auth::user()->province_id;
        $this->district = Auth::user()->district_id;
        $this->commune = Auth::user()->commune_id;
        $this->stress = Auth::user()->stress;
        $this->payment_method = 'Payment on delivery';
    }
    public function update(){
        $this->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'province' => 'required',
                'district' => 'required',
                'commune' => 'required',
                'stress' => 'required',
                'payment_method' => 'required'
            ]
        );
        $users = User::find(Auth::user()->id);
        $users->update([
            'name' => $this->name,
            'phone_number' => $this->phone,
            'province_id' => $this->province,
            'district_id' => $this->district,
            'commune_id' => $this->commune,
            'stress' => $this->stress,
            'pay_method' => $this->payment_method
        ]);
        $this->emit('modal');
    }
    public  function checkout()
    {
        if(Cart::count()>0){
            if(empty(Auth::user()->phone_number) && empty(Auth::user()->province_id) && empty(Auth::user()->district_id) && empty(Auth::user()->commune_id) && empty(Auth::user()->stress)){
                $this->emit('info');
            }
            else{
                $discounts = Discount::with('discount_users')->where('code',$this->discount)->first();
                if(!empty($discounts)){
                    if(!empty($discounts->discount_users->first()->id)){
                        if($discounts->discount_users->first()->id == Auth::user()->id){
                            if($discounts->type=='1'){
                                $orders = Order::create([
                                    'user_id' => Auth::user()->id,
                                    'pay_method' => $this->payment_method,
                                    'total' => Cart::total(0,0,'') - $discounts->reduced_price
                                ]);
                            }elseif(($discounts->type=='2')){
                                $orders = Order::create([
                                    'user_id' => Auth::user()->id,
                                    'pay_method' => $this->payment_method,
                                    'total' => Cart::total(0,0,'')*(100-$discounts->reduced_price)/100
                                ]);
                            }
                        }else{
                            $orders = Order::create([
                                'user_id' => Auth::user()->id,
                                'pay_method' => $this->payment_method,
                                'total' => Cart::total(0,0,'')
                            ]);
                        }
                    }else{
                        $orders = Order::create([
                            'user_id' => Auth::user()->id,
                            'pay_method' => $this->payment_method,
                            'total' => Cart::total(0,0,'')
                        ]);
                    }
                }else{
                    $orders = Order::create([
                        'user_id' => Auth::user()->id,
                        'pay_method' => $this->payment_method,
                        'total' => Cart::total(0,0,'')
                    ]);
                }
                foreach (Cart::content() as $item) {
                    OrderItem::create([
                        'order_id' => $orders->id,
                        'product_id' => $item->model->id,
                        'quantity' => $item->qty,
                        'price' => $item->subtotal,
                    ]);
                };
                $this->emit('thankyou');
                if(Discount::where('code',$this->discount)->first()){
                    Discount::where('code',$this->discount)->first()->discount_users()->detach(Auth::user()->id);
                }
            }
        }else{
            $this->emit('cart_empty');
        }
    }
    public function upQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function downQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function remove($rowId){
        Cart::remove($rowId);
    }
    public function render()
    {
        $provinces = Province::all();
        $districts = District::where('matp',$this->province)->get();
        $communes = Commune::where('maqh',$this->district)->get();
        $users = User::with('user_province','user_district','user_commune')->where('id',Auth::user()->id)->first();
        $discounts = Discount::with('discount_users')->where('code',$this->discount)->first();
        $popular_product = Product::orderBy('view','DESC')->paginate(12);
        return view('livewire.checkout',compact('users','provinces','districts','communes','discounts','popular_product'))->layout('layouts.base');;
    }
}
