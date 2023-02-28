<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_FPK extends Model
{
    use HasFactory;
    protected $table = 'file_fpk';
    protected $fillable = ['id_fpk', 'nama_file'];
}