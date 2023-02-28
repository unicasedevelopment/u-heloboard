<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPK extends Model
{
    use HasFactory;
    protected $table = 'spk';
    protected $fillable = ['no_spk','jenis_perintah','nama_lengkap','divisi','jabatan','deadline','detail','ttd','file_fpk'];
}