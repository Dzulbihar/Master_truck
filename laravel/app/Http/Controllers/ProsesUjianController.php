<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Driver;

use App\Models\WA_jadwal_ujian;
use App\Models\Materi_ujian;
use App\Models\Proses_ujian;

use DB;

class ProsesUjianController extends Controller
{

    public function kirim_materi_ujian($id)
    {
        $title = "master_driver";
        $company = \App\Models\Company::find($id);
        $driver = \App\Models\Driver::find($id);

        $materi_ujians = \App\Models\Materi_ujian::all();
        $proses_ujians = \App\Models\Proses_ujian::where('driver_id',$id)->get();
        
        return view('master_driver.proses_ujian.kirim_materi_ujian', [
            'title' => $title,
            'company' => $company,
            'driver' => $driver,
            'materi_ujians' => $materi_ujians,
            'proses_ujians' => $proses_ujians,
        ]);
    }

    public function nilai_ujian(Request $request ,$id)
    {       
        $company = \App\Models\Company::find($id);

        $driver = \App\Models\Driver::find($id);
        $driver->update($request->all());

        return redirect ('kirim_materi_ujian/'.$id.'/kirim_materi_ujian')->with('sukses', 'Nilai Ujian Driver berhasil disimpan');
    }

    public function konfirmasi_kelulusan(Request $request, $id)
    {
        $driver = \App\Models\Driver::find($id);
        //lihat data
        $driver = \DB::table('driver')->where('id',$id)->first();//lihat status sekarang
        $status_sekarang = $driver->nilai_ujian;
        //kondisi
        if($status_sekarang >= '70' ){
            \DB::table('driver')->where('id',$id)->update([
                'lulus_ujian'=>'Lulus Ujian'
            ]);
        }else{
            \DB::table('driver')->where('id',$id)->update([
                'lulus_ujian'=>'Tidak Lulus Ujian'
            ]);
        }

        return redirect('kirim_materi_ujian/'.$id.'/kirim_materi_ujian')->with('sukses', 'Nilai Ujian berhasil dikonfirmasi');
    }

}
