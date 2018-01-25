<?php

namespace App;

use App\User;
use App\Scopes\SellerScope;
use App\Http\Resources\SellerResource;

class Seller extends User
{
    public $resource = SellerResource::class;

    protected $hidden = [
        'password', 'remember_token', 'email',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SellerScope);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
