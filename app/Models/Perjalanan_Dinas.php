<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjalanan_Dinas extends Model
{
    use HasFactory;
    protected $table = 'perjalanan_dinas';
    protected $fillable = [
        'no_surat',
        'no_surat_tugas',
        'nama',
        'nik',
        'jabatan',
        'departemen',
        'provider',
        'norek',
        'tujuan',
        'durasi_hari',
        'durasi_malam',
        'lokasi_keberangkatan',
        'tgl_keberangkatan',
        'transportasi_keberangkatan',
        'lokasi_kedatangan',
        'tgl_kedatangan',
        'transportasi_kedatangan',
        'jam_keberangkatan',
        'jam_kedatangan',
        'area',
        'durasi',
        'konsumsi',
        'uang_saku',
        'uang_transportasi',
        'catatan_tambahan',
        'ttd_pemohon',
        'file_pengajuan'
    ];
}