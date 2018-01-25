<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('users', 'User\UserController');

Route::apiResource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);
Route::apiResource('buyers.transactions', 'Buyer\BuyerTransactionController', ['only' => ['index']]);
Route::apiResource('buyers.products', 'Buyer\BuyerProductController', ['only' => ['index']]);
Route::apiResource('buyers.sellers', 'Buyer\BuyerSellerController', ['only' => ['index']]);
Route::apiResource('buyers.categories', 'Buyer\BuyerCategoryController', ['only' => ['index']]);

Route::apiResource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);
Route::apiResource('sellers.transactions', 'Seller\SellerTransactionController', ['only' => ['index']]);
Route::apiResource('sellers.categories', 'Seller\SellerCategoryController', ['only' => ['index']]);
Route::apiResource('sellers.buyers', 'Seller\SellerBuyerController', ['only' => ['index']]);
Route::apiResource('sellers.products', 'Seller\SellerProductController', ['except' => ['show']]);

Route::apiResource('products', 'Product\ProductController', ['only' => ['index', 'show']]);
Route::apiResource('products.transactions', 'Product\ProductTransactionController', ['only' => ['index']]);
Route::apiResource('products.buyers', 'Product\ProductBuyerController', ['only' => ['index']]);
Route::apiResource('products.categories', 'Product\ProductCategoryController', ['only' => ['index', 'update', 'destroy']]);
Route::apiResource('products.buyers.transactions', 'Product\ProductBuyerTransactionController', ['only' => ['store']]);

Route::apiResource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);
Route::apiResource('transactions.categories', 'Transaction\TransactionCategoryController', ['only' => ['index']]);
Route::apiResource('transactions.sellers', 'Transaction\TransactionSellerController', ['only' => ['index']]);

Route::apiResource('categories', 'Category\CategoryController');
Route::apiResource('categories.transactions', 'Category\CategoryTransactionController', ['only' => ['index']]);
Route::apiResource('categories.buyers', 'Category\CategoryBuyerController', ['only' => ['index']]);
Route::apiResource('categories.products', 'Category\CategoryProductController', ['only' => ['index']]);
Route::apiResource('categories.sellers', 'Category\CategorySellerController', ['only' => ['index']]);
