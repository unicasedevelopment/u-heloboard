<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hak_Akses_Permission extends Model
{
    use HasFactory;
    protected $table = 'hak_akses_permission';
    protected $fillable = ['id_user','id_hak_akses'];

}