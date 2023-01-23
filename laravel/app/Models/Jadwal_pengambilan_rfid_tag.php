<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_pengambilan_rfid_tag extends Model
{
    use HasFactory;
    protected $table = 'jadwal_pengambilan_rfid_tag';
    protected $fillable = 
            [
            'owner_name',
            'pic_nama',
            'email',
            'police_no',
            'id_rfid',
            'tanggal',
            'status',
            ];    
}
