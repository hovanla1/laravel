<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\backend\ConfigController;

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\ContactController;

use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\LienheController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\DonHangController;


use App\Http\Middleware\LoginAdminMiddelware;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', [SiteController::class, 'index'])->name('frontend.home');
// Xử lý contact
Route::get('lien-he', [LienheController::class, 'getcontact'])->name('frontend.contact');
Route::post('post-lien-he', [LienheController::class, 'postcontact'])->name('postcontact');

//Xử lý login user
Route::get('dang-nhap', [LoginController::class, 'getdangnhap'])->name('getdangnhap'); //link cố định( ví dụ)
Route::post('dang-nhap', [LoginController::class, 'postdangnhap'])->name('postdangnhap'); //link cố định( ví dụ)
Route::get('dang-xuat', [LoginController::class, 'dangxuat'])->name('dangxuat'); //link cố định( ví dụ)

//Xử lý register
Route::get('register', [LoginController::class, 'register'])->name('register'); //link cố định( ví dụ)
Route::post('register', [LoginController::class, 'postregister'])->name('postregister'); //link cố định( ví dụ)
Route::get('profile', [LoginController::class, 'profile'])->name('profile'); //link cố định( ví dụ)
Route::post('profile', [LoginController::class, 'postprofile'])->name('postprofile'); //link cố định( ví dụ)


//Xử lý login admin
Route::get('admin/login', [AuthController::class, 'getlogin'])->name('admin.getlogin'); //link cố định( ví dụ)
Route::post('admin/login', [AuthController::class, 'postlogin'])->name('admin.postlogin'); //link cố định( ví dụ)

//khai bao route cho quan ly
Route::prefix('admin')->middleware('LoginAdmin')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout'); //link cố định( ví dụ)
    route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard'); //name dung de goi o view

    //config
    // Route::get('config', ConfigController::class, 'getconfig');
    Route::get('config', [ConfigController::class, 'getconfig'])->name('getconfig'); //link cố định( ví dụ)
    Route::post('config', [ConfigController::class, 'postconfig'])->name('postconfig'); //link cố định( ví dụ)
    

    //category
    Route::resource('category', CategoryController::class);
    route::get('category_trash', [CategoryController::class, 'trash'])->name('category.trash');
    route::prefix('category')->group(function () {
        route::get('status/{category}', [CategoryController::class, 'status'])->name('category.status');
        route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //brand
    Route::resource('brand', BrandController::class);
    route::get('brand_trash', [BrandController::class, 'trash'])->name('brand.trash');
    route::prefix('brand')->group(function () {
        route::get('status/{brand}', [BrandController::class, 'status'])->name('brand.status');
        route::get('delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
        route::get('restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
        route::get('destroy/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });

    //topic
    Route::resource('topic', TopicController::class);
    route::get('topic_trash', [TopicController::class, 'trash'])->name('topic.trash');
    route::prefix('topic')->group(function () {
        route::get('status/{topic}', [TopicController::class, 'status'])->name('topic.status');
        route::get('delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
        route::get('restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
        route::get('destroy/{topic}', [TopicController::class, 'destroy'])->name('topic.destroy');
    });

    //post
    Route::resource('post', PostController::class);
    route::get('post_trash', [PostController::class, 'trash'])->name('post.trash');
    route::prefix('post')->group(function () {
        route::get('status/{post}', [PostController::class, 'status'])->name('post.status');
        route::get('delete/{post}', [PostController::class, 'delete'])->name('post.delete');
        route::get('restore/{post}', [PostController::class, 'restore'])->name('post.restore');
        route::get('destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    });

    //page
    Route::resource('page', PageController::class);
    route::get('page_trash', [PageController::class, 'trash'])->name('page.trash');
    route::prefix('page')->group(function () {
        route::get('status/{page}', [PageController::class, 'status'])->name('page.status');
        route::get('delete/{page}', [PageController::class, 'delete'])->name('page.delete');
        route::get('restore/{page}', [PageController::class, 'restore'])->name('page.restore');
        route::get('destroy/{page}', [PageController::class, 'destroy'])->name('page.destroy');
    });

    //menu
    Route::resource('menu', MenuController::class);
    route::get('menu_trash', [MenuController::class, 'trash'])->name('menu.trash');
    route::prefix('menu')->group(function () {
        route::get('status/{menu}', [MenuController::class, 'status'])->name('menu.status');
        route::get('delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
        route::get('restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
        route::get('destroy/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });

    //slider
    Route::resource('slider', SliderController::class);
    route::get('slider_trash', [SliderController::class, 'trash'])->name('slider.trash');
    route::prefix('slider')->group(function () {
        route::get('status/{slider}', [SliderController::class, 'status'])->name('slider.status');
        route::get('delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');
        route::get('restore/{slider}', [SliderController::class, 'restore'])->name('slider.restore');
        route::get('destroy/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });

    //product
    Route::resource('product', ProductController::class);
    route::get('product_trash', [ProductController::class, 'trash'])->name('product.trash');
    route::prefix('product')->group(function () {
        route::get('status/{product}', [ProductController::class, 'status'])->name('product.status');
        route::get('delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        route::get('restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
        route::get('destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    //order
    Route::resource('order', OrderController::class);
    route::get('order_trash', [OrderController::class, 'trash'])->name('order.trash');
    route::get('order_new', [OrderController::class, 'list_new'])->name('order.new');
    route::get('order_xacnhan', [OrderController::class, 'list_xacnhan'])->name('order.listxacnhan');

    route::prefix('order')->group(function () {
        //hủy đơn
        route::get('delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
        //xóa đơn hàng khỏi DB
        route::get('destroy/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
        //Xác nhận
        route::get('xacnhan/{order}', [OrderController::class, 'xacnhan'])->name('order.xacnhan');
        //chuẩn bị
        route::get('chuanbi/{order}', [OrderController::class, 'chuanbi'])->name('order.chuanbi');
        //giao hàng
        route::get('giaohang/{order}', [OrderController::class, 'giaohang'])->name('order.giaohang');
        //giao hàng thành công
        route::get('ghtc/{order}', [OrderController::class, 'ghtc'])->name('order.ghtc');
        //giao hàng thất bại
        route::get('ghtb/{order}', [OrderController::class, 'ghtb'])->name('order.ghtb');
    });

    //user
    Route::resource('user', UserController::class);
    route::get('user_trash', [UserController::class, 'trash'])->name('user.trash');
    route::prefix('user')->group(function () {
        route::get('status/{user}', [UserController::class, 'status'])->name('user.status');
        route::get('delete/{user}', [UserController::class, 'delete'])->name('user.delete');
        route::get('restore/{user}', [UserController::class, 'restore'])->name('user.restore');
        route::get('destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    //customer
    Route::resource('customer', CustomerController::class);
    route::get('customer_trash', [CustomerController::class, 'trash'])->name('customer.trash');
    route::prefix('customer')->group(function () {
        route::get('status/{customer}', [CustomerController::class, 'status'])->name('customer.status');
        route::get('delete/{customer}', [CustomerController::class, 'delete'])->name('customer.delete');
        route::get('restore/{customer}', [CustomerController::class, 'restore'])->name('customer.restore');
        route::get('destroy/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });
    //contact
    Route::resource('contact', ContactController::class);
    route::get('contact_trash', [ContactController::class, 'trash'])->name('contact.trash');
    route::get('no_reply', [ContactController::class, 'noreply'])->name('contact.noreply');

    route::prefix('contact')->group(function () {
        // route::get('status/{contact}', [ContactController::class, 'status'])->name('contact.status');
        route::get('delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');
        route::get('restore/{contact}', [ContactController::class, 'restore'])->name('contact.restore');
        route::get('destroy/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    });
});

//Xử lý giỏ hàng
route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('frontend.cart');
    route::get('add/{id}', [CartController::class, 'add'])->name('cart.add');
    route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');
    route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
    route::post('update-all', [CartController::class, 'updateall'])->name('cart.updateall');
    route::get('mua-ngay/{id}', [CartController::class, 'buy_now'])->name('buynow');
});


//Xử lý đặt hàng
route::prefix('checkout')->middleware('LoginCustomer')->group(function () {
    Route::get('/', [CheckoutController::class, 'form'])->name('checkout');
    route::post('/', [CheckoutController::class, 'submit_form'])->name('checkout');
    // Route::get('checkout-success', [CheckoutController::class, 'checkout_success'])->name('checkout.success'); //link cố định( ví dụ)
});
//Xử lý đơn hàng
route::prefix('donhang')->middleware('LoginCustomer')->group(function () {
    Route::get('/', [DonHangController::class, 'index'])->name('donhang.list'); //link cố định( ví dụ)
    Route::get('huy/{order}', [DonHangController::class, 'huy'])->name('donhang.huy'); //link cố định( ví dụ)
    Route::get('chitiet/{order}', [DonHangController::class, 'chitiet'])->name('donhang.chitiet'); //link cố định( ví dụ)

});


Route::get('product', [SiteController::class, 'product'])->name('product.home');
Route::get('search', [SearchController::class, 'index'])->name('search.home');
Route::get('{slug}', [SiteController::class, 'index'])->name('slug.home');
