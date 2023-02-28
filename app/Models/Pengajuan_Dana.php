<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_Dana extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_dana';
    protected $fillable = [
        'no_surat',
        'tgl_pengajuan',
        'id_kategori',
        'id_creator',
        'id_divisi',
        'status_approval_1',
        'status_approval_2',
        'keperluan',
        'status_pengajuan',
        'status_pemrosesan',
        'status_validasi'
    ];

    public function levels()
    {
        return $this->belongsTo('App\Models\Level_Pengajuan_Dana','status_pengajuan');
    }

    public function kategories()
    {
        return $this->belongsTo('App\Models\Kategori_Dana','id_kategori');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\User','id_creator');
    }

    public function dokumen_pengajuans()
    {
        return $this->hasOne('App\Models\Dokumen_Pengajuan','id_pengajuan');
    }

    public function informasi_lampirans()
    {
        return $this->hasOne('App\Models\Informasi_Lampiran','id_pengajuan');
    }

    public function informasi_pembayarans()
    {
        return $this->hasOne('App\Models\Informasi_Pembayaran','id_pengajuan');
    }

    public function informasi_perpajakans()
    {
        return $this->hasOne('App\Models\Informasi_Perpajakan','id_pengajuan');
    }

}