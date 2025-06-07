<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
            "name" => "Php",
            "slug" => "php",
            'created_at' => now(),
            'updated_at' => now(),
            ],

            [
            "name" => "Laravel",
            "slug" => "laravel",
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [

            "name" => "Css|Html",
            "slug" => "css_html",
            'created_at' => now(),
            'updated_at' => now(),
            ],

            [
            "name" => "JavaScript",
            "slug" => "javascript",
            'created_at' => now(),
            'updated_at' => now(),
            ],

            [

            "name" => "C++",
            "slug" => "c++",
            'created_at' => now(),
            'updated_at' => now(),
            ],

            [

            "name" => "Java",
            "slug" => "java",
            'created_at' => now(),
            'updated_at' => now(),

            ],

            [
            "name" => "ReactJs",
            "slug" => "reactjs",
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            "name" => "VueJs",
            "slug" => "vuejs",
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            "name" => "Go",
            "slug" => "go",
            'created_at' => now(),
            'updated_at' => now(),
            ],

            [
            "name" => "Rust",
            "slug" => "rust",
            'created_at' => now(),
            'updated_at' => now(),
            ],

            [
            "name" => "Programming",
            "slug" => "programming",
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]
        );
    }
}
