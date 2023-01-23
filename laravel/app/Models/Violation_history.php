<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Violation_history extends Model
{
    use HasFactory;
    protected $table = 'violations_history';
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

    public function getFoto()
    {
        if(!$this->foto){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->foto);
    }    

    public function get_created_at()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
    }

}
