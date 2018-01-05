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

    /**
     * @return array
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param array $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getProductQuantity()
    {
        return $this->productQuantity;
    }

    /**
     * @param mixed $productQuantity
     */
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
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