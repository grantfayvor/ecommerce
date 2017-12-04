<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function addToCart(Request $request, $id)
    {
        $product = $request->input('product');
        if ($request->session()->exists('cart')) {
            $request->session()->push('cart', $product);
        } else {
            $request->session()->put('cart', array($product));
        }
        return response()->json(array("result" => true));
    }

    public function getUserCart(Request $request)
    {
//        $request->session()->forget('cart');
        $cart = $request->session()->get('cart');
        $total_price = 0;
        if ($cart == null || count($cart) < 1) {
            return response()->json(['data' => $cart, 'total_price' => $total_price]);
        }
        foreach ($cart as $product) {
            $total_price = (int)$product['selling_price'] + $total_price;
        }
        return response()->json(['data' => $cart, 'total_price' => $total_price]);
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = $request->session()->get('cart');
        $cart = $this->unsetValue($cart, $id);
        $request->session()->forget('cart');
        $request->session()->put('cart', $cart);
//        return response()->json($cart);
        $total_price = 0;
        foreach ($cart as $product) {
            $total_price = (int)$product['selling_price'] + $total_price;
        }
        return response()->json(['data' => $cart, 'total_price' => $total_price]);
    }

    private function unsetValue(array $array, $value)
    {
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]['id'] == $value) {
                unset($array[$i]);
            }
        }
        array_multisort($array);
        return $array;
    }

    public function saveProduct(Request $request)
    {
        return response()->json($this->productService->save($request));
    }

    public function updateProduct(Request $request, $id)
    {
        return response()->json($this->productService->update($request, $id));
    }

    public function findAllProducts()
    {
        return $this->productService->findAllProducts();
    }

    public function findProductsByStatus($status)
    {
//        return $status;
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
        return response()-json(['message' => $this->productService->delete($id)]);
    }
}
