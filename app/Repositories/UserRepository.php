<?php
namespace App\Repositories;

use App\User;

class UserRepository extends AbstractRepository
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getUserPassword($id)
    {
        return $this->model->where('id', $id)->first()->password;
    }

    public function search($param, $n = 5)
    {
        return $this->model->where('name', 'like', '%' . $param . '%')
            ->orWhere('email', 'like', '%' . $param . '%')
            ->orWhere('phone_number', 'like', '%' . $param . '%')
            ->simplePaginate($n);
    }

}