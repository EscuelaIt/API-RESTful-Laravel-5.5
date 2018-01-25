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
}
