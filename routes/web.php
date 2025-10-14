<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Mail;


Route::get('/', function () {
    return view('auth.register');
});
Route::get('/product-details/{id}', [ProductController::class, 'show'])->name('product.details');

Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
Route::post('/order', [CartController::class, 'order'])->name('order');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/checkout/success/{order}', function (\App\Models\Orders $order) {
    $order->update(['status' => '1']);
    return view('checkout.success', compact('order'));
})->name('checkout.success');

Route::get('/checkout/cancel/{order}', function (\App\Models\Orders $order) {
    return view('checkout.cancel', compact('order'));
})->name('checkout.cancel');


Route::get('men', [ProductController::class, 'men'])->name('men');
Route::get('women', [ProductController::class, 'women'])->name('women');

Route::resource('products', ProductController::class);




Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');






Route::get('/about', function () {
    return view('about');
})->name('about');



Route::get('/contact', function () {
    return view('contact');
})->name('contact');



 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
  

Route::post('send-mail', [ContactController::class, 'send'])->name('send-email');
Route::get('emails/contact', function() {
     return view('emails.contact');
});