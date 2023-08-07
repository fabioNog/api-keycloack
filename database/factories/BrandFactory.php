<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'int_flag' => $this->faker->boolean, // Define um valor booleano aleatório (true ou false)
            'int_date' => $this->faker->dateTimeThisYear, // Define uma data aleatória dentro do ano atual
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
