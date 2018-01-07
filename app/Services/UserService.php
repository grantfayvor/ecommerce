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

    public function findAllUsers()
    {
        return $this->repository->findAll(30);
    }

    public function countUsers()
    {
        return $this->repository->findAllUnPaged()->count();
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

    public function makeUserAdmin($id, Request $request)
    {
        $currentPassword = $this->getCurrentUserPassword(Auth::user()->id);
        if (Hash::check($request->password, $currentPassword)) {
            $details = [
                'admin' => $request->adminStatus
            ];
            return $this->repository->update($id, $details) ? response()->json(['message' => 'user was successfully made an admin'], 200) : response()->json(['message' => 'sorry user could not be made an admin.']);
        } else {
            return response()->json(['message' => 'your password is incorrect'], 403);
        }
    }

    private function getCurrentUserPassword($id)
    {
        return $this->repository->getUserPassword($id);
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

    public function deleteUser($id, $password)
    {
        $currentPassword = $this->getCurrentUserPassword(Auth::user()->id);
        if (Hash::check($password, $currentPassword)) {
            return $this->repository->delete($id);
        } else {
            return response()->json(['message' => 'your password is incorrect'], 403);
        }
    }

}