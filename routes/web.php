<?php

use App\Http\Controllers\LangController;
use App\Http\Livewire\Admin\AdminBrandComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminChatComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\BrandComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailProductComponent;
use App\Http\Livewire\HomeConponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\Text;
use App\Http\Livewire\User\UserAccountComponent;
use App\Http\Livewire\User\UserChatComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserMyVoucherComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserVoucherComponent;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth:sanctum', 'verified','locale'])->group(function(){
    Route::get('/user',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/my-account',UserAccountComponent::class)->name('user.account');
    Route::get('/user/my-order',UserOrderComponent::class)->name('user.order');
    Route::get('/user/check-out',CheckoutComponent::class)->name('check-out');
    Route::get('/user/voucher',UserVoucherComponent::class)->name('user.voucher');
    Route::get('/user/chat',UserChatComponent::class)->name('user.chat');
    Route::get('/user/my-voucher',UserMyVoucherComponent::class)->name('user.my-voucher');
});
Route::middleware(['auth:sanctum', 'verified','authadmin','locale'])->group(function(){
        Route::get('/admin',AdminDashboardComponent::class)->name('admin.dashboard');
        Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.category');
        Route::get('/admin/brands',AdminBrandComponent::class)->name('admin.brand');
        Route::get('/admin/products',AdminProductComponent::class)->name('admin.product');
        Route::get('/admin/chat',AdminChatComponent::class)->name('admin.chat');
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', [LangController::class,'changeLanguage'])
        ->name('user.change-language');
    Route::get('/',HomeConponent::class)->name('home');
    Route::get('/product/cart',CartComponent::class)->name('product.cart')->middleware('cart');
    Route::get('/product/shop',ShopComponent::class)->name('shop');
    Route::get('/product/contact',ContactComponent::class)->name('contact');
    Route::get('/product/{slug}',DetailProductComponent::class)->name('product.detail');
    Route::get('/category/{slug_cat}',CategoryComponent::class)->name('category.product');
    Route::get('product/{slug_cat}/{slug_brand}',BrandComponent::class)->name('brand.product');
});

