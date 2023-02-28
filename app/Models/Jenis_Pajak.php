<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Pajak extends Model
{
    use HasFactory;
    protected $table = 'jenis_pajak';
    protected $fillable = ['nama_pajak','persentase','keterangan'];
}