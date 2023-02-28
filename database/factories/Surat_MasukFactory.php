<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Surat_MasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_arsip' => $this->faker->numerify('ARS-####'),
            'tgl_diterima' => $this->faker->date(),
            'tgl_surat' => $this->faker->date(),
            'pengirim' => $this->faker->name(),
            'no_surat' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'resume' => $this->faker->paragraph(),
            'keterangan' => $this->faker->sentence(),
            'file_surat' => 'test',
        ];
    }
}