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

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $transformedData = parent::toArray($request);

        $hateoas = [
            'links' => [
                'rel' => 'self',
                'href' => route('sellers.show', $this->id),

                'rel' => 'products',
                'href' => route('sellers.products.index', $this->id),
            ],
        ];

        return array_merge($transformedData, $hateoas);
    }
}
