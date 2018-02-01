<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Http\Controllers\Controller;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $transactions = $product->transactions()->paginate($this->determinePageSize());

        return $this->showAll($transactions);
    }
}
