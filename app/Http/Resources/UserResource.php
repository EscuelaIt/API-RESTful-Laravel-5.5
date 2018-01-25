<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class UserResource extends BaseResource
{
    public static $map = [
        'id' => 'identifier',
        'name' => 'full_name',
        'password' => 'password',
        'email' => 'email_address',
        'updated_at' => 'last_modified',
        'created_at' => 'creation_date',
    ];
}
