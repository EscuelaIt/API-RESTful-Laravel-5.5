<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class ProductResource extends BaseResource
{
    public static $map = [
        'id' => 'identifier',
        'name' => 'title',
        'description' => 'details',
        'quantity' => 'stock',
        'status' => 'situation',
        'seller_id' => 'seller',
        'updated_at' => 'last_modified',
        'created_at' => 'creation_date',
    ];

    public function generateLinks()
    {
        return [
            [
                'rel' => 'self',
                'href' => route('products.show', $this->id),
            ],
            [
                'rel' => 'product.buyers',
                'href' => route('products.buyers.index', $this->id),
            ],
            [
                'rel' => 'product.categories',
                'href' => route('products.categories.index', $this->id),
            ],
            [
                'rel' => 'product.transactions',
                'href' => route('products.transactions.index', $this->id),
            ],
            [
                'rel' => 'seller',
                'href' => route('sellers.show', $this->seller_id),
            ],
        ];
    }
}
