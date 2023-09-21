<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\View\Actions\ActivateUserAction;
use App\View\Actions\DeleteUserAction;
use App\View\Actions\UpdateUserAction;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\TableView;
use App\View\Filters\UsersActiveFilter;
use App\View\Filters\CreatedFilter;

class UsersTableView extends TableView
{
    /** For actions by item */
    protected function actionsByRow()
    {
        return [
            new UpdateUserAction,
            new ActivateUserAction,
        ];
    }
    protected function filters()
    {
        return [
            new UsersActiveFilter,
            new CreatedFilter,
        ];
    }

    public $searchBy = ['first_name', 'last_name', 'email', 'address', 'phone'];
    protected $paginate = 10;

    protected function repository()
    {
        return User::with('roles');
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            __('Name'),
            Header::title(__('Username'))->sortBy('username'),
            Header::title(__('Email'))->sortBy('email'),
            __('Active'),
            __('Role'),
            __('Phone'),
            __('Address'),
            Header::title(__('Created'))->sortBy('created_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $user Current model for each row
     */
    public function row(User $user): array
    {
        $roles = '';
        foreach ($user->roles as $role) {
            $roles = $roles . strtoupper($role->role) . ' ';
        }
        return [
            $user->fullname,
            $user->username,
            $user->email,
            $user->is_active ? UI::icon('check', 'success') : '',
            $roles,
            $user->phone,
            $user->address,
            $user->created_at->diffforHumans(),
        ];
    }
}
