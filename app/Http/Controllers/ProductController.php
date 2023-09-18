<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
            ->select(['products.name', 'price', 'products.id', 'brand','media_link'])
            ->get();
        $commeShoes = Product::join('product_in_stocks', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select(['products.name', 'price', 'products.id', 'brand','media_link'])
            ->where('brand', '=', 'Comme des Garcons')
            ->get();

        return view('home', [
            'products' => $products,
            'commeShoes' => $commeShoes,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
