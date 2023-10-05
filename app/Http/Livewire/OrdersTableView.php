<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\View\Actions\OrderStatus\Bulk\AwaitingAction;
use App\View\Actions\OrderStatus\Bulk\CantShipAction;
use App\View\Actions\OrderStatus\Bulk\CompletedAction;
use App\View\Actions\OrderStatus\Bulk\ConfirmedAction;
use App\View\Actions\OrderStatus\Bulk\DeclinedAction;
use App\View\Actions\OrderStatus\Bulk\ManualAction;
use App\View\Actions\OrderStatus\Bulk\ShippedAction;
use App\View\Actions\OrderStatus\Bulk\ShippingAction;
use App\View\Actions\ViewOrderDetailAction;
use App\View\Filters\OrderDateFilter;
use App\View\Filters\StatusFilter;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\TableView;

class OrdersTableView extends TableView
{
    //config localization in resources/views/vendor/laravel-views/detail-view/detail-view.blade.php
    /** For actions by item */
    protected function actionsByRow()
    {
        return [
            new ViewOrderDetailAction,
        ];
    }

    /** For bulk actions */
    protected function bulkActions()
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

    protected function filters()
    {
        return [
            new OrderDateFilter,
            new StatusFilter,
        ];
    }

    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return Bill::with('billProducts')->with('user');
    }

    public $searchBy = ['total', 'user->fullname', 'payment_method', 'shipping_method', 'status', 'address'];
    protected $paginate = 10;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('Id')),
            Header::title(__('Username'))->sortBy('user->fullname'),
            Header::title(__('Total'))->sortBy('total'),
            Header::title(__('Payment'))->sortBy('payment_method'),
            Header::title(__('Shipping method'))->sortBy('shipping_method'),
            Header::title(__('Status'))->sortBy('status'),
            Header::title(__('Address')),
            Header::title(__('Date'))->sortBy('date'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->id,
            UI::link(
                $model->user->fullname,
                route('users.show', ['user' => $model->user->id])
            ),
            $model->total,
            $model->payment_method,
            $model->shipping_method,
            $model->status_tag,
            $model->address,
            $model->date->format('Y-m-d'),
        ];
    }
}
