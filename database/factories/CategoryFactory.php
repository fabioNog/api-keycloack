<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => null, // Pode ser definido posteriormente de acordo com a lógica da sua aplicação
            'name' => $this->faker->word,
            'is_active' => $this->faker->boolean, // Define um valor booleano aleatório (true ou false)
            'position' => random_int(1, 100), // Posição aleatória entre 1 e 100
            'level' => 0, // Nível padrão como 0
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'tree' => null, // Pode ser definido posteriormente de acordo com a lógica da sua aplicação
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
