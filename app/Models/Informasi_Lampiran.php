<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi_Lampiran extends Model
{
    use HasFactory;
    protected $table = 'informasi_lampiran';
    protected $fillable = ['id_pengajuan','nama_lampiran','file_lampiran'];
}