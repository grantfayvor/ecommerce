<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends AbstractRepository
{

    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function search($param, $n = 5)
    {
        return $this->model->where('name', 'like', '%' . $param . '%')
            ->orWhere('brand', 'like', '%' . $param . '%')
            ->orWhere('details', 'like', '%' . $param . '%')
            ->simplePaginate($n);
    }

}