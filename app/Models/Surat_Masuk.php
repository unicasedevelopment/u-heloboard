<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_Masuk extends Model
{
    use HasFactory;
    protected $table='surat_masuk';
    protected $fillable=['no_arsip','tgl_diterima','tgl_surat','no_surat','pengirim','resume','keterangan','file_surat'];
    // public function sub_divisions()
    // {
    //     return $this->belongsTo('App\Models\Sub_Divisi','id_sub_divisi');
    // }
    // public function penilaians()
    // {
    //     return $this->hasMany('App\Models\Penilaian','id_karyawan');
    // }
}