<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 03/12/2017
 * Time: 20:02
 */

namespace App\Services;


//use App\Models\Cart;
//use App\Models\CartProductDetails;
use App\Repositories\CartProductDetailsRepository;
use App\Repositories\CartRepository;
use Gloudemans\Shoppingcart\Cart as GSCart;

class CartService
{

    private $cartRepository;
    private $productDetailsRepository;
    private $cart;

    public function __construct(GSCart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @param array $productDetails contains id, name, qty, price, options->imageLocation
     * @return \Gloudemans\Shoppingcart\CartItem
     */
    public function addToCart(array $productDetails)
    {
        return $this->cart->add($productDetails);
    }

    public function updateCart($rowId, $quantity)
    {
        return $this->cart->update($rowId, $quantity);
    }

    public function getCart()
    {
        $cart = $this->cart->content();
        $result = array();
        foreach($cart as $c) {
            array_push($result, $c);
        }
        return $result;
    }

    public function getCartItem($rowId)
    {
        return $this->cart->get($rowId);
    }

    public function removeCartItem($rowId)
    {
        $this->cart->remove($rowId);
    }

    public function destroyCart()
    {
        $this->cart->destroy();
    }

    public function getCartTotal()
    {
        $cartTotal = $this->cart->total();
        $cartTotal = preg_replace('[,]', '', $cartTotal);
        return $cartTotal;
    }

    public function getCartSubtotal()
    {
        $cartTotal = $this->cart->subtotal();
        $cartTotal = preg_replace('[,]', '', $cartTotal);
        return $cartTotal;
    }

    public function getCountOfItems()
    {
        return $this->cart->count();
    }

    public function storeCart($username)
    {
        $this->cart->store($username);
    }

    public function restoreCart($username)
    {
        $this->cart->restore($username);
    }
}