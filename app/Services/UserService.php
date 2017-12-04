<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{

    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function authenticateUser($username, $password)
    {
        return Auth::attempt(['username' => $username, 'password' => $password]);
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
        $firstName = $request->firstname;
        $lastName = $request->lastname;
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $phoneNumber = $request->phoneNumber;
        $user = new User();
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setEmail($email);
        $user->setPhoneNumber($phoneNumber);
        $user->setAccountType("USER");
        if ($this->repository->findByUsername($user->getUsername()) != null) {
            return response()->json(['message' => 'user already exists'], 403);
        } else {
            return $this->repository->save($user->getAttributesArray());
        }
    }

}