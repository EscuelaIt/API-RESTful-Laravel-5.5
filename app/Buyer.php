<?php

namespace App;

use App\User;
use App\Transaction;
use App\Scopes\BuyerScope;
use App\Http\Resources\BuyerResource;

class Buyer extends User
{
    public $resource = BuyerResource::class;

    protected $hidden = [
        'password', 'remember_token', 'email',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BuyerScope);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
