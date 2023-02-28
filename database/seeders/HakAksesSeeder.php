<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hak_Akses;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Hak_Akses::create([
            'hak_akses' => 'submit pengajuan dana',
        ]);
        Hak_Akses::create([
            'hak_akses' => 'approval 1 pengajuan dana',
        ]);
        Hak_Akses::create([
            'hak_akses' => 'approval 2 pengajuan dana',
        ]);
        Hak_Akses::create([
            'hak_akses' => 'proses pengajuan dana',
        ]);
        Hak_Akses::create([
            'hak_akses' => 'validasi pengajuan dana',
        ]);
    }
}