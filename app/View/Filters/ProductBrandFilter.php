<?php

namespace App\View\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;
use App\Models\Product;

class ProductBrandFilter extends Filter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->where('brand', $value);
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): array
    {
        $brandArray = array();
        $productBrand = Product::select('brand')->distinct()->get();
        
        foreach ($productBrand as $product) {
            $brandArray[$product->brand] = $product->brand;
        }

        return $brandArray;
    }
}
