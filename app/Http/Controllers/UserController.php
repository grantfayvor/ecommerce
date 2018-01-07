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

    public function findAllUsers(Request $request)
    {
        return response()->json($this->userService->findAllUsers());
    }

    public function saveUser(Request $request)
    {
        $rules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
        $this->validate($request, $rules);
        $username = $request->email;
        $password = $request->password;
        if ($this->userService->register($request) && $this->userService->authenticateUser($username, $password)) {
            return redirect()->intended('/');
        } else {
            return back()->withInput();
        }
    }

    public function authenticateUser(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $this->validate($request, $rules);
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

    public function getCurrentUser(Request $request)
    {
        return response()->json($request->user());
    }

    public function updateUser(Request $request, $id)
    {
        return $this->userService->updateUser($id, $request);
    }

    public function makeUserAdmin(Request $request, $id)
    {
        return $this->userService->makeUserAdmin($id, $request);
    }

    public function deleteUser($id)
    {
        return response()->json($this->userService->deleteUser($id));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
