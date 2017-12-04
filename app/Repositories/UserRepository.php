<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository extends AbstractRepository
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }


    public function findUserIdByUsername($username)
    {
//			$this->model->where('username', $username)->pluck('id')->first();
        return $this->model->select('id')->where('username', $username)->first();
    }

    public function findUsernameByUserId($id)
    {
        return $this->model->select('username')->where('id', $id)->first();
    }

    public function findByUsername($username)
    {
        return $this->model->where('username', $username)->first();
    }

    public function findByUsernameAndPassword($username, $password)
    {
        return $this->model->where(['username' => $username, 'password' => $password])->first();
    }

}