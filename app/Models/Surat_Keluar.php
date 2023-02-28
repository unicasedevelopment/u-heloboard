<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_Keluar extends Model
{
    use HasFactory;
    protected $table='surat_keluar';
    protected $fillable=['no_arsip','tgl_dikirim','tgl_surat','no_surat','penerima','resume','keterangan','file_surat','id_jenis','id_divisi'];
}