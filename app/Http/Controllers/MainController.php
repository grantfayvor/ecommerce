<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\CategoryService;

use Auth;

class MainController extends Controller
{
    private $categoryService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        // $this->middleware('auth');
        $this->categoryService = $categoryService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('index', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null, 'categories' => $categories]);
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
        return view('cart', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null]);
    }

    public function checkout()
    {
        return view('checkout', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null, 'email' => Auth::user() ? Auth::user()->email : null, 'phone' => Auth::user() ? Auth::user()->phone_number : null]);
    }

    public function userProfile()
    {
        return view('profile', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null]);
    }

    public function paymentSuccessView()
    {
        return view('payment-success', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null]);
    }

    public function paymentFailureView()
    {
        return view('payment-failure', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null]);
    }

    public function contactUsView()
    {
        return view('contact-us', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null,  'email' => Auth::user() ? Auth::user()->email : null]);    
    }

    public function companyInfoView()
    {
        return view('company-info', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null]);    
    }

    public function privacyPolicyView()
    {
        return view('privacy-policy', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null]);    
    }

    public function refundPolicyView()
    {
        return view('refund-policy', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null]);    
    }

    public function termsOfUseView()
    {
        return view('terms-of-use', ['username' => Auth::user() ? Auth::user()->name : null, 'admin' => Auth::user() ? Auth::user()->admin : null]);    
    }

    public function adminDashboard()
    {
        return view('admin/dashboard', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function addProduct()
    {
        return view('admin/add-product', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function addCategory()
    {
        return view('admin/add-category', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function viewCategoriesAsList()
    {
        return view('admin/category-list', ['username' => Auth::user() ? Auth::user()->name : null]);
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

    public function viewUsersAsList()
    {
        return view('admin/user-list', ['username' => Auth::user() ? Auth::user()->name : null]);
    }

    public function viewProductImage(Request $request)
    {
        return response()->file($request->location);
    }

}
