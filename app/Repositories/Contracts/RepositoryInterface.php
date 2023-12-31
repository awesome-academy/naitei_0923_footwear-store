<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    /**
     * Set repository model
     * @return void
     */
    public function model();

    /**
     * Set guard
     * @param $guard
     * @return $mixed
     */
    public function setGuards($guard = null);

    /**
     * Get all
     * @return $mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return $mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return $mixed
     */
    public function create($attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return $mixed
     */
    public function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return $mixed
     */
    public function delete($id);
}
