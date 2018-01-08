<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SaleService;
use App\Services\CartService;
use Paystack;

class PaymentController extends Controller
{

    public function __construct(SaleService $saleService, CartService $cartService)
    {
        $this->saleService = $saleService;
        $this->cartService = $cartService;
    }

    public function redirectToGateway(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'orderID' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'reference' => 'required',
            'key' => 'required'
        ];
        $this->validate($request, $rules);
        if($request->amount == ((int) $this->cartService->getCartSubtotal() * 100)){
            return Paystack::getAuthorizationUrl()->redirectNow();
        } else {
            return response()->json(['message' => 'sorry you can\'t hack the price. I got it covered! ;)' . $request->amount]);
        }
    }

    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();
    //    dd($paymentDetails);
        if($paymentDetails['status']){
            $cart = base64_encode(serialize($this->cartService->getCart()));
            $cartPrice = $this->cartService->getCartSubtotal();
            $quantity = $this->cartService->getCountOfItems();
            $transactionId = $paymentDetails['data']['reference'];
            $amountPaid = $paymentDetails['data']['amount'];
            $customer = $paymentDetails['data']['customer']['email'];

            $sale = [
                'cart' => $cart,
                'cart_price' => $cartPrice,
                'quantity' => $quantity,
                'payment_id' => $transactionId,
                'amount_paid' => (int) $amountPaid / 100,
                'profit' => $cartPrice,
                'customer' => $customer,
            ];

            $this->saleService->addSale($sale);
            $request->session()->forget('cart');
            return redirect()->to('/payment/success');
        }
        return redirect()->to('/payment/failure');
    }
}
