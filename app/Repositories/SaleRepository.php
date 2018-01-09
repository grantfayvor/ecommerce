<?php
namespace App\Repositories;

use App\Models\Sale;

class SaleRepository extends AbstractRepository
{

    protected $model;

    public function __construct(Sale $sale) {
        $this->model = $sale;
    }

    public function search($param, $n = 5)
    {
        return $this->model->where('payment_id', 'like', '%' . $param . '%')
            ->orWhere('customer', 'like', '%' . $param . '%')
            ->simplePaginate($n);
    }
}