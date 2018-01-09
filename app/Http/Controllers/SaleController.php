<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SaleService;
use App\Models\Sale;

class SaleController extends Controller
{
    private $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function getAllSales(){
        return response()->json($this->saleService->findAllSales());
    }

    public function getSaleCount(){
        return response()->json($this->saleService->countAllSales());
    }

    public function addSale(Request $request){
        $product = $request->input('product');
        $quantity = $request->input('quantity');
        $profit = $request->input('profit');
        $customerId = Auth::id();
        $sale = new Sale($product, $quantity, $profit, $customerId);
        return response()->json(array("result" => $this->saleService->addSale($sale)));
    }

    public function search(Request $request, $param){
        $saleList = $this->saleService->searchByParam($param);
        // if(!empty($saleList)){
			return response()->json($saleList);
		// } else{
        //     return response()->json(array("result" => false));
        // }
    }
}
