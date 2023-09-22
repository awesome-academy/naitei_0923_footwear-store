<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\ProductInStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::join('product_in_stocks', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select(['products.name', 'price', 'products.id', 'brand', 'media_link'])
            ->where('product_media.type', '=', config('app.media.bigImg'))
            ->get();

        return view('home', [
            'products' => $products,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        return view('product.indexAdmin');
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
    public function store(Request $request)
    {
    }

    /**
     * Display the product's detail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get product
        $product = Product::with(['productInStocks', 'productMedias'])->find($id);
        $name = $product->name;
        $sizes = $product->productInStocks->pluck('size');
        $price = $product->productInStocks->pluck('price')->first();
        $imageQuery = $product->productMedias;
        $bigImage = $imageQuery->where('type', config('app.media.bigImg'))->pluck('media_link')->first();
        $smallImages =  $imageQuery->where('type', config('app.media.smallImg'))->pluck('media_link');
        $suggestedProducts = ProductController::findSuggestedProduct();

        return view(
            'product.show',
            compact('id', 'name', 'price', 'sizes', 'bigImage', 'smallImages', 'suggestedProducts')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::join('product_in_stocks', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select(['products.id', 'media_link', 'name', 'price'])
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('brand', 'like', '%' . $query . '%')
            ->get();

        return view('product.search', compact('products', 'query'));
    }

    public function findSuggestedProduct()
    {
        $suggestedProducts = DB::table('products')
            ->join('product_in_stocks', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select(['products.id', 'media_link', 'name', 'price'])
            ->where('product_media.type', '=', config('app.media.bigImg'))
            ->get();

        return $suggestedProducts;
    }

    public function addToCart(AddToCartRequest $request, $id)
    {
        $validated = $request->validated();
        $size = $validated['size'];
        $quantity = $validated['quantity'];
        $user_id = Auth::user()->id;
        $productInStocks = ProductInStock::where('product_id', $id)
            ->where('size', $size)
            ->get(['id', 'quantity'])
            ->first();

        $cartItem = CartDetail::firstOrNew([
            'user_id' => $user_id,
            'product_in_stocks_id' => $productInStocks->id,
        ]); //check if that item has been in cart
        $available = ProductController::calculateAvailableProductQuantity(
            $cartItem,
            $productInStocks->quantity,
            $quantity
        );
        $cartItem->quantity = $available;
        $cartItem->save();

        return back()->with([
            'message' => config('app.message.addToCart.success'),
            'status' => config('app.status.success'),
        ]);
    }

    /**
     * Calculate available quantity of product .
     *
     * @param  object  $cartItem
     * @param  int  $stocksQuantity
     * @param  int  $expectQuantity
     * @return \Illuminate\Http\Response
     */

    public function calculateAvailableProductQuantity($cartItem, int $stocksQuantity, int $expectQuantity): int
    {
        $availableQuantity = 0;
        if ($cartItem->quantity === null) {
            if ($stocksQuantity <= $expectQuantity) {
                $availableQuantity = $stocksQuantity;
            } else {
                $availableQuantity = $expectQuantity;
            }
        } else {
            $totalQuantity = $expectQuantity + $cartItem->quantity;
            if ($stocksQuantity <= $totalQuantity) {
                $availableQuantity = $stocksQuantity;
            } else {
                $availableQuantity = $totalQuantity;
            }
        }

        return $availableQuantity;
    }
}
