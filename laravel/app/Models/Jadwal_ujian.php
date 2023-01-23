<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_ujian extends Model
{
    use HasFactory;
    protected $table = 'jadwal_ujian';
    protected $fillable = 
            [
            'owner_name',
            'pic_nama',
            'email',
            'name',
            'drive_license',
            'tanggal',
            'status',
            ];
}