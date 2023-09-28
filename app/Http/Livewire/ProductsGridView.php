<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\View\Actions\ShowProductAction;
use App\View\Actions\UpdateProductAction;
use App\View\Filters\DeletedProductFilter;
use App\View\Filters\ProductBrandFilter;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\GridView;

class ProductsGridView extends GridView
{

    public function sortableBy()
    {
        return [
            'Brand' => 'brand',
            'Name' => 'name',
        ];
    }

    /** For actions by item */
    protected function actionsByRow()
    {
        return [
            new UpdateProductAction,
            new ShowProductAction,
        ];
    }
    public $maxCols = 4;

    public $withBackground = true;

    public $searchBy = ['name', 'brand'];

    protected $paginate = 12;

    protected function filters()
    {
        return [
            new ProductBrandFilter,
            new DeletedProductFilter,
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
        $big_image = config('app.no_product_image');
        $product_media = $product->productMedias->where('type', 'big image')->first();
        if ($product_media != null) {
            $big_image = $product_media->media_link;
        }
        $description = '';
        if ($product->deleted_at) {
            $description = __("This product has been deleted. It's unavailable now.");
        } else {
            if ($product->productInStocks->count() === 0) {
                $description = __("This product is unavailable now. You can add product's quantity.");
            } else {
                $description = __("This product is out of stock. You can update product's quantity.");
                foreach ($product->productInStocks as $productInStock) {
                    if ($productInStock->quantity != 0) {
                        $description = __("This product is available.");
                        break;
                    }
                }
            }
        }
        return [
            'image' => asset($big_image),
            'brand' => $product->brand,
            'name' => $product->name,
            'description' => $description,
        ];
    }

    public function onCardClick(Product $product)
    {
        return redirect()->route('product.showAdmin', $product);
    }
}
