<?php

namespace Database\Seeders;

use App\Models\convertedvideo;
use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons =  Lesson::factory()->count(40)->create();
        $lessons->each(function ($lesson) {
            convertedvideo::factory()->create([
                'videoble_id' => $lesson->id,
                'videoble_type' => Lesson::class,
            ]);
        });
        
    }
}
