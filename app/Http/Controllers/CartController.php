<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Product;
use App\Models\ProductInStock;
use App\Models\ProductMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $cartItems = DB::table('cart_details')
            ->join('product_in_stocks', 'product_in_stocks.id', '=', 'cart_details.product_in_stocks_id')
            ->join('products', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select([
                'product_in_stocks.product_id',
                'products.name',
                'cart_details.quantity',
                'product_in_stocks.price',
                'product_media.media_link',
                'cart_details.id',
                'product_in_stocks.type',
                'color',
                'gender',
                'size',
            ])
            ->where('cart_details.user_id', '=', $user_id)
            ->where('product_media.type', '=', config('app.media.bigImg'))
            ->get();
        $subTotal = 0;
        foreach ($cartItems as $cartItem) {
            $subTotal += $cartItem->price * $cartItem->quantity;
        }

        return view('cart.index', compact('cartItems', 'subTotal'));
    }

    public function increaseQuantity(Request $request, $id)
    {
        $cartItem = CartDetail::with('productInStocks')->find($id);
        $quantity = $cartItem->quantity;
        $stocksQuantity = $cartItem->productInStocks->first()->quantity;
        if ($stocksQuantity < $quantity + 1) {
            return response()->json([
                'message' => __('messages.increaseCart.fail'),
                'status' => config('app.status.fail'),
            ]);
        }
        $cartItem->quantity = $quantity + 1;
        $cartItem->save();

        return response()->json([
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->productInStocks->pluck('price')->first(),
            'status' => config('app.status.success'),
        ]);
    }

    public function decreaseQuantity(Request $request, $id)
    {
        $cartItem = CartDetail::with('productInStocks')->find($id);
        $quantity = $cartItem->quantity;
        if ($quantity === 1) {
            return response()->json([
                'message' => __('messages.decreaseCart.fail'),
                'status' => config('app.status.fail'),
            ]);
        }
        $cartItem->quantity = $quantity - 1;
        $cartItem->save();

        return response()->json([
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->productInStocks->pluck('price')->first(),
            'status' => config('app.status.success'),
        ]);
    }
    /**
     * Delete an item from cart
     */
    public function destroy($id)
    {
        $cartItem = CartDetail::find($id);
        $cartItem->delete();

        return back()->with([
            'message' => __('messages.deleteCart.success'),
            'status' => config('app.status.success'),
        ]);
    }

    /**
     * Checkout and move to order view
     */
    public function checkout(Request $request)
    {
        return redirect()->route('order.index');
    }
}
