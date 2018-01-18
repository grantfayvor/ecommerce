<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $service)
    {
        $this->cartService = $service;
    }

    public function addToCart(Request $request)
    {
        $productDetails = (array) $request->input('details');
        $this->cartService->addToCart($productDetails);
        return response()->json(array("result" => true));
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $quantity = $request->qty;
        $this->cartService->updateCart($rowId, $quantity);
        return response()->json(['data' => $this->cartService->getCart(), 'total_price' => $this->cartService->getCartSubtotal()]);
    }

    public function getUserCart()
    {
        return response()->json(['data' => $this->cartService->getCart(), 'total_price' => $this->cartService->getCartSubtotal()]);
    }

    public function getCartItem($rowId)
    {
        return response()->json(['data' => $this->cartService->getCartItem($rowId)]);
    }

    public function removeFromCart($rowId)
    {
        $this->cartService->removeCartItem($rowId);
        return response()->json(['data' => $this->cartService->getCart(), 'total_price' => $this->cartService->getCartSubtotal()]);
    }

    public function destroyCart()
    {
        $this->cartService->destroyCart();
        return response()->json(['message' => 'cart was successfully destroyed'], 200);
    }

    public function getCartTotal()
    {
        return response()->json(['data' => $this->cartService->getCartTotal()]);
    }

    public function getCartSubtotal()
    {
        return response()->json(['data' => $this->cartService->getCartSubtotal()]);
    }

    public function getCountOfItems()
    {
        return response()->json($this->cartService->getCountOfItems());
    }

    public function storeCartData(Request $request)
    {
        $username = $request->user()->username;
        $this->cartService->storeCart($username);
        return response()->json(['message' => 'cart was successfully stored']);
    }

    public function restoreCart(Request $request)
    {
        $username = $request->user()->username;
        return response()->json(['data' => $this->cartService->restoreCart($username)]);
    }


}
