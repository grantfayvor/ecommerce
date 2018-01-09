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
        return $this->repository->findAll(50);
    }

    public function countAllSales()
    {
        return $this->repository->findAllUnPaged()->count();
    }

    public function addSale($saleDetails)
    {
        return $this->repository->save($saleDetails);
    }

    public function searchByParam($param)
    {
        return $this->repository->search($param, 30);
    }
}