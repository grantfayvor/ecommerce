<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 03/12/2017
 * Time: 20:02
 */

namespace App\Services;


use App\Models\Cart;
use App\Models\CartProductDetails;
use App\Repositories\CartProductDetailsRepository;
use App\Repositories\CartRepository;

class CartService
{

    private $cartRepository;
    private $productDetailsRepository;

    public function __construct(CartRepository $cartRepository, CartProductDetailsRepository $cpdRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productDetailsRepository = $cpdRepository;
    }

    public function saveCart($userCart, $userId, $request = null)
    {
        $cart = new Cart();
        $cart->setTotalPrice($userCart['total_price']);
        $cart->setCustomerId($userId);
        $productDetails = array();
        for ($i = 0; $i < count($userCart); $i++) {
            $product = $userCart[$i]['product'];
            $cpd = new CartProductDetails($product['id'], $product['product_quantity'], $product['selling_price']);
            array_push($productDetails, $cpd->getAttributesArray());
        }
        try {
            $productDetails = $this->productDetailsRepository->save($productDetails);
            $productDetails = $productDetails->pluck('id');
            $cart->setCartProductDetails($productDetails);
            $this->cartRepository->save($cart->getAttributesArray());
            return response()->json(['message' => 'user cart was successfully saved', 200]);
        } catch(\Exception $e) {
            return response()->json(['message' => 'the request could not be completed']);
        }
    }

    public function getCart()
    {
        return $this->cartRepository->findAll();
    }
}