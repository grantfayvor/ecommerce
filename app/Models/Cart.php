<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

//    private $productId;
//    private $productQuantity;

    private $cartProductDetails;
    private $totalPrice;
    private $customerId;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getCartProductDetails()
    {
        return $this->cartProductDetails;
    }

    /**
     * @param mixed $cartProductDetails
     */
    public function setCartProductDetails($cartProductDetails)
    {
        $this->cartProductDetails = $cartProductDetails;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function cartProductDetails()
    {
        return $this->hasMany(CartProductDetails::class);
    }

    public function getAttributesArray()
    {
        return [
            'cart_product_details_ids' => $this->cartProductDetails,
            'total_price' => $this->totalPrice,
            'customer_id' => $this->customerId
        ];
    }

}

?>