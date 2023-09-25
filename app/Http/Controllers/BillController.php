<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        
        $bills = Bill::select('id', 'date', 'total', 'status')
            ->where('user_id', '=', $user_id)
            ->orderBy('date', 'DESC')
            ->get();

        return view('bill.index', compact('bills'));
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
        $billItems = DB::table('bill_products')
            ->join('product_in_stocks', 'product_in_stocks.id', '=', 'bill_products.product_in_stocks_id')
            ->join('products', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select([
                'product_in_stocks.product_id',
                'products.name',
                'bill_products.quantity',
                'product_in_stocks.price',
                'product_media.media_link',
                'bill_products.id',
            ])
            ->where('bill_products.bill_id', '=', $id)
            ->where('product_media.type', '=', config('app.media.bigImg'))
            ->get();
        $billInfo = Bill::select('total', 'date', 'payment_method', 'shipping_method', 'status', 'address')
            ->where('id', $id)
            ->first();
        return view('bill.show', compact('billItems', 'billInfo'));
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
