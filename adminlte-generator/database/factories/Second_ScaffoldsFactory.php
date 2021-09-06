<?php

namespace Database\Factories;

use App\Models\Second_Scaffolds;
use Illuminate\Database\Eloquent\Factories\Factory;

class Second_ScaffoldsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Second_Scaffolds::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'School' => $this->faker->word,
        'Year' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
