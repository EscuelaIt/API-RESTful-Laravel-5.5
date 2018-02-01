<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class TransactionResource extends BaseResource
{
    public static $map = [
        'id' => 'identifier',
        'quantity' => 'quantity_available',
        'buyer_id' => 'buyer',
        'product_id' => 'product',
        'updated_at' => 'last_modified',
        'created_at' => 'creation_date',
    ];

    public function generateLinks($request)
    {
        return [
            [
                'rel' => 'self',
                'href' => route('transactions.show', $this->id),
            ],
            [
                'rel' => 'transaction.categories',
                'href' => route('transactions.categories.index', $this->id),
            ],
            [
                'rel' => 'transaction.seller',
                'href' => route('transactions.sellers.index', $this->id),
            ],
            [
                'rel' => 'buyer',
                'href' => route('buyers.show', $this->buyer_id),
            ],
            [
                'rel' => 'product',
                'href' => route('products.show', $this->product_id),
            ],
        ];
    }
}
