<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level_Pengajuan_Dana extends Model
{
    use HasFactory;
    protected $table = 'level_pengajuan_dana';
    protected $fillable = ['level'];
    public function pengajuan_danas()
    {
        return $this->hasMany('App\Models\Pengajuan_Dana','status_pengajuan');
    }
}