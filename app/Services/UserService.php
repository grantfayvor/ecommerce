<?php
namespace App\Services;

use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use Auth;

class UserService
{

    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function authenticateUser($username, $password)
    {
        return Auth::attempt(['email' => $username, 'password' => $password]);
    }

    public function countUsers()
    {
        return $this->repository->findAll()->count();
    }

    public function findUserIdByUsername($username)
    {
        return $this->repository->findUserIdByUsername($username)->fetch_array();
    }

    public function findUsernameByUserId($id)
    {
        return $this->repository->findUsernameByUserId($id)->fetch_array();
    }

    public function register(Request $request)
    {
        $name = $request->firstName ." ". $request->lastName;
        $phoneNumber = $request->phoneNumber;
        $password = $request->password;
        $email = $request->email;
        $user = new User();
        $user->setName($name);
        $user->setPassword($password);
        $user->setEmail($email);
        $user->setPhoneNumber($phoneNumber);
        $user->setAccountType("USER");
        if ($this->repository->findOneByParam('email', $user->getEmail()) != null) {
            return response()->json(['message' => 'user already exists'], 403);
        } else {
            return $this->repository->save($user->getAttributesArray());
        }
    }

}