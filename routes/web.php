<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|----------------------------
| Public Controllers
|----------------------------
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;

/*
|----------------------------
| Admin Controllers
|----------------------------
*/
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController;



/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (Guest & User)
|--------------------------------------------------------------------------
| Landing page = katalog / showcase produk
*/

Route::get('/', [CatalogController::class, 'home'])->name('home');

/*
| Katalog Produk
*/
Route::get('/products', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/products/{slug}', [CatalogController::class, 'show'])->name('catalog.show');

/*
| Static Pages
*/
Route::view('/mockup', 'mockup');
Route::view('/tentang', 'tentang');

/*
|--------------------------------------------------------------------------
| ROUTE CADANGAN / EDUKASI (TIDAK DIPAKAI)
|--------------------------------------------------------------------------
*/

// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
// Route::get('/product/{slug}', [CatalogController::class, 'show'])->name('catalog.show');

// Route::get('/sapa/{nama}', fn ($nama) => "Halo, $nama!");
// Route::get('/kategori/{nama?}', fn ($nama = 'Semua') => "Kategori: $nama");
// Route::get('/produk/{id}', fn ($id) => "Produk ID: $id");

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/

Auth::routes();

/*
|--------------------------------------------------------------------------
| GOOGLE OAUTH
|--------------------------------------------------------------------------
| Harus di luar middleware guest
*/

Route::controller(GoogleController::class)->group(function () {
    Route::get('/auth/google', 'redirect')->name('auth.google');
    Route::get('/auth/google/callback', 'callback')->name('auth.google.callback');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    | User Dashboard (Bukan landing)
    */
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    /*
    | Cart
    */
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{productId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{productId}', [CartController::class, 'remove'])->name('cart.remove');

    /*
    | Checkout & Order
    */
    // Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    // Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    // Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    /*
    | Wishlist
    */
    // Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    /*
    | Profile
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.avatar.destroy');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/google/unlink', [ProfileController::class, 'unlinkGoogle'])
        ->name('profile.google.unlink');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // CRUD Produk
        Route::resource('products', AdminProductController::class);

          // CRUD Kategori
        Route::resource('categories', CategoryController::class); // <-- ganti di sini

        // Orders (sementara hanya index & show)
        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');

                    // CRUD Users
            Route::resource('users', UserController::class);

            // Reports
            Route::get('reports', [ReportController::class, 'index'])->name('reports.index');

});
