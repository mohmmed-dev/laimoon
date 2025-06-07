<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoriesbles')->insert([
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,9),
                'categoriesble_type' => Course::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
            [
                'category_id' => fake()->numberBetween(1,10),
                'categoriesble_id' => fake()->numberBetween(1,30),
                'categoriesble_type' => Article::class,
            ],
        ]);
    }
}
