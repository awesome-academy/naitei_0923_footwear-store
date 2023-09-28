<?php

namespace App\View\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class ShowProductAction extends Action
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

    public function __construct()
    {
        $this->title = __("Product's details");
    }

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        return redirect()->route('product.showAdmin', $model);
    }
}
