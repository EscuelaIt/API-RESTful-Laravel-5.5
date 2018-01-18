<?php

namespace App;

use App\User;
use App\Transaction;
use App\Scopes\BuyerScope;

class Buyer extends User
{
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
