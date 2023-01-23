<?php

namespace App\Exports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DriverExport implements FromCollection, WithCustomCsvSettings, WithHeadings
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

            "Nama",
            "NIK",
            "Tanggal lahir",
            "Jenis kelamin",
            
            "Alamat",
            "HP 1",
            "HP 2",
            "Phone",
            "Fax",
            "Mobile",
            "Keterangan",

            // "id_license",
            "Nomor SIM",
            "Tanggal berlaku SIM",
            "Display Cust",
            "Done",
            // "done_date",
            // "ins_date",

            // "id_rfid",
            // "statement_form",

            "SIM",
            "KTP",
            "Foto",

            "created_at",
            "updated_at",

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Driver::select(

            'status',

            'owner_name',
            'pic_nama',
            'email',

            'site_id',

            'name',
            'nik',
            'birthday',
            'gender',

            'addr',
            'hp1',
            'hp2',
            'phone',
            'fax',
            'mobile',
            'remaks',
            
            // 'id_license',
            'drive_license',
            'valid_date',
            'display_cust',
            'done',
            // 'done_date',
            // 'ins_date',
            
            // 'id_rfid',
            // 'statement_form',

            'file_SIM',
            'file_KTP',
            'file_foto',
            
            'created_at',
            'updated_at',

        )->get();
    }
} 