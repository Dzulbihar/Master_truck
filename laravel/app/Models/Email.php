<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'ms_email';
    protected $fillable = 
            [
            'alamat_email_admin',
            'nama_pengirim_admin',
                        
            'subjek_rfid_tag',
            'header_rfid_tag',
            'body_1_rfid_tag',
            'body_2_rfid_tag',
            'footer_rfid_tag',

            'subjek_jadwal_ujian',
            'header_jadwal_ujian',
            'body_1_jadwal_ujian',
            'body_2_jadwal_ujian',
            'footer_jadwal_ujian',            
    //////////////////////////////////////////////////////////////////
            'subjek_user_daftar',
            'header_user_daftar',
            'body_1_user_daftar',
            'body_2_user_daftar',
            'footer_user_daftar',

            'subjek_user_aktif',
            'header_user_aktif',
            'body_1_user_aktif',
            'body_2_user_aktif',
            'footer_user_aktif',

            'subjek_user_tidak_aktif',
            'header_user_tidak_aktif',
            'body_1_user_tidak_aktif',
            'body_2_user_tidak_aktif',
            'footer_user_tidak_aktif',

            'subjek_user_block',
            'header_user_block',
            'body_1_user_block',
            'body_2_user_block',
            'footer_user_block',

            'subjek_user_unblock',
            'header_user_unblock',
            'body_1_user_unblock',
            'body_2_user_unblock',
            'footer_user_unblock',
    //////////////////////////////////////////////////////////////////
            'subjek_truck_daftar',
            'header_truck_daftar',
            'body_1_truck_daftar',
            'body_2_truck_daftar',
            'footer_truck_daftar',

            'subjek_truck_approve',
            'header_truck_approve',
            'body_1_truck_approve',
            'body_2_truck_approve',
            'footer_truck_approve',

            'subjek_truck_reject',
            'header_truck_reject',
            'body_1_truck_reject',
            'body_2_truck_reject',
            'footer_truck_reject',

            'subjek_truck_delete',
            'header_truck_delete',
            'body_1_truck_delete',
            'body_2_truck_delete',
            'footer_truck_delete',

            'subjek_truck_block',
            'header_truck_block',
            'body_1_truck_block',
            'body_2_truck_block',
            'footer_truck_block',

            'subjek_truck_unblock',
            'header_truck_unblock',
            'body_1_truck_unblock',
            'body_2_truck_unblock',
            'footer_truck_unblock',
    //////////////////////////////////////////////////////////////////
            'subjek_driver_daftar',
            'header_driver_daftar',
            'body_1_driver_daftar',
            'body_2_driver_daftar',
            'footer_driver_daftar',

            'subjek_driver_approve',
            'header_driver_approve',
            'body_1_driver_approve',
            'body_2_driver_approve',
            'footer_driver_approve',

            'subjek_driver_reject',
            'header_driver_reject',
            'body_1_driver_reject',
            'body_2_driver_reject',
            'footer_driver_reject',

            'subjek_driver_delete',
            'header_driver_delete',
            'body_1_driver_delete',
            'body_2_driver_delete',
            'footer_driver_delete',

            'subjek_driver_block',
            'header_driver_block',
            'body_1_driver_block',
            'body_2_driver_block',
            'footer_driver_block',

            'subjek_driver_unblock',
            'header_driver_unblock',
            'body_1_driver_unblock',
            'body_2_driver_unblock',
            'footer_driver_unblock',

            ];

}
