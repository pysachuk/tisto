<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    protected $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all()->pluck('id')->toArray();


        for ($a = 1; $a<=20; $a++) {
            $randCategoryKey = array_rand($categories);
            $product = [
                'title' => $this->faker->streetName,
                'description' => $this->faker->realText(50),
                'price' => rand(100, 200),
                'weight' => rand(400, 1000),
                'category_id' => $categories[$randCategoryKey]
            ];

            $newProduct = Product::create($product);
            Storage::disk('public')->makeDirectory('products/product_'.$newProduct->id);

            $newProduct->image()->create([
                'image' => "/products/product_$newProduct->id/".$this->faker->image(public_path('storage/products/product_'.$newProduct->id), 640, 480, null, false),
                'is_main' => 1
            ]);
        }
    }
}
