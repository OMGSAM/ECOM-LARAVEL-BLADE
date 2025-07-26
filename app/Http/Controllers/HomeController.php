<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
 
    public function index()
    {
       $products = Product :: all();
         $cartTotal = \Cart::getTotal();
         $cartCount = \Cart::getContent()->count();
        $productIdsInCart = \Cart::getContent()->pluck('id')->toArray();

          // Récupère tous les IDs des produits dans le panier
    // $cart = Session::get('cart', []);
    // $productIdsInCart = array_keys($cart);


        return view('frontend.homepage', compact('products', 'cartTotal', 'cartCount','productIdsInCart'));
       
              


    }

    public function getProducts(){
        $products = Product::with('category')->get(['id','name', 'price','slug']);

        return response()->json([
            'status' => 200,
            'products' => $products
        ]);
    }
}
