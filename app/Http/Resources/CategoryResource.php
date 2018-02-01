<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class CategoryResource extends BaseResource
{
    public static $map = [
        'id' => 'identifier',
        'name' => 'title',
        'description' => 'details',
        'updated_at' => 'last_modified',
        'created_at' => 'creation_date',
    ];

    public function generateLinks($request)
    {
        return [
            [
                'rel' => 'self',
                'href' => route('categories.show', $this->id),
            ],
            [
                'rel' => 'category.buyers',
                'href' => route('categories.buyers.index', $this->id),
            ],
            [
                'rel' => 'category.products',
                'href' => route('categories.products.index', $this->id),
            ],
            [
                'rel' => 'category.sellers',
                'href' => route('categories.sellers.index', $this->id),
            ],
            [
                'rel' => 'category.transactions',
                'href' => route('categories.transactions.index', $this->id),
            ],
        ];
    }
}
