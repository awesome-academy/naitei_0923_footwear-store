<?php

namespace App\View\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class UpdateUserAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Update user information";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "edit";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($user, View $view)
    {
        return redirect()->route('users.edit', $user);
    }
}
