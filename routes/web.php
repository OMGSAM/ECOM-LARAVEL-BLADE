<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use App\Models\Product;
use App\Models\Order;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

Route::GET('foto/{y}', [HomeController::class, 'foto']);
Route::get('/blog',function(){
    return redirect(url('/'));
})->name('blog');

Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::resource('faktora',FactureController::class);
Route::get('/generate', [FactureController::class, 'generate'])->name('generate');
Route::get('/gg', [FactureController::class, 'gg'])->name('gg');


Route::get('/categories',function (){
    $products = Product::with('category')->get(['id','name', 'price','slug']);
         $cartTotal = \Cart::getTotal();
         $cartCount = \Cart::getContent()->count();

        return view('frontend.homepage', compact('products', 'cartTotal', 'cartCount'));
       

})->name('categories');



Route::get('/thank', function(){
        $cartTotal = \Cart::getTotal();
         $cartCount = \Cart::getContent()->count();
         return view ('thank',compact('cartTotal', 'cartCount'));
})->name('thank');


// Route::get('/thank',function(){
    
//     return $request->all();
    
    
// })->name('thank');

Route::view('/contact','welcome')->name('contact');


Route::post('/subscribe' , function (){
    return "u r subsriced freroo" ;
})->name('subscribe');



Route::get('/admin/clients' , function (){
    return "view clients index');" ;
})->name('admin.products.clients');


Route::get('/admin/orders' , function (){
$orders=Order::all();
    return view ('admin.orders.index',compact('orders')) ;

})->name('admin.orders.index');



Route::get('/dashboard', function () {
    return view('admin.Dashboard'); // ou ce que tu veux afficher
});

Route::post('/logout', function () {
 Auth::logout();
    Cart::destroy();

 return to_route('/');
})->name('logout');



 

 
Route::post('/search_product' ,function (Request $request) {
    

    $validated= $request->validate([
        'product'=>'required|min:2' ,
        
    ]);

    dd($validated);
});


Route::post('/sendEmail' , function (Request $request) {
    

    $validated= $request->validate([
        'name'=>'required|min:2' ,
        'email' =>'required',
        'message' => 'required|max:10'
    ]);
    
    // dump($validated);    
    // Mail::to('xoxixa9@gmail.com')->send(new ContactEmail($name, $email, $message));
   
return back()->with('success', 'Email envoyé avec succès !');
    
   

})->name('sendEmail');

Route::delete('/cart/remove', [CartController::class, 'destroy'])->name('cart.destroy');


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/tag/{slug?}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
Route::get('/product/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');


// react route
Route::get('products/{slug?}', [\App\Http\Controllers\ShopController::class, 'getProducts']);
Route::get('products', [\App\Http\Controllers\HomeController::class, 'getProducts']);

Route::get('product-detail/{product:slug}', [\App\Http\Controllers\ProductController::class, 'getProductDetail']);
Route::post('carts', [\App\Http\Controllers\CartController::class, 'store']);
Route::get('carts', [\App\Http\Controllers\CartController::class, 'showCart']);
Route::get('contact', [\App\Http\Controllers\BlogController::class, 'index'])->name('contact.index');
// ongkir
Route::get('api/provinces', [\App\Http\Controllers\OngkirController::class, 'getProvinces']);
Route::get('api/cities', [\App\Http\Controllers\OngkirController::class, 'cities']);
Route::get('api/shipping-cost', [\App\Http\Controllers\OngkirController::class, 'shippingCost']);
Route::post('api/set-shipping', [\App\Http\Controllers\OngkirController::class, 'setShipping']);
Route::post('api/checkout', [\App\Http\Controllers\OrderController::class, 'checkout']);
// get user login
Route::get('api/users', [\App\Http\Controllers\UserController::class, 'index']);
// ==========


Route::group(['middleware' => 'auth'], function() {

Route::post('/add-to-cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart-content', [CartController::class, 'sidebarContent']);
    Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');


Route::get('clear/cart', [OrderController::class, 'clearCart']);
    
    Route::get('/order/checkout', [\App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');

     Route::POST('/checkout', [\App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');

        
    Route::resource('/cart', \App\Http\Controllers\CartController::class)->except(['store', 'show']);

    Route::group(['middleware' => ['isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
       
        // categories
                Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);



        Route::post('categories/images', [\App\Http\Controllers\Admin\CategoryController::class,'storeImage'])->name('categories.storeImage');
    
        // tags
        Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
    
        // products
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::post('products/images', [\App\Http\Controllers\Admin\ProductController::class,'storeImage'])->name('products.storeImage');
    });
});




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
