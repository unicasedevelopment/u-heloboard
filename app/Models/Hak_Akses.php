<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hak_Akses extends Model
{
    use HasFactory;
    protected $table = 'hak_akses';
    protected $fillable = ['hak_akses'];
}