<?php

namespace App;

use App\Buyer;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\TransactionResource;

class Transaction extends Model
{
    public $resource = TransactionResource::class;

    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
