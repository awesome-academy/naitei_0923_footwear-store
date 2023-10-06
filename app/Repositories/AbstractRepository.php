<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\Auth;

abstract class AbstractRepository implements RepositoryInterface
{
    protected $guard;
    protected $model;
    protected $user;

    abstract public function model();

    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->model, $method], $parameters);
    }

    public function setGuards($guard = null)
    {
        $this->guard = $guard;
        $this->user = Auth::guard($this->guard)->user();

        return $this;
    }

    public function __construct()
    {
        return $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        return $this->model->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
