<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 03/12/2017
 * Time: 20:00
 */

namespace App\Repositories;


use App\Models\Cart;

class CartRepository extends AbstractRepository{

    protected $model;

    public function __construct(Cart $cart)
    {
        $this->model = $cart;
    }

    public function findAll ()
    {
        return $this->model->with('cart_product_details')->get();
    }

}