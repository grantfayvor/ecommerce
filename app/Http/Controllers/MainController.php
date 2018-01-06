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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function home()
    {
        return redirect()->to('/');
    }

    public function login()
    {
        return view('login');
    }

    public function cart()
    {
        return view('cart', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function checkout()
    {
        return view('checkout', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function paymentSuccessView()
    {
        return view('payment-success', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function paymentFailureView()
    {
        return view('payment-failure', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function adminDashboard()
    {
        return view('admin/dashboard', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function addProduct()
    {
        return view('admin/add-product', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function viewProducts()
    {
        return view('admin/product', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function viewProductsAsList()
    {
        return view('admin/product-list', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function viewSalesAsList()
    {
        return view('admin/sale-list', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function viewProductImage(Request $request)
    {
        return response()->file($request->location);
    }

}
