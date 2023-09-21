<?php

namespace App\View\Actions;

use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;
use LaravelViews\Views\View;

class ActivateUserAction extends Action
{

    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Active/Deactivate";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = 'unlock';
    
    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        if (Auth::user()->hasRole('admin')) {
            if ($model->is_active) {
                $model->is_active = false;
                $model->save();
                $this->success();
            } else {
                $model->is_active = true;
                $model->save();
                $this->success();
            }
        } else {
            $this->error();
        }
    }
}
