<?php

namespace Database\Seeders;
use App\Models\Surat_Masuk;
use App\Models\Surat_Keluar;
use App\Models\Jenis_Surat;
use App\Models\Divisi;
use App\Models\Tamu;
use Database\Factories\Surat_MasukFactory;
use Database\Factories\Surat_KeluarFactory;
use Database\Factories\TamuFactory;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Surat_Masuk::factory(50)->create();
        // Surat_Keluar::factory(50)->create();
        // Tamu::factory(50)->create();

        Jenis_Surat::create([
            'kode_jenis' => 'SP',
            'nama_jenis' => 'Surat Peringatan',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SKU',
            'nama_jenis' => 'Surat Kuasa',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SKet',
            'nama_jenis' => 'Surat Keterangan',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SUP',
            'nama_jenis' => 'Surat Pernyataan',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SC',
            'nama_jenis' => 'Surat Cuti',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SPM',
            'nama_jenis' => 'Surat Pemberitahuan',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SPen',
            'nama_jenis' => 'Surat Pengantar',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SPh',
            'nama_jenis' => 'Surat Permohonan',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'PK',
            'nama_jenis' => 'Perjanjian Kerja',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'BA',
            'nama_jenis' => 'Berita Acara',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SJ',
            'nama_jenis' => 'Surat Jalan',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'SPK',
            'nama_jenis' => 'Surat Perintah Kerja',
        ]);
        Jenis_Surat::create([
            'kode_jenis' => 'ST',
            'nama_jenis' => 'Surat Tugas',
        ]);

        Divisi::create([
            'kode_divisi' => 'DIR',
            'nama_divisi' => 'Direktur',
        ]);
        Divisi::create([
            'kode_divisi' => 'HR',
            'nama_divisi' => 'HRG & GA',
        ]);
        Divisi::create([
            'kode_divisi' => 'FN',
            'nama_divisi' => 'Finance',
        ]);
        Divisi::create([
            'kode_divisi' => 'SUP',
            'nama_divisi' => 'Support',
        ]);
        Divisi::create([
            'kode_divisi' => 'CSO',
            'nama_divisi' => 'Customer Service online',
        ]);
        Divisi::create([
            'kode_divisi' => 'WH',
            'nama_divisi' => 'Warehouse',
        ]);
        Divisi::create([
            'kode_divisi' => 'SA',
            'nama_divisi' => 'Sales',
        ]);
        Divisi::create([
            'kode_divisi' => 'CB',
            'nama_divisi' => 'Creative Branding',
        ]);
        Divisi::create([
            'kode_divisi' => 'RD',
            'nama_divisi' => 'Retail Development',
        ]);






        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'username' => 'admin',
        //     'password' => 'admin123'
        // ]);

        // $role = Role::create(['name' => 'admin']);

        // $permissions = Permission::pluck('id','id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}