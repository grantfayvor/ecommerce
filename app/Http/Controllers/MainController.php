<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

use Auth;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['username' => Auth::user()->name]);
    }

    public function login()
    {
        return view('login');
    }

    public function cart()
    {
        return view('cart', ['username' => Auth::user()->name]);
    }

    public function checkout()
    {
        return view('checkout', ['username' => Auth::user()->name]);
    }

    public function admin()
    {
        return view('admin/index', ['username' => Auth::user()->name]);
    }

    public function addProductView()
    {
        return view('admin/add-product', ['username' => Auth::user()->name]);
    }

}
