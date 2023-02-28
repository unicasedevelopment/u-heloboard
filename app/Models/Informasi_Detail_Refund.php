<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi_Detail_Refund extends Model
{
    use HasFactory;
    protected $table = 'informasi_detail_refund';
    protected $fillable = [
        'id_pengajuan',
        'no_invoice',
        'no_retur',
        'alasan_refund',
        'no_inv_pengganti',
        'pilihan_cashback',
        'barcode_barang'
    ];
}