<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval_1_Pengajuan_Dana extends Model
{
    use HasFactory;

    protected $table = 'approval_1_pengajuan_dana';
    protected $fillable = ['id_user','id_approval'];

    // public function approvals()
    // {
    //     return $this->belongsToMany('App\Models\User','id_approvals');
    // }
}