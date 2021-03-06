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
        $image = $request->file('image');
        $imageExtension = $image->getClientOriginalExtension();
        if($imageExtension === 'jpg' || $imageExtension === 'png'){
            if($this->productService->save($request)){
                return redirect('/admin/view-products');
            } else {
                return back()->withInput();
            }
        } else {
            return back()->withInput()->withErrors(['imageError' => 'please upload an image with either a jpg or png format']);
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
        $this->validate($request, $rules);
        $image = $request->file('image');
        $imageExtension = $image->getClientOriginalExtension();
        $id = $request->id;
        if($imageExtension === 'jpg' || $imageExtension === 'png') {
            if ($this->productService->update($request, $id)) {
                return redirect('/admin/view-products');
            } else {
                return back()->withInput();
            }
        } else {
            return back()->withInput()->withErrors(['imageError' => 'please upload an image with either a jpg or png format']);
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
        // if (!$productList) {
            return response()->json($productList);
        // } else {
        //     return response()->json(["message" => "sorry nothing was found for your search"]);
        // }
    }

    public function deleteProduct($id)
    {
        return response()->json(['message' => $this->productService->delete($id)]);
    }
}
