<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class SellerResource extends BaseResource
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
                'href' => route('sellers.show', $this->id),
            ],
            [
                'rel' => 'seller.buyers',
                'href' => route('sellers.buyers.index', $this->id),
            ],
            [
                'rel' => 'seller.categories',
                'href' => route('sellers.categories.index', $this->id),
            ],
            [
                'rel' => 'seller.products',
                'href' => route('sellers.products.index', $this->id),
            ],
            [
                'rel' => 'seller.transactions',
                'href' => route('sellers.transactions.index', $this->id),
            ],
            [
                'rel' => 'user',
                'href' => route('users.show', $this->id),
            ],
        ];
    }
}
