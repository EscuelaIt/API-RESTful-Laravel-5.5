<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\CategoryResource;

class Category extends Model
{
    public $resource = CategoryResource::class;

    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    protected $hidden = [
        'pivot',
    ];
}
