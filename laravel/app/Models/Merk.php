<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;
    protected $table = 'ms_merk';
    protected $fillable = 
            [
            'kode_item',
            'keterangan',
            'status'
            ];
}
