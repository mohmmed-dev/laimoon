<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\convertedvideo>
 */
class ConvertedvideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mp4_Format_240' => '240-B3IX5MdxYmolYFUH1748557958.mp4' ,
            'mp4_Format_360' => '360-B3IX5MdxYmolYFUH1748557958.mp4',
            'mp4_Format_480' =>'480-B3IX5MdxYmolYFUH1748557958.mp4',
            'webm_Format_240' => '240-B3IX5MdxYmolYFUH1748557958.webm',
            'webm_Format_360' => "360-B3IX5MdxYmolYFUH1748557958.webm",
            'webm_Format_480' => '480-B3IX5MdxYmolYFUH1748557958.webm',
        ];
    }
}
