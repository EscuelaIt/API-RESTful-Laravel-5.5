<?php

namespace App\Http\Controllers\Product;

use App\User;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;

class ProductBuyerTransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product, User $buyer)
    {
        $rules = [
            'quantity' => 'required|integer|min:1',
        ];

        $data = $this->transformAndValidateRequest(TransactionResource::class, $request, $rules);

        if ($buyer->id === $product->seller_id) {
            return $this->errorResponse('The buyer must be different from the seller', 409);
        }

        if ($product->status === Product::NOT_AVAILABLE) {
            return $this->errorResponse('The product is not available yer. try later', 409);
        }

        if ($product->quantity < $data['quantity']) {
            return $this->errorResponse('The product does not have enough units for this transaction', 409);
        }

        $product->quantity -= $data['quantity'];
        $product->save();

        $transaction = Transaction::create([
            'quantity' => $data['quantity'],
            'buyer_id' => $buyer->id,
            'product_id' => $product->id,
        ]);

        return $this->showOne($transaction, 201);
    }
}
