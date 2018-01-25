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
}
