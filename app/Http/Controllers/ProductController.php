<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productService;
    private $cartService;

    public function __construct(ProductService $productService, CartService $cartService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
    }

    public function saveProduct(Request $request)
    {
        $rules = [
            'name' => 'required',
            'brand' => 'required',
            'sellingPrice' => 'required',
            'categoryId' => 'required',
            'image' => 'required',
            'details' => 'required'
        ];
        $this->validate($request, $rules);
        if($this->productService->save($request)){
            return redirect('/admin/view-products');
        } else {
            return back()->withInput();
        }
    }

    public function updateProduct(Request $request)
    {
        $rules = [
            'id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'sellingPrice' => 'required',
            'categoryId' => 'required',
            'image' => 'required',
            'details' => 'required'
        ];
        $id = $request->id;
        if($this->productService->update($request, $id)){
            return redirect('/admin/view-products');
        } else {
            return back()->withInput();
        }
    }

    public function findAllProducts()
    {
        return $this->productService->findAllProducts();
    }

    public function findProductsByStatus($status)
    {
        return $this->productService->findProductsByStatus($status);
    }

    public function findProductsByCategory(Request $request)
    {
        return $this->productService->findProductByCategory($request->q);
    }

    public function countProducts()
    {
        return $this->productService->countProducts();
    }

    public function search($param)
    {
        $productList = $this->productService->searchByParam($param);
        if ($productList != null) {
            return response()->json($productList);
        } else {
            return response()->json(array("message" => "resource was not found"), 404);
        }
    }

    public function deleteProduct($id)
    {
        return response()->json(['message' => $this->productService->delete($id)]);
    }
}
