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
}
