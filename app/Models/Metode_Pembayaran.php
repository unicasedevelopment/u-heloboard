<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode_Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'metode_pembayaran';
    protected $fillable = ['nama_metode'];
}