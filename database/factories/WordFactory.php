<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Slang;
use App\Models\Word;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\word>
 */
class WordFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Word::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id' => User::factory(),
            // // 'slang_id' => Slang::factory(),
            // 'term' => $this->faker->sentence(),
            // 'spell' => $this->faker->slug(),
            // 'tifinagh' => $this->faker->slug(),
            // 'exemple' =>  $this->faker->paragraph(3),
            // 'ar_meaning' =>  $this->faker->paragraph(2),
            // 'fr_meaning' =>  $this->faker->paragraph(2),
            // 'en_meaning' =>  $this->faker->paragraph(2),
        ];
    }
}
