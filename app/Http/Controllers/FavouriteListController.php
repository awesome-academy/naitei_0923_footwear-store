<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavouriteListController extends Controller
{
    public function index()
    {
        $favouriteList = DB::table('favourite_list')
            ->join('products', 'favourite_list.product_id', '=', 'products.id')
            ->join('product_in_stocks', 'favourite_list.product_id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'favourite_list.product_id', '=', 'product_media.product_id')
            ->select([
                'favourite_list.product_id',
                'name',
                'product_media.media_link',
                'price',
                'product_in_stocks.type',
                'color',
                'gender',
            ])
            ->where('user_id', Auth::user()->id)
            ->where('product_media.type', 'big image')
            ->groupByRaw('name, price, favourite_list.product_id, color, media_link, gender, product_in_stocks.type')
            ->get();

        return view('favourite.index', compact('favouriteList'));
    }

    public function addToFavourite(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $id = $request->query('id');
        if ($product = Product::find($id)) {
            if ($user->products->pluck('id')->contains($id)) {
                $user->products()->detach($id);

                return back()->with([
                    'message' => __('messages.addToFavourite.removed'),
                    'status' => config('app.status.success'),
                ]);
            }
            $user->products()->attach($id);

            return back()->with([
                'message' => __('messages.addToFavourite.added'),
                'status' => config('app.status.success'),
            ]);
        }

        return back()->with([
            'message' => __('messages.addToFavourite.fail'),
            'status' => config('app.status.success'),
        ]);
    }
}
