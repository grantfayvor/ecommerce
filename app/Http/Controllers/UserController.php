<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function saveUser(Request $request)
    {
        $username = $request->email;
        $password = $request->password;
        // return $this->userService->register($request);
        if ($this->userService->register($request) && $this->userService->authenticateUser($username, $password)) {
            return redirect()->intended('/');
        } else {
            return back()->withInput();
        }
    }

    public function authenticateUser(Request $request)
    {
        $username = $request->email;
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

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
