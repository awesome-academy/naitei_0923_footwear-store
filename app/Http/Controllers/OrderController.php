<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\CartDetail;
use App\Models\ProductInStock;
use App\Models\User;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $cartDetail = new CartDetail();
        $cartItems = $cartDetail->getCartItems($user_id);
        $billTotal = 0;
        $orderItems = $cartItems->map(function ($item, $key) {
            $item->sub_total = $item->price * $item->quantity;
            return $item;
        });
        $billTotal = $orderItems->pluck('sub_total')->sum();
        $user = User::find($user_id);
        $address = $user->address;
        $name = $user->fullname;
        $shippingFee = OrderController::calculateShippingFee($billTotal, $address);
        $paymentMethods = config('app.payment');
        $totalPayment = OrderController::calculateTotalPayment($billTotal, $shippingFee);

        return view(
            'order.index',
            compact(
                'orderItems',
                'billTotal',
                'address',
                'name',
                'shippingFee',
                'paymentMethods',
                'totalPayment',
            ),
        );
    }

    public function indexAdmin()
    {
        return view('order.indexAdmin');
    }

    public function calculateShippingFee($billTotal, $address)
    {
        return $billTotal * config('app.shipping.fee.default'); // shipping fee = 50% bill
    }

    public function calculateTotalPayment($billTotal, $shippingFee)
    {
        return $billTotal + $shippingFee;
    }

    public function placeOrder(PlaceOrderRequest $request, $totalPayment)
    {
        $validated = $request->validated();
        $paymentMethod = $validated['payment_method'];
        $user = Auth::user();
        $bill = new Bill([
            'user_id' => $user->id,
            'payment_method' => $paymentMethod,
            'shipping_method' => config('app.shipping.default'),
            'address' => $user->address,
            'date' => date('Y-m-d', time()),
        ]);
        $bill->total = $totalPayment;
        $bill->status = config('app.bill_status.pending');
        $bill->save();
        $bill_id = Bill::where('user_id', $user->id)->get()->last()->id;
        $cartItems = CartDetail::with('productInStocks')->where('user_id', $user->id)->get();
        foreach ($cartItems as $cartItem) {
            $productInStock = ProductInStock::find($cartItem->product_in_stocks_id);
            $productInStock->quantity -= $cartItem->quantity;
            $productInStock->save();
            $billProduct = new BillProduct([
                'bill_id' => $bill_id,
                'product_in_stocks_id' => $cartItem->product_in_stocks_id,
                'quantity' => $cartItem->quantity,
            ]);
            $billProduct->price = $cartItem->productInStocks->first()->price;
            $billProduct->save();
            $cartItem->delete();
        }

        return redirect()->route('bill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function showAdmin(Bill $bill)
    {
        $bill = Bill::with([
            'user',
            'billProducts',
            'billProducts.productInStock',
            'billProducts.productInStock.product',
        ])->find($bill->id);

        return view('order.show', ['bill' => $bill]);
    }
}
