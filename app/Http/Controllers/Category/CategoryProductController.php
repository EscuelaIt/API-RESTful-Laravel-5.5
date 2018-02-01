<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $products = $category->products()->paginate($this->determinePageSize());

        return $this->showAll($products);
    }
}
