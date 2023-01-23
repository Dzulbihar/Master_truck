<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses_ujian extends Model
{
    use HasFactory;
    protected $table = 'proses_ujians';
    protected $fillable = 
            [
            'id',
            'driver_id',
            'nomor',
            'jawaban_text',
            'jawaban_file',
            ];


    public function getjawabanfile()
    {
        if(!$this->jawaban_file){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->jawaban_file);
    }

    //////////////////////////////////////////////////////////

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    
}
