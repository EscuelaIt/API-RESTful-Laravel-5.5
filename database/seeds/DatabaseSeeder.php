<?php

use App\User;
use App\Product;
use App\Category;
use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Category::truncate();
        Transaction::truncate();
        Product::truncate();
        DB::table('category_product')->truncate();

        $cantUsers = 1000;
        $cantCategories = 30;
        $cantProducts = 1000;
        $cantTransactions = 1000;

        factory(User::class, $cantUsers)->create();

        $categories = factory(Category::class, $cantCategories)->create();

        factory(Product::class, $cantProducts)->create()->each(
            function ($product) use ($categories) {
                $randomCategories = $categories->random(mt_rand(1, 5))->pluck('id');

                $product->categories()->attach($randomCategories);
            }
        );

        factory(Transaction::class, $cantTransactions)->create();

        Schema::enableForeignKeyConstraints();
    }
}
