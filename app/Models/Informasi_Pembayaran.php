<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi_Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'informasi_pembayaran';
    protected $fillable = ['id_pengajuan','jenis_vendor','id_metode','provider','no_payment','penerima','nominal_inv','nominal_trf','jenis_pajak'];
}