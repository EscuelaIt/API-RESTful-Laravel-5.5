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
}
