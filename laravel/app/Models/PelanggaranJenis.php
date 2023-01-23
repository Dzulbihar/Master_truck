<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelanggaranJenis extends Model
{
    use HasFactory;
    protected $table = 'ms_jenis_pelanggaran';
    protected $fillable = [
        'jenis_pelanggaran',
        'status',
    ];
    protected $primaryKey = 'jenis_pelanggaran';
    public $incrementing = false;
    protected $keyType = 'string';
}
