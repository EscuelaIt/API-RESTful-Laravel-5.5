<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class BuyerResource extends BaseResource
{
    public static $map = [
        'id' => 'identifier',
        'email' => 'email_address',
        'name' => 'full_name',
        'updated_at' => 'last_modified',
        'created_at' => 'creation_date',
    ];

    public function generateLinks($request)
    {
        return [
            [
                'rel' => 'self',
                'href' => route('buyers.show', $this->id),
            ],
            [
                'rel' => 'buyer.categories',
                'href' => route('buyers.categories.index', $this->id),
            ],
            [
                'rel' => 'buyer.products',
                'href' => route('buyers.products.index', $this->id),
            ],
            [
                'rel' => 'buyer.sellers',
                'href' => route('buyers.sellers.index', $this->id),
            ],
            [
                'rel' => 'buyer.transactions',
                'href' => route('buyers.transactions.index', $this->id),
            ],
            [
                'rel' => 'user',
                'href' => route('users.show', $this->id),
            ],
        ];
    }
}
