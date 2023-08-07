<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SupplierFactory extends Factory
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
            'short_name' => $this->faker->companySuffix,
            'code' => random_int(1000, 9999), // Cria um código aleatório de 4 dígitos
            'cnpj' => $this->faker->numerify('##############'), // Cria um CNPJ aleatório de 14 dígitos numéricos
            'status' => $this->faker->randomElement(['A', 'I']), // Escolhe aleatoriamente entre A (ativo) e I (inativo)
            'int_flag' => $this->faker->boolean, // Define um valor booleano aleatório (true ou false)
            'int_date' => $this->faker->dateTimeThisYear, // Define uma data aleatória dentro do ano atual
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

