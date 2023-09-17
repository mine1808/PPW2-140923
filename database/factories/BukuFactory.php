<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->title(),
            'penulis' => $this->faker->name(),
            'harga'=> $this->faker->numberbetween(10000, 100000),
            'tgl_terbit' => $this->faker->date(),
        ];
    }
}
