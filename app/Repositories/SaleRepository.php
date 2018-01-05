<?php
namespace App\Repositories;

use App\Models\Sale;

class SaleRepository extends AbstractRepository
{

    protected $model;

    public function __construct(Sale $sale) {
        $this->model = $sale;
    }

    public function search($param)
    {
        return $this->model->where('product', 'like', '%' . $param . '%')
            ->orWhere('customer_id', 'like', '%' . $param . '%')
            ->get();
    }
}