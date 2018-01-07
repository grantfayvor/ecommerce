<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;


    public function findAllUnPaged()
    {
        return $this->model->all();
    }

    public function findAll(int $n = 5)
    {
        return $this->model->simplePaginate($n);
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

    public function findByParam($param, $value, $url = null, int $n = 5)
    {
        $result = $this->model->where($param, $value)->simplePaginate($n);
        if($url != null) $result->withPath($url);
        return $result;
    }

    public function findOneByParam($param, $value)
    {
        return $this->model->where($param, $value)->first();
    }

}