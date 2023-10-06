<?php

namespace App\View\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class ViewOrderDetailAction extends Action
{
    // config in resources/views/vendor/laravel-views/components/actions/icon-and-title.blade.php
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "eye";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $this->title = __('View Order Detail');
        
        return redirect()->route('order.showAdmin', $model);
    }
}
