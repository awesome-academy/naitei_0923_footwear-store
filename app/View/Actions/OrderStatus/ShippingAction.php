<?php

namespace App\View\Actions\OrderStatus;

use App\Models\User;
use App\Notifications\ChangeStatus;
use Illuminate\Support\Facades\Notification;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class ShippingAction extends Action
{
    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "phone-call";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $user = User::find($model->user_id);
        if ($model->status == config('app.bill_status.awating') || $model->status == config('app.bill_status.manual')) {
            $model->status = config('app.bill_status.shipping');
            $model->save();
            Notification::send($user, new ChangeStatus($model));

            return redirect()->route('order.showAdmin', $model)->with('bill-status', 'status-updated');
        } else {
            return redirect()->route('order.showAdmin', $model)->with('error', 'cant-perform');
        }
    }

    public function renderIf($model, View $view)
    {
        return $model->status == config('app.bill_status.awating') ||
        $model->status == config('app.bill_status.manual');
    }
}
