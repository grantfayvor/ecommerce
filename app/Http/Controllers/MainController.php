<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('index');
    }

    public function cart()
    {
        return view('cart');
    }

    public function admin()
    {
        return view('admin/index');
    }

    public function addProductView()
    {
        return view('admin/add-product');
    }

}
