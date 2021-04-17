<?php

use Illuminate\Support\Facades\Auth;
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
//Frontend section

//authentication
//Route::get('user/login',[\App\Http\Controllers\Auth\LoginController::class,'userLogin'])->name('user.login');
//Route::get('user/register',[\App\Http\Controllers\Auth\LoginController::class,'userRegister'])->name('user.register');
//Route::post('user/login',[\App\Http\Controllers\Auth\LoginController::class,'loginSubmit'])->name('login.submit');
//Route::post('user/register',[\App\Http\Controllers\Auth\LoginController::class,'registerSubmit'])->name('register.submit');
//
//Route::get('user/logout',[\App\Http\Controllers\Auth\LoginController::class,'userLogout'])->name('user.logout');
//
Route::get('/clear', function() {
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cache Successfully  Cleared!";

});
Route::get('/link', function () {
Artisan::call('storage:link');
    return "Successfully linked";
});
Route::get('/',[\App\Http\Controllers\Frontend\IndexController::class,'home'])->name('home');

//Enquiry form
Route::get('enquiry',[\App\Http\Controllers\Frontend\IndexController::class,'enquiry'])->name('enquiry');
//Display the product through category
Route::get('product-category/{slug}',[\App\Http\Controllers\Frontend\IndexController::class,'dynamicCategory0'])->name('product.category.0');
//Display the products through subcategory
Route::get('product-category/{parent1}/{slug}',[\App\Http\Controllers\Frontend\IndexController::class,'dynamicCategory1'])->name('product.category.1');
Route::get('product-category/{parent2}/{parent1}/{slug}',[\App\Http\Controllers\Frontend\IndexController::class,'dynamicCategory2'])->name('product.category.2');
Route::get('product-category/{parent3}/{parent2}/{parent1}/{slug}',[\App\Http\Controllers\Frontend\IndexController::class, 'dynamicCategory3'])->name('product.category.3');
Route::get('product-category/{parent4}/{parent3}/{parent2}/{parent1}/{slug}',[\App\Http\Controllers\Frontend\IndexController::class, 'dynamicCategory4'])->name('product.category.4');
Route::get('product-category/{parent5}/{parent4}/{parent3}/{parent2}/{parent1}/{slug}',[\App\Http\Controllers\Frontend\IndexController::class, 'dynamicCategory5'])->name('product.category.5');
Route::get('product-category/{parent6}/{parent5}/{parent4}/{parent3}/{parent2}/{parent1}/{slug}',[\App\Http\Controllers\Frontend\IndexController::class, 'dynamicCategory6'])->name('product.category.6');

//Product detail
Route::get('product/{slug}/',[\App\Http\Controllers\Frontend\IndexController::class,'productDetail'])->name('product.detail');
Route::get('download-catalog-pdf/{id}/',[\App\Http\Controllers\Frontend\IndexController::class,'downloadCatalogPdf'])->name('catalog.download');
Route::get('/get-product-price/{id}',[\App\Http\Controllers\ProductController::class,'filterPriceWithSize']);


//Product Review
Route::post('product-review/{slug}',[\App\Http\Controllers\ProductReviewController::class,'productReview'])->name('product.review');

//Cart section
Route::get('cart',[\App\Http\Controllers\Frontend\CartController::class,'cart'])->name('cart');
Route::post('cart/store',[\App\Http\Controllers\Frontend\CartController::class,'cartStore'])->name('cart.store');
Route::post('cart/delete',[\App\Http\Controllers\Frontend\CartController::class,'cartDelete'])->name('cart.delete');
Route::post('cart/update',[\App\Http\Controllers\Frontend\CartController::class,'cartUpdate'])->name('cart.update');

//coupon section
Route::post('coupon/add',[\App\Http\Controllers\Frontend\CartController::class,'couponAdd'])->name('coupon.add');


//wishlist section
Route::get('wishlist',[\App\Http\Controllers\Frontend\WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/store',[\App\Http\Controllers\Frontend\WishlistController::class,'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart',[\App\Http\Controllers\Frontend\WishlistController::class,'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/delete',[\App\Http\Controllers\Frontend\WishlistController::class,'wishlistDelete'])->name('wishlist.delete');

//Checkout Section
Route::get('checkout',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout'])->name('checkout');
Route::post('checkout',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkoutStore'])->name('checkout.store');
Route::get('complete/{order}',[\App\Http\Controllers\Frontend\CheckoutController::class,'complete'])->name('complete');


//Shop section
Route::get('hot-offers',[\App\Http\Controllers\Frontend\IndexController::class,'hotOffer'])->name('hot.offer');
Route::post('product-filter',[\App\Http\Controllers\Frontend\IndexController::class,'hotProductFilter'])->name('hot.product.filter');
Route::post('product-filter/{slug}',[\App\Http\Controllers\Frontend\IndexController::class,'productFilter'])->name('product.filter');
Route::post('product-sub-filter/{slug}/{cat_slug}',[\App\Http\Controllers\Frontend\IndexController::class,'productSubFilter'])->name('product.subfilter');

//search product & autosearch product
Route::get('autosearch',[\App\Http\Controllers\Frontend\IndexController::class,'autoSearch'])->name('autosearch');
Route::get('search',[\App\Http\Controllers\Frontend\IndexController::class,'search'])->name('search');

//contact page
Route::get('contact-us',[\App\Http\Controllers\Frontend\IndexController::class,'contactUs'])->name('contact.us');
Route::post('contact-submit',[\App\Http\Controllers\Frontend\IndexController::class,'contactSubmit'])->name('contact.submit');

//about us
Route::get('about-us',[\App\Http\Controllers\Frontend\IndexController::class,'aboutUs'])->name('about.us');
Route::get('certification',[\App\Http\Controllers\Frontend\IndexController::class,'certification'])->name('certification');
Route::get('infrastructure',[\App\Http\Controllers\Frontend\IndexController::class,'infrastructure'])->name('infrastructure');
Route::get('company-profile',[\App\Http\Controllers\Frontend\IndexController::class,'companyProfile'])->name('company.profile');

//Compare
Route::get('compare',[\App\Http\Controllers\Frontend\CompareController::class,'index'])->name('compare');
Route::post('compare/store',[\App\Http\Controllers\Frontend\CompareController::class,'compareStore'])->name('compare.store');
Route::post('compare/move-to-cart',[\App\Http\Controllers\Frontend\CompareController::class,'moveToCart'])->name('compare.move.cart');
Route::post('compare/delete',[\App\Http\Controllers\Frontend\CompareController::class,'compareDelete'])->name('compare.delete');

//Blog part
Route::get('blog', [\App\Http\Controllers\Frontend\IndexController::class,'blog'])->name('blog');
Route::post('comment/{id}', [\App\Http\Controllers\Frontend\CommentController::class,'commentBlog'])->name('commentBlog');
Route::get('blogs/{url}',[\App\Http\Controllers\Frontend\IndexController::class,'blogDetail'])->name('blog.detail');

// Enquiry Form
Route::post('enquiry-category',[\App\Http\Controllers\EnquiryController::class,'enquiryCategoryForm'])->name('enquiry.category');
Route::post('enquiry-product',[\App\Http\Controllers\EnquiryController::class,'enquiryProductForm'])->name('enquiry.product');

//Endfrontend section
Auth::routes();

// Admin auth
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class,'login'])->name('admin.login.submit');
    Route::post('/logout',[\App\Http\Controllers\Auth\Admin\LoginController::class,'logout'])->name('admin.logout');
});

Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('admin');

    // Banner Section
    Route::resource('/banner',\App\Http\Controllers\BannerController::class);
    Route::post('banner_status',[\App\Http\Controllers\BannerController::class,'bannerStatus'])->name('banner.status');

    // Category Section
    Route::resource('/category',\App\Http\Controllers\CategoryController::class);
    Route::post('category_status',[\App\Http\Controllers\CategoryController::class,'categoryStatus'])->name('category.status');
    Route::post('/category/{id}/child',[\App\Http\Controllers\CategoryController::class,'getChildByParentID']);

    // Brand Section
    Route::resource('/brand',\App\Http\Controllers\BrandController::class);
    Route::post('brand_status',[\App\Http\Controllers\BrandController::class,'brandStatus'])->name('brand.status');

    // Product Section
    Route::resource('/product',\App\Http\Controllers\ProductController::class);
    Route::post('product_status',[\App\Http\Controllers\ProductController::class,'productStatus'])->name('product.status');
    Route::post('deals',[\App\Http\Controllers\ProductController::class,'todaysDeal'])->name('todays.deal');

    // Display section
    Route::resource('/display',\App\Http\Controllers\DisplayController::class);
    Route::post('display_status',[\App\Http\Controllers\DisplayController::class,'displayStatus'])->name('display.status');

    // Product Attribute section
    Route::post('product-attribute/{id}',[\App\Http\Controllers\ProductController::class,'addProductAttribute'])->name('product.attribute');
    Route::delete('product-attribute-delete/{id}',[\App\Http\Controllers\ProductController::class,'addProductAttributeDelete'])->name('product.attribute.destroy');
    // User Section
    Route::resource('/user',\App\Http\Controllers\UserController::class);
    Route::post('user_status',[\App\Http\Controllers\UserController::class,'userStatus'])->name('user.status');

    // Coupon Section
    Route::resource('/coupon',\App\Http\Controllers\CouponController::class);
    Route::post('coupon_status',[\App\Http\Controllers\CouponController::class,'couponStatus'])->name('coupon.status');

    // Shipping Section
    Route::resource('/shipping',\App\Http\Controllers\ShippingController::class);
    Route::post('shipping_status',[\App\Http\Controllers\ShippingController::class,'shippingStatus'])->name('shipping.status');

    // Order section
    Route::resource('/orders',\App\Http\Controllers\OrderController::class);
    Route::post('order-status',[\App\Http\Controllers\OrderController::class,'orderStatus'])->name('order.status');

    // Review Section
//    Route::resource('reviews',\App\Http\Controllers\ProductReviewController::class);
    Route::resource('reviews',\App\Http\Controllers\ReviewController::class);

    // Settings
    Route::get('/settings',[\App\Http\Controllers\Frontend\SettingController::class,'settings'])->name('settings');
    Route::patch('/settings/{id}',[\App\Http\Controllers\Frontend\SettingController::class,'settingsUpdate'])->name('settings.update');

    // Blogs
    Route::resource('blogs', 'App\Http\Controllers\BlogController');
    Route::get('enquiry', [\App\Http\Controllers\EnquiryController::class,'index'])->name('enquiry.index');
    Route::delete('enquiry-delete/{id}', [\App\Http\Controllers\EnquiryController::class,'destroy'])->name('enquiry.destroy');


    //comment management
    Route::resource('comments',\App\Http\Controllers\Frontend\CommentController::class);
});



//User Dashboard
Route::group(['prefix'=>'user','middleware'=>'auth'],function (){
    Route::get('/dashboard',[\App\Http\Controllers\Frontend\IndexController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/order',[\App\Http\Controllers\Frontend\IndexController::class,'userOrder'])->name('user.order');
    Route::get('/address',[\App\Http\Controllers\Frontend\IndexController::class,'userAddress'])->name('user.address');
    Route::get('/account-detail',[\App\Http\Controllers\Frontend\IndexController::class,'userAccount'])->name('user.account');

    Route::post('/billing/address/{id}',[\App\Http\Controllers\Frontend\IndexController::class,'billingAddress'])->name('billing.address');
    Route::post('/shipping/address/{id}',[\App\Http\Controllers\Frontend\IndexController::class,'shippingAddress'])->name('shipping.address');

    Route::post('/update/account/{id}',[\App\Http\Controllers\Frontend\IndexController::class,'updateAccount'])->name('update.account');

});
