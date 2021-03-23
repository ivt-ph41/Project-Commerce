<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
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
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderComponent;
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
Route::get('/text',Text::class)->name('text');
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/my-account',UserAccountComponent::class)->name('user.account');
    Route::get('/user/my-order',UserOrderComponent::class)->name('user.order');
});
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
        Route::get('/admin',AdminDashboardComponent::class)->name('admin.dashboard');
        Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.category');
});
Route::get('/',HomeConponent::class)->name('home');
Route::get('/product/cart',CartComponent::class)->name('product.cart')->middleware('cart');
Route::get('/product/shop',ShopComponent::class)->name('shop');
Route::get('/product/check-out',CheckoutComponent::class)->name('check-out');
Route::get('/product/contact',ContactComponent::class)->name('contact');
Route::get('/product/{slug}',DetailProductComponent::class)->name('product.detail');
Route::get('/category/{slug_cat}',CategoryComponent::class)->name('category.product');
Route::get('product/{slug_cat}/{slug_brand}',BrandComponent::class)->name('brand.product');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

