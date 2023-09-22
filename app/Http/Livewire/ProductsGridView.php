<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\View\Filters\ProductBrandFilter;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\GridView;

class ProductsGridView extends GridView
{

    public $maxCols = 4;

    public $withBackground = true;

    public $searchBy = ['name', 'brand'];

    protected $paginate = 12;

    protected function filters()
    {
        return [
            new ProductBrandFilter,
        ];
    }

    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return Product::with('productMedias')->with('productInStocks');
    }

    /**
     * Sets the data to every card on the view
     *
     * @param $model Current model for each card
     */
    public function card($product)
    {
        $big_image = $product->productMedias->where('type', 'big image')->first()->media_link;
        
        if ($big_image === null) {
            $big_image = '';
        }
        return [
            'image' => $big_image,
            'brand' => $product->brand,
            'name' => $product->name,
        ];
    }

    public function onCardClick(Product $product)
    {
    }
}
