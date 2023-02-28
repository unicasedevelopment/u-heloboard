<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Dana extends Model
{
    use HasFactory;
    protected $table = 'kategori_pengajuan_dana';
    protected $fillable = ['nama_kategori'];
    public function pengajuan_danas()
    {
        return $this->hasMany('App\Models\Pengajuan_Dana','id_kategori');
    }
}