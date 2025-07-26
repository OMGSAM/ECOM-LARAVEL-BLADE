<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

public function destroy(Request $request)
{
    $id = $request->input('id');

    if (\Cart::get($id)) {
        \Cart::remove($id);
        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    return redirect()->back()->with('error', 'Item not found in cart.');
}

    

public function update(Request $request)
{
    $id = $request->input('id');
    $action = $request->input('action');

    $item = \Cart::get($id);

    if (!$item) {
        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    $quantity = $item->quantity;

    if ($action === 'increase') {
        $quantity += 1;
    } elseif ($action === 'decrease') {
        $quantity -= 1;
        if ($quantity < 1) {
            \Cart::remove($id);
            return redirect()->back()->with('success', 'Item removed from cart.');
        }
    }

    \Cart::update($id, [
        'quantity' => [
            'relative' => false,
            'value' => $quantity
        ]
    ]);

    return redirect()->back()->with('success', 'Cart updated.');
}




    public function store(Request $request) {
         
    $product = Product::findOrFail($request->product_id);
         
    \Cart::add([
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        

         
    ]);
return redirect(url('/'));
    // return response()->json(['status' => 200]);

    

}

// public function sidebarContent() {
//     $items = \Cart::getContent();
//     return view('partials.cart-sidebar', compact('items'));
// }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        $cartItems = \Cart::getContent();

 
 
        return view('frontend.cart.index', compact('cartItems'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request,$sessionKey = null)
    // {
    //     $product = Product::findOrFail($request->productId);

	// 	$item = [
	// 		'id' => md5($product->id),
	// 		'name' => $product->name,
	// 		'price' => $product->price,
	// 		'quantity' => isset($request->quantity) ? $request->quantity : 1,
	// 		'associatedModel' => $product,
	// 	];

    //     if ($sessionKey) {
    //         \Cart::add($item);
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Successfully Added to Cart !',
    //         ]);
    //     }else {
    //         $carts = \Cart::add($item);
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Successfully Added to Cart !',
    //         ]);
    //     }
        
		
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCart(Request $request)
    {
        $carts = \Cart::getContent();
        $cart_total = \Cart::getTotal();

        return response()->json([
            'status' => 200,
            'carts' => $carts,
            'cart_total' => $cart_total,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updmate(Request $request, $cart_id)
    {
        $cartUpdate = \Cart::update($cart_id,[
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity,
            ],
        ]);

        $carts = \Cart::getContent();
        $cart_total = \Cart::getTotal();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated Cart !',
            'carts' => $carts,
            'cart_total' => $cart_total,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destrroy($cart_id)
    {
        \Cart::remove($cart_id);
        $cart_total = \Cart::getTotal();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully deleted Cart !',
            'cart_total' => $cart_total,
        ]);
    }
}
