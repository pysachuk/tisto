<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class CategorySeeder extends Seeder
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
        $categories = [
            [
                'title' => 'На вершковій основі',
                'description' => 'Піца на вершковій основі',
                'image_url' => '/categories/'.$this->faker->image(public_path('storage/categories'), 640, 480, null, false)
            ],
            [
                'title' => 'На томатній основі основі',
                'description' => 'Піца на томатній основі основі',
                'image_url' => '/categories/'.$this->faker->image(public_path('storage/categories'), 640, 480, null, false)
            ],
            [
                'title' => 'Грузинські страви',
                'description' => 'Грузинські страви',
                'image_url' => '/categories/'.$this->faker->image(public_path('storage/categories'), 640, 480, null, false)
            ]
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
