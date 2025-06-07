<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert(
            [
                [
                    "title" => "Php",
                    "slug" => "php",
                    'description' => fake()->text(100),
                    "path_image" => "php.png",
                    "path_video" => "default.mp4",
                    "beforePrice" => 189.99,
                    "price" => 159.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "title" => "Laravel",
                    "slug" => "laravel",
                    'description' => fake()->text(100),
                    "path_image" => "laravel.png",
                    "path_video" => "default.mp4",
                    "beforePrice" => 189.99,
                    "price" => 159.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "title" => "Css|Html",
                    "slug" => "css_html",
                    'description' => fake()->text(100),
                    "path_image" => "css.png",
                    "path_video" => "default.mp4",
                    "beforePrice" => 189.99,
                    "price" => 159.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "title" => "JavaScript",
                    "slug" => "javascript",
                    'description' => fake()->text(100),
                    "path_image" => "javaScript.png",
                    "path_video" => "default.mp4",
                    "beforePrice" => 189.99,
                    "price" => 159.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "title" => "C++",
                    "slug" => "c++",
                    'description' => fake()->text(100),
                    "path_image" => "c.png",
                    "path_video" => "default.mp4",
                    "beforePrice" => 150.99,
                    "price" => 99.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "title" => "Java",
                    "slug" => "java",
                    'description' => fake()->text(100),
                    "path_image" => "java.png",
                    "path_video" => "default.mp4",
                    "beforePrice" => 189.99,
                    "price" => 129.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "title" => "ReactJs",
                    "slug" => "reactjs",
                    'description' => fake()->text(100),
                    "path_image" => "reactjs.png",
                    "path_video" => "default.mp4",
                    "beforePrice" => 289.99,
                    "price" => 179.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "title" => "VueJs",
                    "slug" => "vuejs",
                    'description' => fake()->text(100),
                    "path_image" => "vuejs.png",
                    "path_video" => "default.mp4",
                    "beforePrice" => 139.99,
                    "price" => 109.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "title" => "Go",
                    "slug" => "go",
                    "description" => "jsjs",
                    "path_image" => "go.png",
                    "path_video" => "default.mp4",
                    'beforePrice' => 259.99,
                    'price' => 299.99,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
            ]
        );
    }
}
