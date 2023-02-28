<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi_Perpajakan extends Model
{
    use HasFactory;
    protected $table = 'informasi_perpajakan';
    protected $fillable = ['id_pengajuan', 'id_jenis_pajak', 'status_pajak'];
}