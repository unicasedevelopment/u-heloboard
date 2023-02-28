<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tamu>
 */
class TamuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_tamu' => $this->faker->name(),
            'penerima_tamu' => $this->faker->name(),
            'no_hp' => $this->faker->phoneNumber(),
            'nama_perusahaan' => $this->faker->company(),
            'tgl_kunjungan' => $this->faker->date(),
            'keperluan' => $this->faker->sentence(),

        ];
    }
}