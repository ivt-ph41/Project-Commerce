<?php

use App\Http\Controllers\LangController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AdminBrandComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminChatComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminUserComponent;
use App\Http\Livewire\Admin\AdminVoucherComponent;
use App\Http\Livewire\BrandComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailProductComponent;
use App\Http\Livewire\HomeConponent;
use App\Http\Livewire\SearchProductComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\Text;
use App\Http\Livewire\TopNewComponent;
use App\Http\Livewire\TopSaleComponent;
use App\Http\Livewire\User\UserAccountComponent;
use App\Http\Livewire\User\UserChatComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserListWishComponent;
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
    Route::get('/user/my-wishlist',UserListWishComponent::class)->name('user.my-wishlist');
});
Route::middleware(['auth:sanctum', 'verified','authadmin','locale'])->group(function(){
        Route::get('/admin',AdminDashboardComponent::class)->name('admin.dashboard');
        Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.category');
        Route::post('/admin/categories/EXCEL',[AdminCategoryComponent::class,'EXCEL'])->name('admin.category.EXCEL');
        Route::get('/admin/brands',AdminBrandComponent::class)->name('admin.brand');
        Route::get('/admin/products',AdminProductComponent::class)->name('admin.product');
        Route::get('/admin/users',AdminUserComponent::class)->name('admin.user');
        Route::get('/admin/users/PDF/{id}',[AdminUserComponent::class,'PDF'])->name('admin.user.PDF');
        Route::post('/admin/users/EXCEL',[AdminUserComponent::class,'EXCEL'])->name('admin.user.EXCEL');
        Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.order');
        Route::get('/admin/orders/PDF/{id}',[AdminOrderComponent::class,'PDF'])->name('admin.order.PDF');
        Route::get('/admin/chat',AdminChatComponent::class)->name('admin.chat');
        Route::get('/admin/vouchers',AdminVoucherComponent::class)->name('admin.voucher');
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', [LangController::class,'changeLanguage'])
        ->name('user.change-language');
    Route::get('/auto-search', [LangController::class,'autoSearch'])
        ->name('autoSearch');
    Route::get('/',HomeConponent::class)->name('home');
    Route::get('/product/cart',CartComponent::class)->name('product.cart')->middleware('cart');
    Route::get('/about-us',AboutComponent::class)->name('about-us');
    Route::get('/product/shop',ShopComponent::class)->name('shop');
    Route::get('/product/shop/top-sale',TopSaleComponent::class)->name('shop.topsale');
    Route::get('/product/shop/top-new',TopNewComponent::class)->name('shop.topnew');
    Route::get('/product/shop/search',SearchProductComponent::class)->name('product.search');
    Route::get('/product/contact',ContactComponent::class)->name('contact');
    Route::get('/product/{slug}',DetailProductComponent::class)->name('product.detail');
    Route::get('/category/{slug_cat}',CategoryComponent::class)->name('category.product');
    Route::get('product/{slug_cat}/{slug_brand}',BrandComponent::class)->name('brand.product');

});

