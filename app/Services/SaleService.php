<?php
namespace App\Services;

use App\Models\Sale;
use App\Repositories\SaleRepository;
use Illuminate\Http\Request;

class SaleService
{

    private $repository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->repository = $saleRepository;
    }

    public function findAllSales()
    {
        return $this->repository->findAll();
    }

    public function addSale(Request $request)
    {
        $product = $request->product;
        $quantity = $request->quantity;
        $profit = $request->profit;
        $customerId = $request->user()->id;
        $sale = new Sale($product, $quantity, $profit, $customerId);
        return $this->repository->save($sale->getAttributesArray());
    }

    public function searchByParam($param)
    {
        return $this->repository->search($param);
    }
}