<?php

namespace App\Exports;

use App\Models\Truck;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TruckExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return [
            "Status",                   

            "Nama Perusahaan",
            "Nama PIC",                 
            "Email",  

            "Site id",                  
            
            "Nomor Polisi", 
            "Nomor STNK",
            "Nomor Mesin",
            "Nomor Rangka",
            "Tanggal berlaku STNK",                        
            "Foto STNK",                

            "Merk Truk",
            "Tahun pembuatan",
            "Kota",

            "Berat Truk",
            "Foto Truk",               
            "Foto KIR Truk",           

            "Kode Chasis",
            "Jenis Chasis",       
            "Berat Chasis",           
            "Foto Chasis",        
            "Foto KIR Chasis",    

            "Nomor Gerbang",
            "Bahan Bakar Gas",
            "Truck Internal",
            "RFID",

            "Alasan Blokir",
            "Tanggal Pengajuan",
            "Tanggal Setujui",
            "Nama Setujui",
            
            "created_at",
            "updated_at",

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Truck::select(
            'status',                   

            'owner_name',
            'pic_nama',                 
            'email',                    

            'site_id',

            'police_no', 
            'stnk_no',
            'machine_no',
            'design_no',
            'expired_lisence',                        
            'foto_stnk',                

            'trade_mark',
            'year_made',
            'state',

            'truck_weight',
            'foto_truck',               
            'foto_kir_truck',           

            'chassis_code',
            'jenis_chassis',       
            'chassis_weight',           
            'foto_chassis',        
            'foto_kir_chassis',    

            'gate_no',
            'bbg_yn',
            'otl_yn',
            'id_rfid',

            'alasan_blokir',
            'tanggal_pengajuan',
            'tanggal_setujui',
            'nama_setujui',

            'created_at',
            'updated_at',


        )->get();
    }
} 