<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $products = $seller->products;

        return $this->showAll($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Seller $seller)
    {
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'quantity' => 'required|integer|min:1',
        ];

        $data = $this->transformAndValidateRequest(ProductResource::class, $request, $rules);

        $data['status'] = Product::NOT_AVAILABLE;
        $data['seller_id'] = $seller->id;

        $product = Product::create($data);

        return $this->showOne($product, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller, Product $product)
    {
        $rules = [
            'name' => 'max:255',
            'description' => 'max:1000',
            'quantity' => 'integer|min:1',
            'status' => 'in:' . Product::AVAILABLE . ',' . Product::NOT_AVAILABLE,
        ];

        $data = $this->transformAndValidateRequest(ProductResource::class, $request, $rules);

        $this->checkSeller($seller, $product);

        $product->fill($data);

        if ($product->status === Product::AVAILABLE && $product->categories()->count() === 0) {
            return $this->errorResponse('An active product must have at least one category', 409);
        }

        if ($product->isClean()) {
            return $this->errorResponse('Please specify at least one new value to update', 422);
        }

        $product->save();

        return $this->showOne($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller, Product $product)
    {
        $this->checkSeller($seller, $product);

        $product->delete();

        return $this->showOne($product);
    }

    public function checkSeller(Seller $seller, Product $product)
    {
        if ($seller->id != $product->seller_id) {
            throw new HttpException(403, 'The specified seller is not the actual seller of this product');
        }
    }
}
