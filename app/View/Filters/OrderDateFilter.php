<?php

namespace App\View\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\DateFilter;

class OrderDateFilter extends DateFilter
{
    public $title =  "Order's date filter";

    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param Carbon $date Carbon instance with the date selected
     * @return Builder Query modified
     */
    public function apply(Builder $query, Carbon $date, $request): Builder
    {
        $this->title = __('Order date filter');
        return $query->whereDate('date', '=', $date);
    }
}
