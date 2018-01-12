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
            if(Auth::user()->admin){
                return redirect()->intended('/admin/dashboard');
            }
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
        $rules = [
            'password' => 'required'
        ];
        $this->validate($request, $rules);
        return $this->userService->makeUserAdmin($id, $request);
    }

    public function deleteUser(Request $request)
    {
        $id = $request->id;
        $password = $request->p;
        $rules = [
            'p' => 'required'
        ];
        $this->validate($request, $rules);
        return response()->json($this->userService->deleteUser($id, $password));
    }

    public function search(Request $request, $param){
        return  response()->json($this->userService->searchByParam($param));
    }

    public function addAdress(Request $request) {
        $deliveryAddress = $request->deliveryAddress;
        // return $deliveryAddress;
        session(['deliveryAddress' => $request->deliveryAddress]);
        return response()->json(true);
    }

    public function getAddress(Request $request) {
        return response(session('deliveryAddress'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
