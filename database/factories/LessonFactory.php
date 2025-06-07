<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //   $table->foreignId('course_id')->constrained()->cascadeOnDelete();
    public function definition(): array
    {
        $number = fake()->numberBetween(1,30);
        return [
            'section_id'=> fake()->numberBetween(1,30),
            'course_id'=> Section::find($number)->course_id,
            'title' => fake()->title(),
            'slug' => fake()->title().fake()->numberBetween(1,6000).fake()->numberBetween(1,6000),
            'description' => fake()->text(50),
            'path_video' => 'default.mp4',
        ];
    }
}
