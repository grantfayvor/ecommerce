<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function saveUser(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($this->userService->register($request) && $this->userService->authenticate($username, $password)) {
            return redirect()->intended('/');
        } else {
            return back()->withInput();
        }
    }

    public function authenticateUser(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($this->userService->authenticateUser($username, $password)) {
            return redirect()->intended('/');
        } else {
            return back()->withInput();
        }
    }

    public function countUsers()
    {
        return $this->userService->countUsers();
    }

    public function logout(Request $request, $id)
    {

    }
}
