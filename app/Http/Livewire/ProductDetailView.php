<?php

namespace App\Http\Livewire;

use App\Models\Product;
use LaravelViews\Facades\UI;
use LaravelViews\Views\DetailView;

class ProductDetailView extends DetailView
{
    //config localization in resources/views/vendor/laravel-views/detail-view/detail-view.blade.php
    protected $modelClass = Product::class;

    public function heading($model)
    {
        return [
            __("Product: {$model->name}"),
            __("This is the details of {$model->name}"),
        ];
    }

    /**
     * @param $product Model instance
     * @return Array Array with all the detail data or the components
     */
    public function detail(Product $model)
    {
        $big_image = config('app.no_product_image');
        $product_media = $model->productMedias->where('type', 'big image')->first();
        if ($product_media != null) {
            $big_image = $product_media->media_link;
        }

        $small_images = __("This product don't have any detail images.");
        $small_product_media = $model->productMedias->where('type', 'small image');
        if ($small_product_media->count() != 0) {
            $small_images = UI::component('components.small-image', ['smallImages' => $small_product_media]);
        }

        $status = '';
        $product_in_stocks = '';
        if ($model->deleted_at) {
            $status = __("This product has been deleted. It's unavailable now.");
            $product_in_stocks = $status;
        } else {
            if ($model->productInStocks->count() === 0) {
                $status = __("This product is unavailable now. You can add product's quantity.");
                $product_in_stocks = $status;
            } else {
                $status = __("This product is out of stock. You can update product's quantity.");
                $product_in_stocks = $status;
                foreach ($model->productInStocks as $productInStock) {
                    if ($productInStock->quantity != 0) {
                        $status = __("This product is available.");
                        $product_in_stocks = UI::component(
                            'components.product-in-stock-table',
                            ['headers' => ['Size', 'Type', 'Color', 'Gender', 'Price', 'Quantity'],
                            'rows' => $model->productInStocks,]
                        );
                        break;
                    }
                }
            }
        }

        return [
            UI::attributes([
                'Name' => $model->name,
                'Brand' => $model->brand,
                'Product UUID' => $model->product_uuid,
                'Status' => $status,
                'Name' => $model->name,
                'Thumbnail image' => UI::component('vendor/laravel-views/components.img', ['src' => asset($big_image)]),
                'Detail image' => $small_images,
                'Product in stock' => $product_in_stocks,
            ]),
        ];
    }
}
