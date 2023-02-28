<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat_Keluar>
 */
class Surat_KeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tgl_dikirim' => $this->faker->date(),
            'tgl_surat' => $this->faker->date(),
            'penerima' => $this->faker->name(),
            'no_surat' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'resume' => $this->faker->paragraph(),
            'keterangan' => $this->faker->sentence(),
            'file_surat' => 'test',
        ];
    }
}