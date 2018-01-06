<?php
namespace App\Services;

use App\Repositories\UserRepository;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function register(Request $request)
    {
        $name = $request->firstName . " " . $request->lastName;
        $phoneNumber = $request->phoneNumber;
        $password = $request->password;
        $email = $request->email;
        $user = new User();
        $user->setName($name);
        $user->setPassword(Hash::make($password));
        $user->setEmail($email);
        $user->setPhoneNumber($phoneNumber);
        $user->setAccountType("USER");
        if ($this->repository->findOneByParam('email', $user->getEmail()) != null) {
            return response()->json(['message' => 'user already exists'], 403);
        } else {
            return $this->repository->save($user->getAttributesArray());
        }
    }

    public function updateUser($id, Request $request)
    {
        $name = $request->name;
        $phoneNumber = $request->phone_number;
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $email = $request->email;
        $currentPassword = $this->getCurrentUserPassword($id);
        if ($oldPassword == $newPassword || !$newPassword || $newPassword == '') {
            if (Hash::check($oldPassword, $currentPassword)) {
                $user = [
                    'name' => $name,
                    'phone_number' => $phoneNumber,
                    'email' => $email
                ];
                return $this->repository->update($id, $user) ? response()->json(['message' => 'your information was successfully updated'], 200) : response()->json(['message' => 'sorry could not update your information']);
            } else {
                return response()->json(['message' => 'old password is incorrect']);
            }
        } else {
            if (Hash::check($oldPassword, $currentPassword)) {
                $user = [
                    'name' => $name,
                    'phone_number' => $phoneNumber,
                    'email' => $email,
                    'password' => Hash::make($newPassword)
                ];
                return $this->repository->update($id, $user) ? response()->json(['message' => 'your information was successfully updated'], 200) : response()->json(['message' => 'sorry could not update your information']);
            } else {
                return response()->json(['message' => 'old password is incorrect']);
            }
        }
    }

    private function getCurrentUserPassword($id)
    {
        return $this->repository->getUserPassword($id);
    }

}