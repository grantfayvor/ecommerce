<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function findAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $fields)
    {
        return $this->model->where('id', $id)->update($fields);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function save(array $object)
    {
        return $this->model->create($object);
    }

    public function findByParam($param, $value)
    {
        return $this->model->where($param, $value)->get();
    }

    public function findOneByParam($param, $value)
    {
        return $this->model->where($param, $value)->first();
    }

}