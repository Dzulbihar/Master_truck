<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'driver';
    protected $fillable = 
            [
            'id_customer',

            'company_id',
            'status',

            'owner_name',
            'email',
            'pic_nama',

            'site_id',

            'name',
            'addr',
            'phone',
            'fax',
            'mobile',
            'hp1',
            'hp2',

            'id_license',
            'drive_license',

            'valid_date',
            'display_cust',
            'done',
            'done_date',
            'ins_date',
            
            'nik',
            'birthday',
            'gender',
            'remaks',

            'id_rfid',
            
            'statement_form',
            'file_sim',
            'file_ktp',
            'file_foto',

            'sudah_ujian',
            'lulus_ujian',
            'nilai_ujian',
            
            'alasan_blokir',
            'tanggal_blokir',
            'nama_blokir',
            'tanggal_pengajuan',
            'tanggal_setujui',
            'nama_setujui',
            
            ];


    public function get_tanggal_pengajuan()
    {
        return Carbon::parse($this->attributes['tanggal_pengajuan'])
        ->translatedFormat('l, d F Y, H:i:s');
    }

    public function get_tanggal_setujui()
    {
        return Carbon::parse($this->attributes['tanggal_setujui'])
        ->translatedFormat('l, d F Y, H:i:s');
    }

    public function get_tanggal_blokir()
    {
        return Carbon::parse($this->attributes['tanggal_blokir'])
        ->translatedFormat('l, d F Y, H:i:s');
    }

    public function valid_date()
    {
        return Carbon::parse($this->attributes['valid_date'])
        ->translatedFormat('l, d F Y');
    }

    public function ins_date()
    {
        return Carbon::parse($this->attributes['ins_date'])
        ->translatedFormat('l, d F Y');
    }

    public function birthday()
    {
        return Carbon::parse($this->attributes['birthday'])
        ->translatedFormat('l, d F Y');
    }

    public function created_at()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
    }
    //////////////////////////////////

    public function get_statement_form()
    {
        if(!$this->statement_form){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->statement_form);
    }

    public function get_file_sim()
    {
        if(!$this->file_sim){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->file_sim);
    }

    public function get_file_ktp()
    {
        if(!$this->file_ktp){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->file_ktp);
    }

    public function get_file_foto()
    {
        if(!$this->file_foto){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->file_foto);
    }



    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function violation()
    {
        return $this->hasMany(violation::class);
    }

    public function proses_ujian()
    {
        return $this->hasMany(Proses_ujian::class);
    }

}
