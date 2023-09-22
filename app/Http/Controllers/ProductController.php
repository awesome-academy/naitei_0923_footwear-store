<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\CartDetail;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductInStock;
use App\Models\ProductMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            ->select([
                'products.name',
                'price',
                'products.id',
                'brand',
                'color',
                'media_link',
                'gender',
                'product_in_stocks.type',
            ])
            ->where('product_media.type', '=', config('app.media.bigImg'))
            ->groupByRaw('name, price, products.id, brand, color, media_link, gender, product_in_stocks.type')
            ->limit(config('app.homepage.productQuantity'))
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
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['product_uuid'] = Str::uuid()->toString();

        Product::create([
            'product_uuid' => $validatedData['product_uuid'],
            'brand' => $validatedData['brand'],
            'name' => $validatedData['name'],
        ]);

        $productId = Product::where('product_uuid', $validatedData['product_uuid'])->first()->id;

        if ($request->hasFile('big_image')) {
            $fileName = time() . uniqid() . '.' . $request->get('brand')
                . $request->get('name') . '.'
                . $request->file('big_image')->extension();
            $path = Storage::putFileAs('public/images/Product', $request->file('big_image'), $fileName);
            $imageUrl = 'storage/images/Product/' . $fileName;
            $validatedData['big_image'] = $imageUrl;
            ProductMedia::create([
                'product_id' => $productId,
                'type' => 'big image',
                'media_link' => $validatedData['big_image'],
            ]);
        }

        if ($request->hasFile('small_image')) {
            $images = $request->file('small_image');
            foreach ($images as $key => $image) {
                if ($image->isValid()) {
                    $destinationPath = storage_path('app/public/images/Product');
                    $extension = $image->getClientOriginalExtension();
                    $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileName =  'small_image' . $originalName . '-' . uniqid() . '.' . $extension;
                    $image->move($destinationPath, $fileName);

                    ProductMedia::create([
                        'product_id' => $productId,
                        'type' => 'small image',
                        'media_link' => 'storage/images/Product/' . $fileName,
                    ]);
                }
            }
        }

        return redirect()->route('product.create')->with('status', 'product-created');
    }

    /**
     * Display the product's detail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //get product
        $color = $request->query('color');
        $gender = $request->query('gender');
        $type = $request->query('type');
        $product = Product::with(['productInStocks', 'productMedias', 'users'])->find($id);
        $name = $product->name;
        $sizes = $product->productInStocks->pluck('size');
        $color = $product->productInStocks->where('color', $color)->pluck('color')->first();
        $gender = $product->productInStocks->where('gender', $gender)->pluck('gender')->first();
        $type =  $product->productInStocks->where('type', $type)->pluck('type')->first();
        $price = $product->productInStocks->pluck('price')->first();
        $imageQuery = $product->productMedias;
        $smallImages =  $imageQuery->where('type', config('app.media.smallImg'))->pluck('media_link');
        $suggestedProducts = ProductController::findSuggestedProduct($product);
        $isFavourite = false;
        if (Auth::check()) {
            if ($product->users->pluck('id')->contains(Auth::user()->id)) {
                $isFavourite = true;
            }
        }
        $comments = ProductController::getProductComments($id);
        $averagePoint = ProductController::getAveragePoint($comments);

        return view(
            'product.show',
            compact(
                'id',
                'name',
                'price',
                'sizes',
                'smallImages',
                'suggestedProducts',
                'color',
                'gender',
                'type',
                'isFavourite',
                'comments',
                'averagePoint',
            )
        );
    }

    /**
     * Display the product's detail for admin role.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function showAdmin(Product $product)
    {
        return view('product.showAdmin', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        $product->update([
            'brand' => $validatedData['brand'],
            'name' => $validatedData['name'],
        ]);

        if ($request->hasFile('big_image')) {
            ProductMedia::where('product_id', $product->id)->where('type', 'big image')->delete();

            $fileName = time() . uniqid() . '.' . $request->get('brand')
                . $request->get('name') . '.'
                . $request->file('big_image')->extension();
            $path = Storage::putFileAs('public/images/Product', $request->file('big_image'), $fileName);
            $imageUrl = 'storage/images/Product/' . $fileName;
            $validatedData['big_image'] = $imageUrl;
            ProductMedia::create([
                'product_id' => $product->id,
                'type' => 'big image',
                'media_link' => $validatedData['big_image'],
            ]);
        }

        if ($request->hasFile('small_image')) {
            ProductMedia::where('product_id', $product->id)->where('type', 'small image')->delete();

            $images = $request->file('small_image');
            foreach ($images as $key => $image) {
                if ($image->isValid()) {
                    $destinationPath = storage_path('app/public/images/Product');
                    $extension = $image->getClientOriginalExtension();
                    $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileName =  'small_image' . $originalName . '-' . uniqid() . '.' . $extension;
                    $image->move($destinationPath, $fileName);

                    ProductMedia::create([
                        'product_id' => $product->id,
                        'type' => 'small image',
                        'media_link' => 'storage/images/Product/' . $fileName,
                    ]);
                }
            }
        }

        return redirect()->route('product.edit', $product)->with('status', 'product-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->deleted_at !== null) {
            abort(403);
        }
        $product->deleted_at = now();
        $product->save();

        return redirect()->route('product.edit', $product)->with('status', 'product-deleted');
    }

    public function recreate(Product $product)
    {
        if ($product->deleted_at == null) {
            abort(403);
        }
        $product->deleted_at = null;
        $product->save();

        return redirect()->route('product.edit', $product)->with('status', 'product-recreated');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::join('product_in_stocks', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select([
                'products.name',
                'price',
                'products.id',
                'brand',
                'color',
                'media_link',
                'gender',
                'product_in_stocks.type',
            ])
            ->where('product_media.type', '=', config('app.media.bigImg'))
            ->where(function ($query) use ($keyword) {
                $query->orWhere('products.name', 'like', '%' . $keyword . '%')
                    ->orWhere('brand', 'like', '%' . $keyword . '%');
            })
            ->groupByRaw('name, price, products.id, brand, color, media_link, gender, product_in_stocks.type');

        if (!empty($request->price)) {
            $price = $request->price;

            $range = config('app.price_ranges.' . $price);

            if ($range['operator'] === '<') {
                $products->where('price', $range['operator'], $range['value']);
            } elseif ($range['operator'] === 'between') {
                $products->whereBetween('price', $range['values']);
            } elseif ($range['operator'] === '>') {
                $products->where('price', $range['operator'], $range['value']);
            }
        }
        if (!empty($request->size)) {
            $products->where('size', '=', $request->size);
        }
        if (!empty($request->color)) {
            $products->where('color', 'like', $request->color);
        }
        if (!empty($request->gender)) {
            $products->where('product_in_stocks.gender', 'like', $request->gender);
        }

        $products = $products->orderBy('product_in_stocks.price', 'DESC')->get();

        return view('product.search', compact('products', 'keyword'));
    }

    public function findSuggestedProduct($product)
    {
        $suggestedProducts = DB::table('products')
            ->join('product_in_stocks', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select([
                'products.name',
                'price',
                'products.id',
                'brand',
                'color',
                'media_link',
                'gender',
                'product_in_stocks.type',
            ])
            ->where('product_media.type', '=', config('app.media.bigImg'))
            ->where('brand', $product->brand)
            ->groupByRaw('name, price, products.id, brand, color, media_link, gender, product_in_stocks.type')
            ->limit(config('app.homepage.productQuantity'))
            ->get();

        return $suggestedProducts;
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $size = $request->size;
        $quantity = $request->quantity;
        $type = $request->query('type');
        $color = $request->query('color');
        $gender = $request->query('gender');
        $user_id = Auth::user()->id;
        $productInStocks = ProductInStock::where('product_id', $id)
            ->where('size', $size)
            ->where('color', $color)
            ->where('gender', $gender)
            ->where('type', $type)
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
        if ($cartItem->quantity === null) {
            if ($available < $quantity) {
                return back()->with([
                    'message' => __('messages.addToCart.outOfStocks', ['quantity' => $available]),
                    'status' => config('app.status.success'),
                ]);
            }
        } else {
            if ($productInStocks->quantity < $cartItem->quantity + $quantity) {
                return back()->with([
                    'message' => __('messages.addToCart.outOfStocks') . $available . ' products more',
                    'status' => config('app.status.success'),
                ]);
            }
            $available = $cartItem->quantity + $quantity;
        }
        $cartItem->quantity = $available;
        $cartItem->save();

        return back()->with([
            'message' => __('messages.addToCart.success'),
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
                $availableQuantity = $stocksQuantity -  $cartItem->quantity;
            } else {
                $availableQuantity = $totalQuantity;
            }
        }

        return $availableQuantity;
    }

    public function getProductComments(int $id)
    {
        $comments = DB::table('users')
            ->join('reviews', 'users.id', '=', 'reviews.user_id')
            ->select(['username', 'point', 'comment', 'reviews.created_at'])
            ->where('product_id', '=', $id)
            ->get();

        return $comments;
    }

    public function getAveragePoint($comments)
    {
        $totalPoint = 0;
        if ($comments->count() > 0) {
            foreach ($comments as $comment) {
                $totalPoint += $comment->point;
            }
            $totalPoint = ceil($totalPoint / $comments->count() / config('app.point'));
        }

        return $totalPoint;
    }
}
