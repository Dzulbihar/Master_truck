<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelanggaranBentuk extends Model
{
    use HasFactory;
    protected $table = 'ms_bentuk_pelanggaran';
    protected $fillable = [
        'bentuk_pelanggaran',
        'bentuk_jenis',
        'status'
    ];
    protected $primaryKey = 'bentuk_pelanggaran';
    public $incrementing = false;
    protected $keyType = 'string';
}
