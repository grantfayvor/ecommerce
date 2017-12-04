<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 03/12/2017
 * Time: 19:22
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CartProductDetails extends Model{

    protected $guarded = [];

    private $productId;
    private $productQuantity;
    private $price;

    public function __construct($productId, $productQuantity, $price)
    {
        $this->productId = $productId;
        $this->productQuantity = $productQuantity;
        $this->price = $price;
    }

    public function products ()
    {
        return $this->belongsTo(Product::class);
    }

    public function getAttributesArray()
    {
        return [
            'product_id' => $this->productId,
            'product_quantity' => $this->productQuantity,
            'price' => $this->price
        ];
    }

}