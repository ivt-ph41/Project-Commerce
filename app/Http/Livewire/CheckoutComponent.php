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
    public function ResetInput(){
        $this->discount = '';
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
    public function destroyAll(){
        Cart::destroy();
    }
    public  function checkout()
    {
        if(Cart::count()>0){
            if(empty(Auth::user()->phone_number) && empty(Auth::user()->province_id) && empty(Auth::user()->district_id) && empty(Auth::user()->commune_id) && empty(Auth::user()->stress)){
                $this->emit('info');
            }
            else{
                $discounts = Discount::with('discount_users')
                ->where('code',$this->discount)
                ->where('end_day','>',now())
                ->whereHas('discount_users' , function($query) {
                    return $query->where('status','enable')->where('user_id',Auth::user()->id);
                })->first();
                // if(!empty($discounts) && $discounts->end_day > now()){
                //     if(!empty($discounts->discount_users->first()->pivot->status)){
                //         if($discounts->discount_users->first()->pivot->status == 'enable')
                        if ($discounts){
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
                //     }else{
                //         $orders = Order::create([
                //             'user_id' => Auth::user()->id,
                //             'pay_method' => $this->payment_method,
                //             'total' => Cart::total(0,0,'')
                //         ]);
                //     }
                // }else{
                //     $orders = Order::create([
                //         'user_id' => Auth::user()->id,
                //         'pay_method' => $this->payment_method,
                //         'total' => Cart::total(0,0,'')
                //     ]);
                // }
                $orderDetails=[];
                foreach (Cart::content() as $key => $item) {
                    // OrderItem::create([
                        $orderDetails[$key]['order_id'] = $orders->id;
                        $orderDetails[$key]['product_id'] = $item->model->id;
                        $orderDetails[$key]['quantity'] = $item->qty;
                        $orderDetails[$key]['price'] = $item->subtotal;
                        $orderDetails[$key]['price'] = $item->subtotal;
                        $orderDetails[$key]['color'] = $item->options->color;
                        $orderDetails[$key]['created_at'] = now();
                        $orderDetails[$key]['updated_at'] = now();
                    // ]);
                    //Update quantity
                    Product::find($item->model->id)->decrement('quantity',$item->qty);
                };
                OrderItem::insert($orderDetails);
                $this->emit('thankyou');
                $this->destroyAll();
                // $this->ResetInput();
                if($discounts){
                    $discounts->discount_users()->updateExistingPivot(Auth::user()->id,['status'=>'disable']);
                }
            }
        }else{
            $this->emit('cart_empty');
        }
    }
    //Update Quantity
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
    //Delete Cart
    public function remove($rowId){
        Cart::remove($rowId);
    }
    public function render()
    {
        $provinces = Province::all();
        $districts = District::where('matp',$this->province)->get();
        $communes = Commune::where('maqh',$this->district)->get();
        $users = User::with('user_province','user_district','user_commune')->where('id',Auth::user()->id)->first();
        $discounts = Discount::with('discount_users')->where('code',$this->discount)
        ->where('end_day','>',now())
        ->whereHas('discount_users' , function($query) {
            return $query->where('status','enable')->where('user_id',Auth::user()->id);
        })->first();
        $popular_product = Product::orderBy('view','DESC')->paginate(12);
        //Set Shipping
        if($users->province_id!=0){
            if(!empty(User::where('id',Auth::user()->id)->whereBetween('province_id',[0,37])->first())){
                $shipping = 7;
            }elseif(!empty(User::where('id',Auth::user()->id)->whereBetween('province_id',[38,68])->first())){
                $shipping = 5;
            }elseif(!empty(User::where('id',Auth::user()->id)->whereBetween('province_id',[70,96])->first())){
                $shipping = 3;
            }
        }else{
            $shipping = 0;
        }
        return view('livewire.checkout',compact('users','provinces','districts','communes','discounts','popular_product','shipping'))->layout('layouts.base');;
    }
}
