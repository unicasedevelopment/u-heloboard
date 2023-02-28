<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen_Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'dokumen_pengajuan';
    protected $fillable = ['id_pengajuan','nik','npwp','file_ktp','file_npwp','file_invoice'];
}