<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

abstract class BaseResource extends Resource
{
    public static $map = [];

    public static function mapAttribute($attribute, $invert = false)
    {
        if ($invert) {
            return array_flip(static::$map)[$attribute];
        }

        return static::$map[$attribute];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $visibleAttributes = $this->resource->attributesToArray();

        $transformedAttributes = [];

        foreach ($visibleAttributes as $attribute => $value) {
            $transformedAttributes[static::mapAttribute($attribute)] = $value;
        }

        return $transformedAttributes;
    }
}
