<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Slang;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\slang>
 */
class SlangFactory extends Factory
{
  /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug()
        ];
    }
}
