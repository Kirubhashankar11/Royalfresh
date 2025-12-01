<?php

require base_path('routes/api.php');

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\CartController;
use App\Http\Controllers\DeliveryTimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| FRONT PRODUCT PAGE
|--------------------------------------------------------------------------
*/
Route::get('/products', function () {
    $products = Product::all();
    return view('front.products', compact('products'));
});

/*
|--------------------------------------------------------------------------
| ADMIN (Protected Routes)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/deliveries', [DeliveryController::class, 'index'])
        ->name('deliveries.index');

    Route::post('/deliveries/{delivery}/mark-delivered',
        [DeliveryController::class, 'markDelivered'])
        ->name('deliveries.markDelivered');

    Route::post('/deliveries/{delivery}/mark-failed',
        [DeliveryController::class, 'markFailed'])
        ->name('deliveries.markFailed');
});

/*
|--------------------------------------------------------------------------
| MAIN SITE PAGES
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'));
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

/*
|--------------------------------------------------------------------------
| RESOURCE ROUTES
|--------------------------------------------------------------------------
*/
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('units', App\Http\Controllers\UnitController::class);
Route::resource('weights', App\Http\Controllers\WeightController::class);
Route::resource('products', ProductController::class);
Route::resource('variants', VariantController::class);
Route::resource('taxes', App\Http\Controllers\TaxController::class);
Route::resource('shipping-policies', App\Http\Controllers\ShippingPolicyController::class);

/*
|--------------------------------------------------------------------------
| PRODUCT & VARIANT EXTRAS
|--------------------------------------------------------------------------
*/
Route::get('/get-attributesValue/{attributeId}', [VariantController::class, 'attributesValue']);
Route::post('/get-variant-details', [VariantController::class, 'getVariantDetails']);
Route::get('/products/{id}/delete', [ProductController::class, 'delete']);
Route::get('/all-products', [HomeController::class, 'allProducts']);
Route::get('/filter-products', [ProductController::class, 'filter'])->name('filter.products');
Route::get('/single-product/{id}', [HomeController::class, 'single'])->name('single.product');

/*
|--------------------------------------------------------------------------
| SUBSCRIPTIONS & BAGS
|--------------------------------------------------------------------------
*/
Route::resource('bags', App\Http\Controllers\BagController::class);
Route::get('/baskets/{id}', [HomeController::class, 'allBaskets']);

Route::get('/subscription', [HomeController::class, 'subscriptionPage']);
Route::get('/milk-subscription', [HomeController::class, 'milkSubscription']);
Route::get('/yogurt-subscription', [HomeController::class, 'yogurtSubscription']);

Route::resource('locations', App\Http\Controllers\LocationController::class);
Route::resource('delivery-times', DeliveryTimeController::class);
Route::delete('/delivery-times/{id}', [DeliveryTimeController::class, 'destroy'])->name('delivery_times.destroy');

Route::resource('subscriptions-list', SubscriptionController::class);

Route::get('/get-price', [SubscriptionController::class, 'getPrice'])->name('get-price');
Route::get('/get-yogurt-price', [SubscriptionController::class, 'getYogurtPrice'])->name('get-yogurt-price');
Route::get('/get-city-slots/{city}', [SubscriptionController::class, 'getCityTimeSlots']);

/*
|--------------------------------------------------------------------------
| CART ROUTES (Laravel 12 Ready)
|--------------------------------------------------------------------------
*/
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

/*
|--------------------------------------------------------------------------
| CHECKOUT PAGE
|--------------------------------------------------------------------------
*/
Route::get('/checkout', fn() => view('front.checkout'))->name('checkout');
