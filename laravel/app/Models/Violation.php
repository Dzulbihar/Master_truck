<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Violation extends Model
{
    use HasFactory;
    protected $table = 'violations';
    protected $fillable = 
            [
            'driver_id',
            'nama_perusahaan',
            'nama_driver',

            'bentuk_pelanggaran',
            'jenis_pelanggaran',
            'alasan',
            'kapan',
            'dimana',

            'jumlah_kejadian',
            'pelanggaran',

            'foto',
            'police_no',
            ];

    public function get_kapan()
    {
        return Carbon::parse($this->attributes['kapan'])
        ->translatedFormat('l, d F Y, H:i:s');
    }

    public function kapan_tgl()
    {
        return Carbon::parse($this->attributes['kapan'])
        ->translatedFormat('d F Y');
    }

    public function getFoto()
    {
        if(!$this->foto){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->foto);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

}
