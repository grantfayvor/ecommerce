<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 03/12/2017
 * Time: 20:01
 */

namespace App\Repositories;


use App\Models\CartProductDetails;

class CartProductDetailsRepository extends AbstractRepository{

    protected $model;

    public function __construct(CartProductDetails $details)
    {
        $this->model = $details;
    }
}