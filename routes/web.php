<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false]);

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/file-manager', function () {
        return view('backend.layouts.file-manager');
    })->name('file-manager');
    // Tà khoản
    Route::resource('users', 'UsersController');
    // Banner
    Route::resource('banner', 'BannerController');
    // Brand
    Route::resource('brand', 'BrandController');
    // Thông tin tài khoản
    Route::get('/profile', 'AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}', 'AdminController@profileUpdate')->name('profile-update');
    // Danh mục
    Route::resource('/category', 'CategoryController');
    // Sản phẩm
    Route::resource('/product', 'ProductController');
    // Ajax for sub category
    Route::post('/category/{id}/child', 'CategoryController@getChildByParent');
    // Loại bài viết
    Route::resource('/post-category', 'PostCategoryController');
    // Thẻ
    Route::resource('/post-tag', 'PostTagController');
    // Bài viết
    Route::resource('/post', 'PostController');
    // Liên hệ
    Route::resource('/message', 'MessageController');
    Route::get('/message/five', 'MessageController@messageFive')->name('messages.five');

    // Đơn hàng
    Route::resource('/order', 'OrderController');
    // Vận chuyển
    Route::resource('/shipping', 'ShippingController');

    // Nhà cung cấp
    Route::resource('/supplier', 'SupplierController');
    // Mã giảm giá
    Route::resource('/coupon', 'CouponController');
    // Cài đặt
    Route::get('settings', 'AdminController@settings')->name('settings');

    //Đơn hàng
    Route::get('order', 'DonHangController@order')->name('order.index');
    Route::get('/income', 'DonHangController@incomchat')->name('order.income');
    //About-us
    Route::resource('about-us', 'AboutUsController');
    Route::post('about-update', 'AboutUsController@update')->name('about-us.update');
    Route::post('setting/update', 'AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}', 'NotificationController@show')->name('admin.notification');
    Route::get('/notifications', 'NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}', 'NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
});


//Frontend Controller
Route::get('/', 'FrontendController@home')->name('home');
Route::get('products/{slug}', 'FrontendController@productDetail')->name('product-detail');
Route::get('productview/{id}', 'FrontendController@productDetail')->name('productview');
Route::get('/lien-he', 'FrontendController@contact')->name('contact');
Route::post('/lien-he', 'FrontendController@postContact')->name('post-contact');
Route::get('/cart', 'FrontendController@cart')->name('cart');
route::get('/cart-add/{id}', 'CartController@addCart')->name('add-to-cart');
Route::post('single-add-cart/{id}', 'CartController@SingleAddToCart')->name('single-add-cart');
Route::get('/cart-delete/{id}}', 'CartController@DeleteCart')->name('deleteCart');
Route::get('/update-cart/{id}', 'CartController@updateCart')->name('cart-update');
Route::get('checkout', 'FrontendController@checkout')->name('checkout');
Route::post('/checkout', 'CartController@postCheckout')->name('post-checkout');
Route::get('/blogs/{slug}', 'FrontendController@potsDetail')->name('blog-detail');
Route::get('/product-cat/{slug}', 'FrontendController@productCat')->name('product-cat');
Route::get('/product-subcat/{slug}', 'FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-grids', 'FrontendController@productsGrids')->name('product-grids');
Route::post('product-grids', 'FrontendController@productGridsFilter')->name('products-girds-filter');
Route::post('/product-lists', 'FrontendController@productListsFilter')->name('product-lists-filter');
Route::post('/product-list', 'FrontendController@productPriceSortBy')->name('product-lists-price');
Route::get('/product-list', 'FrontendController@productLists')->name('product-list');
Route::get('/collections', 'FrontendController@productGirdFilter')->name('product-filter');
Route::match(['get', 'post'], '/collections', 'FrontendController@productFilter')->name('product.filter');
// Route::match(['get','post'],'/collections',[FrontendController::class,'productFilter'])->name('shop.filter');
Route::get('/blogs', 'FrontendController@blog')->name('blog');
Route::post('product-search', 'FrontendController@productSearch')->name('product-search');
Route::post('product-list/collection', 'FrontendController@productListSortBy')->name('product-list-sort-by');
Route::get('/product-sub-cat/{slug}/{sub_slug}', 'FrontendController@productCateSubCat')->name('product-sub-cat');
Route::post('/product-collection', 'FrontendController@sizeSortBy')->name('product-size');
Route::get('/collections/khuyen-mai', 'FrontendController@productSales')->name('product-sales');
// Route::get('/account/login','FrontendController@login')->name('login');
// Route::get('/account/dang-ky','FrontendController@register')->name('register');