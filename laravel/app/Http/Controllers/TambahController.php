<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Merk;
use App\Models\Kota;
use App\Models\Chassis_code;
use App\Models\PelanggaranJenis;
use App\Models\PelanggaranBentuk;

class TambahController extends Controller
{

/////////////////// merk ////////////////////////////////////

    public function merk()
    {
        $title = "merk";
        $merk = \App\Models\Merk::all();
        
        return view('tambah.merk',[
            'merk' => $merk,
            'title' => $title,
        ]);
    }

    public function createmerk(Request $request)
    {
        \App\Models\Merk::create($request->all());

        return redirect ('/merk')->with('success', 'Data berhasil ditambah');
    }

    public function editmerk($id)
    {
        $title = "merk";
        $merk = \App\Models\Merk::find($id);

        return view('tambah.merk_edit', [
            'merk' => $merk,
            'title' => $title,
        ]);
    }

    public function updatemerk(Request $request ,$id)
    {       
        $merk = \App\Models\Merk::find($id);
        $merk->update($request->all());

        return redirect ('/merk')->with('success', 'Data berhasil diupdate');
    }

    public function deletemerk($id)
    {
        $merk = \App\Models\Merk::find($id);
        $merk->delete($merk);

        return redirect('/merk');
    }

    public function statusmerk($id)
    {
        //lihat data
        $merk = \DB::table('ms_merk')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $merk->status;
        //kondisi
        if($status_sekarang == 'Aktif'){
            \DB::table('ms_merk')->where('id',$id)->update([
                'status'=>'Tidak Aktif'
            ]);
        }else{
            \DB::table('ms_merk')->where('id',$id)->update([
                'status'=>'Aktif'
            ]);
        }
        return redirect('/merk')->with('success', 'Data berhasil diupdate');
    }

/////////////////// kota ////////////////////////////////////////

    public function kota()
    {
        $title = "kota";
        $kota = \App\Models\Kota::all();
        
        return view('tambah.kota',[
            'kota' => $kota,
            'title' => $title,
        ]);
    }

    public function createkota(Request $request)
    {
        \App\Models\Kota::create($request->all());

        return redirect ('/kota')->with('success', 'Data berhasil ditambah');
    }

    public function editkota($id)
    {
        $title = "kota";
        $kota = \App\Models\Kota::find($id);

        return view('tambah.kota_edit', [
            'kota' => $kota,
            'title' => $title,
        ]);
    }

    public function updatekota(Request $request ,$id)
    {       
        $kota = \App\Models\Kota::find($id);
        $kota->update($request->all());

        return redirect ('/kota')->with('success', 'Data berhasil diupdate');
    }

    public function deletekota($id)
    {
        $kota = \App\Models\Kota::find($id);
        $kota->delete($kota);

        return redirect('/kota');
    }

    public function statuskota($id)
    {
        //lihat data
        $kota = \DB::table('ms_kota')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $kota->status;
        //kondisi
        if($status_sekarang == 'Aktif'){
            \DB::table('ms_kota')->where('id',$id)->update([
                'status'=>'Tidak Aktif'
            ]);
        }else{
            \DB::table('ms_kota')->where('id',$id)->update([
                'status'=>'Aktif'
            ]);
        }
        return redirect('/kota')->with('success', 'Data berhasil diupdate');
    }

///////////////////// chasis_code ///////////////////////////

    public function chasis_code()
    {
        $title = "chasis_code";
        $chasis_code = \App\Models\Chassis_code::all();
        
        return view('tambah.chasis_code',[
            'chasis_code' => $chasis_code,
            'title' => $title,
        ]);
    }

    public function createchasis_code(Request $request)
    {
        \App\Models\Chassis_code::create($request->all());

        return redirect ('/chasis_code')->with('success', 'Data berhasil ditambah');
    }

    public function editchasis_code($id)
    {
        $title = "chasis_code";
        $chasis_code = \App\Models\Chassis_code::find($id);

        return view('tambah.chasis_code_edit', [
            'chasis_code' => $chasis_code,
            'title' => $title,
        ]);
    }

    public function updatechasis_code(Request $request ,$id)
    {       
        $chasis_code = \App\Models\Chassis_code::find($id);
        $chasis_code->update($request->all());

        return redirect ('/chasis_code')->with('success', 'Data berhasil diupdate');
    }

    public function deletechasis_code($id)
    {
        $chasis_code = \App\Models\Chassis_code::find($id);
        $chasis_code->delete($chasis_code);

        return redirect('/chasis_code');
    }

    public function statuschasis_code($id)
    {
        //lihat data
        $chasis_code = \DB::table('ms_chassis_code')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $chasis_code->status;
        //kondisi
        if($status_sekarang == 'Aktif'){
            \DB::table('ms_chassis_code')->where('id',$id)->update([
                'status'=>'Tidak Aktif'
            ]);
        }else{
            \DB::table('ms_chassis_code')->where('id',$id)->update([
                'status'=>'Aktif'
            ]);
        }
        return redirect('/chasis_code')->with('success', 'Data berhasil diupdate');
    }

////////////////// materi_ujian //////////////////////////////////

    public function materi_ujian()
    {
        $title = "materi_ujian";
        $materi_ujian = \App\Models\Materi_ujian::all();
        
        return view('tambah.materi_ujian',[
            'title' => $title,
            'materi_ujian' => $materi_ujian
        ]);
    }

    public function createmateri_ujian(Request $request)
    {
        \App\Models\Materi_ujian::create($request->all());

        return redirect ('/materi_ujian')->with('success', 'Data berhasil ditambah');
    }

    public function editmateri_ujian($id)
    {
        $title = "materi_ujian";
        $materi_ujian = \App\Models\Materi_ujian::find($id);

        return view('tambah.materi_ujian_edit', [
            'title' => $title,
            'materi_ujian' => $materi_ujian
        ]);
    }

    public function updatemateri_ujian(Request $request ,$id)
    {       
        $materi_ujian = \App\Models\Materi_ujian::find($id);
        $materi_ujian->update($request->all());

        return redirect ('/materi_ujian')->with('success', 'Data berhasil diupdate');
    }

    public function deletemateri_ujian($id)
    {
        $materi_ujian = \App\Models\Materi_ujian::find($id);
        $materi_ujian->delete($materi_ujian);

        return redirect('/materi_ujian')->with('success', 'Data berhasil dihapus');
    }

    public function statusmateri_ujian($id)
    {
        //lihat data
        $materi_ujian = \DB::table('materi_ujians')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $materi_ujian->status;
        //kondisi
        if($status_sekarang == 'Aktif'){
            \DB::table('materi_ujians')->where('id',$id)->update([
                'status'=>'Tidak Aktif'
            ]);
        }else{
            \DB::table('materi_ujians')->where('id',$id)->update([
                'status'=>'Aktif'
            ]);
        }
        return redirect('/materi_ujian')->with('success', 'Data berhasil diupdate');
    }

/////////////////// jenis_pelanggaran ///////////////////////////
    public function jenis_pelanggaran()
    {
        $title = "jenis_pelanggaran";
        $jenis_pelanggaran = \App\Models\PelanggaranJenis::all();
        
        return view('tambah.jenis_pelanggaran',[
            'title' => $title,
            'jenis_pelanggaran' => $jenis_pelanggaran
        ]);
    }

    public function createjenis_pelanggaran(Request $request)
    {
        \App\Models\PelanggaranJenis::create($request->all());

        return redirect ('/jenis_pelanggaran')->with('success', 'Data berhasil ditambah');
    }

    public function editjenis_pelanggaran($id)
    {
        $title = "jenis_pelanggaran";
        $jenis_pelanggaran = \App\Models\PelanggaranJenis::find($id);

        return view('tambah.jenis_pelanggaran_edit', [
            'title' => $title,
            'jenis_pelanggaran' => $jenis_pelanggaran
        ]);
    }

    public function updatejenis_pelanggaran(Request $request ,$id)
    {       
        $jenis_pelanggaran = \App\Models\PelanggaranJenis::find($id);
        $jenis_pelanggaran->update($request->all());

        return redirect ('/jenis_pelanggaran')->with('success', 'Data berhasil diupdate');
    }

    public function deletejenis_pelanggaran($id)
    {
        $jenis_pelanggaran = \App\Models\PelanggaranJenis::find($id);
        $jenis_pelanggaran->delete($jenis_pelanggaran);

        return redirect('/jenis_pelanggaran')->with('success', 'Data berhasil dihapus');
    }

    public function statusjenis_pelanggaran($id)
    {
        //lihat data
        $jenis_pelanggaran = \DB::table('ms_jenis_pelanggaran')->where('jenis_pelanggaran',$id)->first();
        //lihat status sekarang
        $status_sekarang = $jenis_pelanggaran->status;
        //kondisi
        if($status_sekarang == 'Aktif'){
            \DB::table('ms_jenis_pelanggaran')->where('jenis_pelanggaran',$id)->update([
                'status'=>'Tidak Aktif'
            ]);
        }else{
            \DB::table('ms_jenis_pelanggaran')->where('jenis_pelanggaran',$id)->update([
                'status'=>'Aktif'
            ]);
        }
        // \Session::flash('success','Status berhasil di update');
        return redirect('/jenis_pelanggaran')->with('success', 'Data berhasil diupdate');
    }

//////////////////// bentuk_pelanggaran ///////////////////////

    public function bentuk_pelanggaran()
    {
        $title = "bentuk_pelanggaran";
        $bentuk_pelanggaran = \App\Models\PelanggaranBentuk::all();
        $jenis_pelanggaran = \App\Models\PelanggaranJenis::all()->where('status', 'Aktif');

        // $jenis_pelanggaran =  DB::select('select
        //     `jenis_pelanggaran`,`status`
        //     FROM `ms_jenis_pelanggaran` 
        //     WHERE `status`="Aktif"
        //     ');
        
        return view('tambah.bentuk_pelanggaran',[
            'title' => $title,
            'bentuk_pelanggaran' => $bentuk_pelanggaran,
            'jenis_pelanggaran' => $jenis_pelanggaran
        ]);
    }

    public function createbentuk_pelanggaran(Request $request)
    {
        \App\Models\PelanggaranBentuk::create($request->all());

        return redirect ('/bentuk_pelanggaran')->with('success', 'Data berhasil ditambah');
    }

    public function editbentuk_pelanggaran($id)
    {
        $title = "bentuk_pelanggaran";
        $bentuk_pelanggaran = \App\Models\PelanggaranBentuk::find($id);
        $jenis_pelanggaran = \App\Models\PelanggaranJenis::all()->where('status', 'Aktif');

        return view('tambah.bentuk_pelanggaran_edit', [
            'title' => $title,
            'bentuk_pelanggaran' => $bentuk_pelanggaran,
            'jenis_pelanggaran' => $jenis_pelanggaran
        ]);
    }

    public function updatebentuk_pelanggaran(Request $request ,$id)
    {       
        $bentuk_pelanggaran = \App\Models\PelanggaranBentuk::find($id);
        $bentuk_pelanggaran->update($request->all());

        return redirect ('/bentuk_pelanggaran')->with('success', 'Data berhasil diupdate');
    }

    public function deletebentuk_pelanggaran($id)
    {
        $bentuk_pelanggaran = \App\Models\PelanggaranBentuk::find($id);
        $bentuk_pelanggaran->delete($bentuk_pelanggaran);

        return redirect('/bentuk_pelanggaran')->with('success', 'Data berhasil dihapus');
    }

    public function statusbentuk_pelanggaran($id)
    {
        //lihat data
        $bentuk_pelanggaran = \DB::table('ms_bentuk_pelanggaran')->where('bentuk_pelanggaran',$id)->first();
        //lihat status sekarang
        $status_sekarang = $bentuk_pelanggaran->status;
        //kondisi
        if($status_sekarang == 'Aktif'){
            \DB::table('ms_bentuk_pelanggaran')->where('bentuk_pelanggaran',$id)->update([
                'status'=>'Tidak Aktif'
            ]);
        }else{
            \DB::table('ms_bentuk_pelanggaran')->where('bentuk_pelanggaran',$id)->update([
                'status'=>'Aktif'
            ]);
        }
        // \Session::flash('success','Status berhasil di update');
        return redirect('/bentuk_pelanggaran')->with('success', 'Data berhasil diupdate');
    }

}
