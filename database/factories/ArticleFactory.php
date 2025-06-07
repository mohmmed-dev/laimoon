<?php

namespace Database\Factories;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title =  fake()->title() ;
        return [
            'user_id' => fake()->numberBetween(1,9),
            'title' => $title ,
            'slug' => Slug::uniqueSlug($title ,'articles') .  fake()->bothify('???????'),
            'description' => fake()->text(50),
            'path_image' => 'default.png',
        ];
    }
}
