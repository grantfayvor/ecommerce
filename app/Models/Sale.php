<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];
    
    private $id;
    private $product;
    private $quantity;
    private $profit;
    private $customerId;

    public function __construct($product, $quantity, $profit, $customerId)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->profit = $profit;
        $this->customerId = $customerId;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getProfit()
    {
        return $this->profit;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function getAttributesArray()
    {
        return [
            'product' => $this->product,
            'quantity' => $this->quantity,
            'profit' => $this->profit,
            'customer_id' => $this->customerId
        ];
    }
}