<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Review;
use App\Models\ReplyReview;
use Egulias\EmailValidator\Warning\Comment;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
class DetailProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $slug;
    public $rating;
    public $comment;
    public $relpy_comment;
    public $quantity;

    public function mount($slug){
        $this->slug = $slug;
        $this->rating = 1;
        $this->quantity = 1;
    }
    public function up_quantity(){
        $this->quantity++;
    }
    public function down_quantity(){
        $this->quantity--;
    }
    public function ResetInput(){
        $this->comment = '';
        $this->relpy_comment ='';
    }
    public function updated($request){
        $this->validateOnly($request,[
            'relpy_comment' => 'required',
            'comment' => 'required',
        ],
        [
           'relpy_comment.required' => 'Vui lòng nhập phản hồi',
           'comment.required' => 'Vui lòng nhập đánh giá',
        ]
        );
    }
    public function review(){
        $this->validate([
            'comment' => 'required',
        ],
        [
           'comment.required' => 'Vui lòng nhập đánh giá',
        ]
        );
        $products = Product::where('slug',$this->slug)->first();
        Review::create([
            'user_id' => Auth::user()->id,
            'product_id' => $products->id,
            'rating' => $this->rating,
            'comment' => $this->comment
        ]);
        $this->ResetInput();
    }
    public function reply($id){
        $this->validate([
            'relpy_comment' => 'required',
        ],
        [
           'relpy_comment.required' => 'Vui lòng nhập phản hồi',
        ]
        );
        ReplyReview::create([
            'comment' => $this->relpy_comment,
            'review_id' => $id,
            'user' => Auth::user()->name,
        ]);
        $this->ResetInput();
    }
    public function render()
    {
        $products = Product::with('product_images','product_details')->where('slug',$this->slug)->first();
        $reviews = Review::with('review_users','review_product','reply_reviews')->where('product_id',$products->id)->orderBy('created_at','DESC')->paginate(5);
        $related_product = Product::where('category_id',$products->category_id)->whereBetween('regular_price',[$products->regular_price-500000,$products->regular_price+500000])->paginate(12);
        //Đếm view
        if (!Session::get($products->slug)) { //nếu chưa có session
            $product_view = Product::findOrFail($products->id);
            Session::put($products->slug, 'lala'); //set giá trị cho session
            $product_view->increment('view');
        }
        return view('livewire.detail-product-component',compact('products','related_product','reviews'))->layout('layouts.base');
    }
    public function storeCart($product_id,$product_name,$quantity,$product_price){
       if(Auth::check()){
            Cart::add($product_id,$product_name,$quantity,$product_price)->associate('App\Models\Product');
            $this->emit('cart');
       }else{
           return redirect()->route('login');
       }
   }
   public function storeBuy($product_id,$product_name,$quantity,$product_price){
    if(Auth::check()){
         Cart::add($product_id,$product_name,$quantity,$product_price)->associate('App\Models\Product');
         return redirect()->route('product.cart');
    }else{
        return redirect()->route('login');
    }
}
}
