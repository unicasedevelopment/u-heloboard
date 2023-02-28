<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Surat extends Model
{
    use HasFactory;
    protected $table = 'jenis_surat';
    protected $fillable = ['kode_jenis','nama_jenis'];
}