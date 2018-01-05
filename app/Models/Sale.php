<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    private $cart;
    private $quantity;
    private $profit;
    private $customer;

    public function __construct($cart, $quantity, $profit, $customer)
    {
        $this->cart = $cart;
        $this->quantity = $quantity;
        $this->profit = $profit;
        $this->customer = $customer;
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getProfit()
    {
        return $this->profit;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function getAttributesArray()
    {
        return [
            'cart' => $this->cart,
            'quantity' => $this->quantity,
            'profit' => $this->profit,
            'customer' => $this->customer
        ];
    }
}