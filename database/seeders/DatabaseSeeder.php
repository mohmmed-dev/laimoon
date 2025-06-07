<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Lesson;
use App\Models\User;
use Database\Factories\SectionFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            SectionSeeder::class,
            LessonSeeder::class,
            ConvertedvideoSeeder::class,
            ArticleSeeder::class,
            CategorySeeder::class,
            CategoriesblesSeeder::class,
        ]);
    }
}
