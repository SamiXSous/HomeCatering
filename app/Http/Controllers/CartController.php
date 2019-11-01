<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\CartProducts;

class CartController extends Controller
{
    //
    public function addProductToCart(Request $request)
    {
        $userId = Auth::id();
        $cateringId = $request->route('cateringId');
        $productId = $request->route('cartProductId');
        $date = $request->route('date');
        
        $cart = Cart::where('userId', $userId)
        ->where('date', '!=', $date)
        ->delete();

        $cart = Cart::firstOrCreate(['userId' => $userId, 'cateringId' => $cateringId] ,['date' => $date]);
        // var_dump($productId);
        CartProducts::firstOrCreate([
            'cartId' => $cart->id,
            'productId' => $productId,
            'amount' => 1
        ]);
        return back();
    }

}
