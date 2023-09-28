<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductInStock  $productInStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductInStock $productInStock)
    {
        //
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
