<?php

namespace App\View\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\BooleanFilter;

class StatusFilter extends BooleanFilter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param Array $value Associative array with the boolean value for each of the options
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value): Builder
    {
        if ($value['pending']) {
            $query->orWhere('status', config('app.bill_status.pending'));
        }
        if ($value['cancelled']) {
            $query->orWhere('status', config('app.bill_status.cancelled'));
        }
        if ($value['manual']) {
            $query->orWhere('status', config('app.bill_status.manual'));
        }
        if ($value['confirmed']) {
            $query->orWhere('status', config('app.bill_status.confirmed'));
        }
        if ($value['declined']) {
            $query->orWhere('status', config('app.bill_status.declined'));
        }
        if ($value['awating']) {
            $query->orWhere('status', config('app.bill_status.awating'));
        }
        if ($value['shipping']) {
            $query->orWhere('status', config('app.bill_status.shipping'));
        }
        if ($value['shipped']) {
            $query->orWhere('status', config('app.bill_status.shipped'));
        }
        if ($value['cant_ship']) {
            $query->orWhere('status', config('app.bill_status.cant_ship'));
        }
        if ($value['completed']) {
            $query->orWhere('status', config('app.bill_status.completed'));
        }

        return $query;
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): array
    {
        return [
            config('app.bill_status.pending') => 'pending',
            config('app.bill_status.cancelled') => 'cancelled',
            config('app.bill_status.manual') => 'manual',
            config('app.bill_status.confirmed') => 'confirmed',
            config('app.bill_status.declined') => 'declined',
            config('app.bill_status.awating') => 'awating',
            config('app.bill_status.shipping') => 'shipping',
            config('app.bill_status.shipped') => 'shipped',
            config('app.bill_status.cant_ship') => 'cant_ship',
            config('app.bill_status.completed') => 'completed',
        ];
    }
}
