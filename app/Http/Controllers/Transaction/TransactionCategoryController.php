<?php

namespace App\Http\Controllers\Transaction;

use App\Transaction;
use App\Http\Controllers\Controller;

class TransactionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $categories = $transaction->product->categories;

        return $this->showAll($categories);
    }
}
