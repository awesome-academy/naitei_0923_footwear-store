<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\View\Actions\OrderStatus\AwaitingAction;
use App\View\Actions\OrderStatus\CantShipAction;
use App\View\Actions\OrderStatus\CompletedAction;
use App\View\Actions\OrderStatus\ConfirmedAction;
use App\View\Actions\OrderStatus\DeclinedAction;
use App\View\Actions\OrderStatus\ManualAction;
use App\View\Actions\OrderStatus\ShippedAction;
use App\View\Actions\OrderStatus\ShippingAction;
use LaravelViews\Facades\UI;
use LaravelViews\Views\DetailView;

class OrderDetailView extends DetailView
{
    //config localization in resources/views/vendor/laravel-views/detail-view/detail-view.blade.php
    protected $modelClass = Bill::class;

    public function heading($model)
    {
        return [
            __("Order: {$model->id}"),
            __("Showing all the products in stock of {$model->id} order"),
        ];
    }

    /** For actions by item */
    protected function actions()
    {
        return [
            new ConfirmedAction,
            new DeclinedAction,
            new ManualAction,
            new AwaitingAction,
            new ShippingAction,
            new ShippedAction,
            new CantShipAction,
            new CompletedAction,
        ];
    }

    /**
     * @param $model Model instance
     * @return Array Array with all the detail data or the components
     */
    public function detail($model)
    {
        return [
            UI::attributes([
                __('ID') => $model->id,
                __('Username') => UI::link(
                    $model->user->fullname,
                    route('users.show', ['user' => $model->user->id])
                ),
                __('Total') => $model->total,
                __('Payment') => $model->payment_method,
                __('Shipping method') => $model->shipping_method,
                __('Status') => $model->status_tag,
                __('Address') => $model->address,
                __('Order date') => $model->date->format('Y-m-d'),
            ]),
        ];
    }
}
