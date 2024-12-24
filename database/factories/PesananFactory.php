<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word,
            'jenis' => $this->faker->randomElement(['gantungan kunci - ukki', 'jersey - ukm badminton']),
            'jumlahParfum' => $this->faker->randomNumber(2),
            'harga' => $this->faker->randomNumber(4),
        ];
    }
}
