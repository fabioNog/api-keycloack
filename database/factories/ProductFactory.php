<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_id' => random_int(1, 100),
            'brand_id' => random_int(1, 50),
            'category_id' => random_int(1, 20),
            'sku' => Str::random(14), // Cria um SKU aleatório de 14 caracteres
            'name' => $this->faker->sentence(4), // Cria um nome fictício com 4 palavras
            'slug' => $this->faker->slug, // Cria um slug aleatório
            'description' => $this->faker->paragraph,
            'body' => $this->faker->text,
            'intellibrand_description' => $this->faker->paragraph,
            'intellibrand_title' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'image' => $this->faker->imageUrl,
            'images' => json_encode([
                $this->faker->imageUrl,
                $this->faker->imageUrl,
                $this->faker->imageUrl,
            ]),
            'omnik_id' => Str::random(20), // Cria um ID aleatório de 20 caracteres
            'code' => random_int(1000, 9999), // Cria um código aleatório de 4 dígitos
            'label' => $this->faker->word,
            'seqfornecedor' => $this->faker->unique()->regexify('[A-Za-z0-9]{45}'), // Cria uma sequência aleatória de 45 caracteres alfanuméricos
            'ddv_exception' => $this->faker->randomElement(['A', 'B', 'C']), // Escolhe aleatoriamente entre A, B ou C
            'lett_payload' => $this->faker->word,
            'lett_title' => $this->faker->sentence,
            'lett_description' => $this->faker->text,
            'package_type' => $this->faker->randomElement(['box', 'bag', 'container']),
            'package_volume' => $this->faker->randomFloat(2, 0.1, 100), // Cria um valor de volume aleatório com duas casas decimais entre 0.1 e 100
        ];
    }
}
