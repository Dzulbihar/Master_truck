<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi_ujian extends Model
{
    use HasFactory;
    protected $table = 'materi_ujians';
    protected $fillable = 
            [
            'id',
            'nama_pertanyaan',
            'nama_pertanyaan',
            'isi_pertanyaan',
            'lampiran',
            'status'
            ];
}
