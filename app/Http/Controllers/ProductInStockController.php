<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\AddProductInStockRequest;
use App\Http\Requests\Product\UpdateProductInStockRequest;
use App\Models\Product;
use App\Models\ProductInStock;
use Illuminate\Http\Request;

class ProductInStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   Product $product
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('productInStocks.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductInStockRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $product_id = $product->id;
        $size = $validatedData['size'];
        $type = $validatedData['type'];
        $color = $validatedData['color'];
        $gender = $validatedData['gender'];
        $price = $validatedData['price'];
        $quantity = $validatedData['quantity'];

        if (ProductInStock::where('product_id', $product_id)
                ->where('size', $size)
                ->where('type', $type)
                ->where('color', $color)
                ->where('gender', $gender)
                ->get()->count() != 0
        ) {
            return redirect()->route('productInStocks.create', $product)
                ->with('status', 'product-in-stock-already-created');
        }
        ProductInStock::unguard();
        ProductInStock::create([
            'product_id' => $product_id,
            'size' => $size,
            'type' => $type,
            'color' => $color,
            'gender' => $gender,
            'price' => $price,
            'quantity' => $quantity,
        ]);

        return redirect()->route('productInStocks.create', $product)->with('status', 'product-in-stock-created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductInStock  $productInStock
     * @return \Illuminate\Http\Response
     */
    public function show(ProductInStock $productInStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductInStock  $productInStock
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductInStock $productInStock)
    {
        return view('productInStocks.edit', compact('productInStock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductInStock  $productInStock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductInStockRequest $request, ProductInStock $productInStock)
    {
        $validatedData = $request->validated();
        $product_id = $productInStock->product->id;
        $size = $validatedData['size'];
        $type = $validatedData['type'];
        $color = $validatedData['color'];
        $gender = $validatedData['gender'];
        $price = $validatedData['price'];
        $quantity = $validatedData['quantity'];

        if (ProductInStock::where('product_id', $product_id)
                ->where('size', $size)
                ->where('type', $type)
                ->where('color', $color)
                ->where('gender', $gender)
                ->where('price', $price)
                ->where('quantity', $quantity)
                ->get()->count() != 0
        ) {
            return redirect()->route('productInStocks.edit', $productInStock)
                ->with('status', 'product-in-stock-already-in-stock');
        }
        ProductInStock::unguard();

        $productInStock->size = $size;
        $productInStock->type = $type;
        $productInStock->color = $color;
        $productInStock->gender = $gender;
        $productInStock->price = $price;
        $productInStock->quantity = $quantity;

        $productInStock->save();

        return redirect()->route('productInStocks.edit', $productInStock)->with('status', 'product-in-stock-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductInStock  $productInStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductInStock $productInStock)
    {
        $productInStock->delete();

        return back();
    }
}
