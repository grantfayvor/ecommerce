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

}