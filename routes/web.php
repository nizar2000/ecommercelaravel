
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommandeController;




 
Route::get('/', function () {
    return view('auth.login');
});
 
/*Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});*/
  
Route::middleware('auth','admin')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::middleware(['auth','admin'])->group(function () {
        Route::controller(ProductController::class)->prefix('products')->group(function () {
            Route::get('', 'index')->name('products');
            Route::get('create', 'create')->name('products.create');
            Route::post('store', 'store')->name('products.store');
            Route::get('show/{id}', 'show')->name('products.show');
            Route::get('edit/{id}', 'edit')->name('products.edit');
            Route::put('edit/{id}', 'update')->name('products.update');
            Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
            Route::post('search', 'search')->name('products.search');

        });
    
        Route::controller(CategorieController::class)->prefix('categorie')->group(function () {
            Route::get('', 'index')->name('categorie');
            Route::get('create', 'create')->name('categorie.create');
            Route::post('store', 'store')->name('categorie.store');
            Route::get('edit/{id}', 'edit')->name('categorie.edit');
            Route::put('edit/{id}', 'update')->name('categorie.update');
            Route::delete('destroy/{id}', 'destroy')->name('categorie.destroy');
            Route::post('search', 'search')->name('categorie.search');

        });
          
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::post('/updateProfile', [App\Http\Controllers\AuthController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/Dashboard', [App\Http\Controllers\AdminController::class, 'Dashboard'])->name('Dashboard');
    Route::get('/contact', [App\Http\Controllers\AdminController::class, 'contact'])->name('contact');
    Route::delete('/contact/destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('contact.destroy');

    Route::prefix('clients')->group(function () {
        Route::get('', [AdminController::class, 'index'])->name('clients.index');
        Route::get('block/{idUser}', [AdminController::class, 'Block'])->name('clients.block');
        Route::get('unblock/{idUser}', [AdminController::class, 'UnBlock'])->name('clients.unblock');

    });
    Route::prefix('commandes')->group(function () {
        Route::get('', [AdminController::class, 'commandes'])->name('commandes.index');

    });


});
  
});
Route::middleware(['auth'])->group(function () {

    // Client routes
    Route::prefix('client')->group(function () {
        Route::get('', [IndexController::class, 'index'])->name('client.index');
        Route::get('show/{id}', [IndexController::class, 'show'])->name('client.show');
        Route::get('about', [IndexController::class, 'about'])->name('client.about');
        Route::get('shop', [IndexController::class, 'shop'])->name('client.shop');
        Route::get('contact', [IndexController::class, 'contact'])->name('client.contact');
        Route::get('cart', [IndexController::class, 'cart'])->name('client.cart');

        
        // Search route
        Route::post('search', [IndexController::class, 'search'])->name('client.search');
    });
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

    // Example of a different route outside the prefix
    Route::get('/client/index', 'ClientController@Client');
    Route::get('/client/profile', [App\Http\Controllers\IndexController::class, 'profile'])->name('client.profile');
    Route::post('/client/updateProfile', [App\Http\Controllers\IndexController::class, 'updateProfile'])->name('client.updateProfile');


   Route::get('/categories/{categoryId}/products',[App\Http\Controllers\IndexController::class, 'productsByCategory'])->name('category.products');
   Route::post('/client/order/store', [App\Http\Controllers\CommandeController::class, 'store'])->name('order.store');
   Route::get('/client/lc/destroy/{idlc}', [App\Http\Controllers\CommandeController::class, 'destroy'])->name('lc.destroy');
   Route::post('/client/checkout', [App\Http\Controllers\IndexController::class, 'checkout'])->name('client.checkout');
   Route::get('/client/commandes', [App\Http\Controllers\IndexController::class, 'mescommandes'])->name('client.commmandes');


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



