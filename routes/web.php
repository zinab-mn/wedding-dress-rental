<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\user\UserDashboardComponent;
use App\Http\Livewire\user\UserProfileComponent;
use App\Http\Livewire\user\UserEditProfileComponent;

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

Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/AboutUs', AboutUsComponent::class)->name('AboutUs');

Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
    Route::get('/user/edit',UserEditProfileComponent::class)->name('user.editprofile');
});
Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});
