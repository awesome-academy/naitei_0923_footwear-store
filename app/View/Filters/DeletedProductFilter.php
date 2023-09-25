<?php

namespace App\View\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class DeletedProductFilter extends Filter
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
        if ($value === 'deleted_at') {
            return $query->whereNotNull('deleted_at');
        } else {
            return $query->whereNull('deleted_at');
        }
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): array
    {
        return [
            'Deleted' => 'deleted_at',
            'Not deleted' => 'not_deleted_at',
        ];
    }
}
