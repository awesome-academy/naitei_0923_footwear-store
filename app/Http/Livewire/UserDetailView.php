<?php

namespace App\Http\Livewire;

use App\Models\User;
use LaravelViews\Facades\UI;
use LaravelViews\Views\DetailView;

class UserDetailView extends DetailView
{
    //config localization in resources/views/vendor/laravel-views/detail-view/detail-view.blade.php
    protected $modelClass = User::class;

    public function heading($model)
    {
        return [
            __("User: {$model->fullname}"),
            __("This is the details of {$model->fullname}"),
        ];
    }

    /**
     * @param $model Model instance
     * @return Array Array with all the detail data or the components
     */
    public function detail($model)
    {
        return [
            __('Name') => $model->fullname,
            __('Email') => $model->email,
            __('Phone Number') => $model->phone,
            __('Username') => $model->username,
            __('Active') => $model->is_active ? UI::icon('check', 'success') : UI::icon('x', 'danger'),
            __('Email verified at') => !$model->email_verified_at ?
                'Email is not verified' : $model->email_verified_at->format('Y-m-d'),
            __('Address') => $model->address,
        ];
    }
}
