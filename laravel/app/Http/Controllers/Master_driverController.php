<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Company;
use App\Models\Driver;
use App\Models\Driver_history;
use Auth;
use PDF;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;
use App\Models\Jadwal_ujian;
use App\Models\Violation;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DriverExport;

class Master_driverController extends Controller
{
    public function index()
    {
        $title = "master_driver";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();
        $drivers = \App\Models\Driver::orderBy('status', 'ASC')->get();
        // $drivers = \App\Models\Driver::all()->where('status', !0); //selain 0

        return view('master_driver.index',
            [
            'title' => $title,
            'drivers' => $drivers,
            'user' => $user,
            'company' => $company, 
        ]);
    }

    public function cari(Request $request)
    {
        $title = "master_driver";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $drivers = DB::table('driver')
        ->where('STATUS','like',"%".$cari."%")
        ->paginate();

        // mengirim data pegawai ke view index
        return view('master_driver.index',
            [
            'title' => $title,
            'drivers' => $drivers,
            'user' => $user,
            'company' => $company, 
        ]);
    }

    public function status_approve_master_driver(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        //lihat data
        $driver = \DB::table('driver')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $driver->status;
        //kondisi
        if($status_sekarang == 'Proses Pengajuan'){
            \DB::table('driver')->where('id',$id)->update([
                'status'=>'Sudah Disetujui'
            ]);
        }

        $driver = \App\Models\Driver::find($id);
        $login = Auth::user()->owner_name;
        $driver->nama_setujui = $login;
        $driver->tanggal_setujui = Carbon::now();
        $driver->update($request->all());

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_driver_approve = $email->subjek_driver_approve;
            $header_driver_approve = $email->header_driver_approve;
            $body_1_driver_approve = $email->body_1_driver_approve;
            $body_2_driver_approve = $email->body_2_driver_approve;
            $footer_driver_approve = $email->footer_driver_approve;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_driver_approve' => $header_driver_approve,
                'body_1_driver_approve' => $body_1_driver_approve,
                'body_2_driver_approve' => $body_2_driver_approve,
                'footer_driver_approve' => $footer_driver_approve,
            );

            $driver = \App\Models\Driver::find($id);
            Mail::send('emails.driver_approve', $data, function($mail) use($subjek_driver_approve, $driver, $nama_pengirim_admin ){
                $mail->to($driver->email, 'no-reply')
                    ->subject($subjek_driver_approve, 'no-reply');
                $mail->from($driver->email, $nama_pengirim_admin );
            });

        return redirect('master_driver/'.$id.'/detail')->with('success', 'Data Driver Berhasil Disetujui');
    }

    public function status_reject_master_driver($id)
    {
        $user = \App\Models\User::find($id);
        //lihat data
        $driver = \DB::table('driver')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $driver->status;
        //kondisi
        if($status_sekarang == 'Sudah Disetujui'){
            \DB::table('driver')->where('id',$id)->update([
                'status'=>'Proses Pengajuan'
            ]);
            \DB::table('driver')->where('id',$id)->update([
                'id_rfid'=>'-','nama_setujui'=>'','tanggal_setujui'=>''
            ]);
        }

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_driver_reject = $email->subjek_driver_reject;
            $header_driver_reject = $email->header_driver_reject;
            $body_1_driver_reject = $email->body_1_driver_reject;
            $body_2_driver_reject = $email->body_2_driver_reject;
            $footer_driver_reject = $email->footer_driver_reject;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_driver_reject' => $header_driver_reject,
                'body_1_driver_reject' => $body_1_driver_reject,
                'body_2_driver_reject' => $body_2_driver_reject,
                'footer_driver_reject' => $footer_driver_reject,
            );

            $driver = \App\Models\Driver::find($id);
            Mail::send('emails.driver_reject', $data, function($mail) use($subjek_driver_reject, $driver, $nama_pengirim_admin ){
                $mail->to($driver->email, 'no-reply')
                    ->subject($subjek_driver_reject, 'no-reply');
                $mail->from($driver->email, $nama_pengirim_admin );
            });

        return redirect('master_driver/'.$id.'/detail')->with('success', 'Persetujuan Driver Sudah Dibatalkan');
    }

    public function status_block_master_driver(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        //lihat data
        $driver = \DB::table('driver')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $driver->status;
        //kondisi
        if($status_sekarang == 'Sudah Disetujui'){
            \DB::table('driver')->where('id',$id)->update([
                'status'=>'Diblokir'
            ]);
        }

        $driver = \App\Models\Driver::find($id);
        $login = Auth::user()->owner_name;
        $driver->nama_blokir = $login;
        $driver->tanggal_blokir = Carbon::now();
        $driver->update($request->all());

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_driver_block = $email->subjek_driver_block;
            $header_driver_block = $email->header_driver_block;
            $body_1_driver_block = $email->body_1_driver_block;
            $body_2_driver_block = $email->body_2_driver_block;
            $footer_driver_block = $email->footer_driver_block;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_driver_block' => $header_driver_block,
                'body_1_driver_block' => $body_1_driver_block,
                'body_2_driver_block' => $body_2_driver_block,
                'footer_driver_block' => $footer_driver_block,
            );

            $driver = \App\Models\Driver::find($id);
            Mail::send('emails.driver_block', $data, function($mail) use($subjek_driver_block, $driver, $nama_pengirim_admin ){
                $mail->to($driver->email, 'no-reply')
                    ->subject($subjek_driver_block, 'no-reply');
                $mail->from($driver->email, $nama_pengirim_admin );
            });

        return redirect('master_driver/'.$id.'/detail')->with('success', 'Data Driver Berhasil Diblokir');
    }

    public function status_unblock_master_driver($id)
    {
        $user = \App\Models\User::find($id);
        //lihat data
        $driver = \DB::table('driver')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $driver->status;
        //kondisi
        if($status_sekarang == 'Diblokir'){
            \DB::table('driver')->where('id',$id)->update([
                'status'=>'Sudah Disetujui','nama_blokir'=>'','tanggal_blokir'=>''
            ]);
        }

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_driver_unblock = $email->subjek_driver_unblock;
            $header_driver_unblock = $email->header_driver_unblock;
            $body_1_driver_unblock = $email->body_1_driver_unblock;
            $body_2_driver_unblock = $email->body_2_driver_unblock;
            $footer_driver_unblock = $email->footer_driver_unblock;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_driver_unblock' => $header_driver_unblock,
                'body_1_driver_unblock' => $body_1_driver_unblock,
                'body_2_driver_unblock' => $body_2_driver_unblock,
                'footer_driver_unblock' => $footer_driver_unblock,
            );

            $driver = \App\Models\Driver::find($id);
            Mail::send('emails.driver_unblock', $data, function($mail) use($subjek_driver_unblock, $driver, $nama_pengirim_admin ){
                $mail->to($driver->email, 'no-reply')
                    ->subject($subjek_driver_unblock, 'no-reply');
                $mail->from($driver->email, $nama_pengirim_admin );
            });

        return redirect('master_driver/'.$id.'/detail')->with('success', 'Data Driver Berhasil Diaktifkan');
    }

    public function add()
    {
        $title = "master_driver";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();
        $drivers = \App\Models\Driver::all();
        // $drivers = \App\Models\Driver::all()->where('status', !0); //selain 0

        return view('master_driver.add',
            [
            'title' => $title,
            'drivers' => $drivers,
            'user' => $user,
            'company' => $company, 
        ]);
    }

    public function create(Request $request)
    {
        $messages = [
            'mimes' => '*upload dengan format jpg, jpeg, pdf! dan silakan isi kembali datanya',
            // 'min' => '*upload file minimal 1 mb !',
            'max' => '*upload file maksimal 4 mb! dan silakan isi kembali datanya',
            'unique' => 'Nomor SIM tidak boleh sama! dan silakan isi kembali datanya',
        ];
         
        $this->validate($request,[
            'drive_license' => ['required', 'max:255',Rule::unique('driver')->where('drive_license', $request->drive_license)],
            'statement_form' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_sim' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_ktp' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_foto' => 'mimes:jpg,jpeg|file|max:4096',
        ],$messages);
          
        $request->request->add(['status' => 'Proses Pengajuan' ]);
        $request->request->add(['tanggal_pengajuan' => Carbon::now() ]);
        
        $driver = \App\Models\Driver::create($request->all());

        //tambah statement_form
        if($request->hasFile('statement_form'))
        {
            $file_statement_form = time()."_".$request->file('statement_form')->getClientOriginalName();
            $request->file('statement_form')->move('images/',$file_statement_form);
            $driver->statement_form = $file_statement_form;
            $driver->save();
        }

        //tambah file_sim
        if($request->hasFile('file_sim'))
        {
            $file_file_sim = time()."_".$request->file('file_sim')->getClientOriginalName();
            $request->file('file_sim')->move('images/',$file_file_sim);
            $driver->file_sim = $file_file_sim;
            $driver->save();
        }

        //tambah file_ktp
        if($request->hasFile('file_ktp'))
        {
            $file_file_ktp = time()."_".$request->file('file_ktp')->getClientOriginalName();
            $request->file('file_ktp')->move('images/',$file_file_ktp);
            $driver->file_ktp = $file_file_ktp;
            $driver->save();
        }        

        //tambah file_foto
        if($request->hasFile('file_foto'))
        {
            $file_file_foto = time()."_".$request->file('file_foto')->getClientOriginalName();
            $request->file('file_foto')->move('images/',$file_file_foto);
            $driver->file_foto = $file_file_foto;
            $driver->save();
        }  

        $violations = new \App\Models\Violation;
        $violations->driver_id = $driver->id;
        $violations->pelanggaran = 'pelanggaran';
        $violations->save();

        return redirect ('/master_driver')->with('success', 'Data Driver Berhasil Ditambah');
    }

    public function detail($id)
    {
        $title = "master_driver";
        $driver = \App\Models\Driver::find($id);
        $email = \App\Models\Email::all()->where('id', 1);
        $violations = \App\Models\Violation::where('driver_id',$id)->get();

        return view('master_driver.detail', 
            [
                'title' => $title,
                'driver' => $driver,
                'email' => $email,
                'violations' => $violations,
            ]);
    }

    public function edit_data($id)
    {   
        $title = "master_driver";
        $company = \App\Models\Company::all();
        $driver = \App\Models\Driver::find($id);

        return view('master_driver.edit_data', 
        [
            'title' => $title,
            'company' => $company,
            'driver' => $driver
        ]);
    }

    public function edit_file($id)
    {   
        $title = "master_driver";
        $company = \App\Models\Company::all();
        $driver = \App\Models\Driver::find($id);

        return view('master_driver.edit_file', 
        [
            'title' => $title,
            'company' => $company,
            'driver' => $driver
        ]);
    }

    public function update_data(Request $request ,$id)
    {           
        $driver = \App\Models\Driver::find($id);
        $driver->update($request->all());

        return redirect ('master_driver/'.$id.'/detail')->with('success', 'Data Driver Berhasil Diupdate');
    }

    public function update_file(Request $request ,$id)
    {   
        $messages = [
            'mimes' => '*upload dengan format jpg, jpeg, pdf! dan silakan isi kembali datanya',
            // 'min' => '*upload file minimal 1 mb !',
            'max' => '*upload file maksimal 4 mb! dan silakan isi kembali datanya',
        ];
         
        $this->validate($request,[
            'statement_form' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_sim' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_ktp' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_foto' => 'mimes:jpg,jpeg|file|max:4096',
        ],$messages);

        $driver = \App\Models\Driver::find($id);
        $driver->update($request->all());

        //statement_form 
        if($request->hasFile('statement_form'))
        {
            $file_statement_form = time()."_".$request->file('statement_form')->getClientOriginalName();
            $request->file('statement_form')->move('images/',$file_statement_form);
            $driver->statement_form = $file_statement_form;
            $driver->save();
        }

        //file_sim 
        if($request->hasFile('file_sim'))
        {
            $file_file_sim = time()."_".$request->file('file_sim')->getClientOriginalName();
            $request->file('file_sim')->move('images/',$file_file_sim);
            $driver->file_sim = $file_file_sim;
            $driver->save();
        }

        //file_ktp 
        if($request->hasFile('file_ktp'))
        {
            $file_file_ktp = time()."_".$request->file('file_ktp')->getClientOriginalName();
            $request->file('file_ktp')->move('images/',$file_file_ktp);
            $driver->file_ktp = $file_file_ktp;
            $driver->save();
        }

        //file_foto 
        if($request->hasFile('file_foto'))
        {
            $file_file_foto = time()."_".$request->file('file_foto')->getClientOriginalName();
            $request->file('file_foto')->move('images/',$file_file_foto);
            $driver->file_foto = $file_file_foto;
            $driver->save();
        }

        return redirect ('master_driver/'.$id.'/detail')->with('success', 'Data Driver Berhasil Diupdate');
    }

    public function delete(Request $request, $id)
    {
        $driver = \App\Models\Driver::find($id);
        //memindahkan data driver ke data driver_history
        $driver_history = new \App\Models\Driver_history;
        
        $login = Auth::user()->owner_name;
        $driver_history->penghapus = $login;
        $driver_history->alasan_dihapus = $request->alasan_dihapus;

        $driver_history->id = $driver->id;
        $driver_history->company_id = $driver->company_id;
        $driver_history->status = $driver->status;

        $driver_history->owner_name = $driver->owner_name;
        $driver_history->email = $driver->email;
        $driver_history->pic_nama = $driver->pic_nama;

        $driver_history->name = $driver->name;
        $driver_history->nik = $driver->nik;
        $driver_history->birthday = $driver->birthday;
        $driver_history->gender = $driver->gender;
        $driver_history->addr = $driver->addr;
        $driver_history->hp1 = $driver->hp1;
        $driver_history->hp2 = $driver->hp2;
        $driver_history->phone = $driver->phone;
        $driver_history->fax = $driver->fax;
        $driver_history->mobile = $driver->mobile;
        
        $driver_history->drive_license = $driver->drive_license;
        $driver_history->valid_date = $driver->valid_date;
        $driver_history->display_cust = $driver->display_cust;
        $driver_history->done = $driver->done;

        $driver_history->id_license = $driver->id_license;
        $driver_history->id_customer = $driver->id_customer;
        $driver_history->customer = $driver->customer;
        $driver_history->site_id = $driver->site_id;
        $driver_history->opername = $driver->opername;
        $driver_history->done_date = $driver->done_date;
        $driver_history->ins_date = $driver->created_at;
        $driver_history->upd_ts = $driver->upd_ts;
        $driver_history->id_rfid = $driver->id_rfid;

        $driver_history->remaks = $driver->remaks;

        $driver_history->statement_form = $driver->statement_form;
        $driver_history->file_sim = $driver->file_sim;
        $driver_history->file_ktp = $driver->file_ktp;
        $driver_history->file_foto = $driver->file_foto;

        $driver_history->sudah_ujian = $driver->sudah_ujian;
        $driver_history->lulus_ujian = $driver->lulus_ujian;
        $driver_history->nilai_ujian = $driver->nilai_ujian;
        $driver_history->alasan_blokir = $driver->alasan_blokir;
        $driver_history->tanggal_blokir = $driver->tanggal_blokir;
        $driver_history->nama_blokir = $driver->nama_blokir;
        
        $driver_history->tanggal_pengajuan = $driver->tanggal_pengajuan;
        $driver_history->tanggal_setujui = $driver->tanggal_setujui;
        $driver_history->nama_setujui = $driver->nama_setujui;
        $driver_history->save();
        
        //////////////////////////////////////////////////
        $driver = \App\Models\Driver::find($id);
        $driver->delete($driver);

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_driver_delete = $email->subjek_driver_delete;
            $header_driver_delete = $email->header_driver_delete;
            $body_1_driver_delete = $email->body_1_driver_delete;
            $body_2_driver_delete = $email->body_2_driver_delete;
            $footer_driver_delete = $email->footer_driver_delete;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_driver_delete' => $header_driver_delete,
                'body_1_driver_delete' => $body_1_driver_delete,
                'body_2_driver_delete' => $body_2_driver_delete,
                'footer_driver_delete' => $footer_driver_delete,
            );

            $driver_history = \App\Models\Driver_history::find($id);
            Mail::send('emails.driver_hapus', $data, function($mail) use($subjek_driver_delete, $driver_history, $nama_pengirim_admin ){
                $mail->to($driver_history->email, 'no-reply')
                    ->subject($subjek_driver_delete, 'no-reply');
                $mail->from($driver_history->email, $nama_pengirim_admin );
            }); 

        return redirect('/master_driver')->with('success', 'Data Driver Berhasil Dihapus');
    }

//////////////////////////////////////////////////////////
    
    public function send_email_ujian_driver(Request $request, $id)
    {
        $driver = \App\Models\Driver::find($id);
        //memindahkan data driver_history ke data driver
        $jadwal_ujian = new \App\Models\Jadwal_ujian;

        $jadwal_ujian->owner_name = $driver->owner_name;
        $jadwal_ujian->pic_nama = $driver->pic_nama;
        $jadwal_ujian->email = $driver->email;
        $jadwal_ujian->name = $driver->name;
        $jadwal_ujian->drive_license = $driver->drive_license;
        $jadwal_ujian->tanggal = date('Y-m-d', strtotime($request->tanggal)); 
        $jadwal_ujian->save();

        //Siapkan data
        $pengirim = $request->pengirim;
        $subject = $request->subject;
        $header = $request->header;
        $isi_1= $request->isi_1;
        $isi_2= $request->isi_2;
        $tanggal = date('d F Y, H:i', strtotime($request->tanggal)); 
        $footer= $request->footer;
        $email_tujuan = $request->email_tujuan;

        $data = array(
            'header' => $header,
            'isi_1' => $isi_1,
            'isi_2' => $isi_2,
            'tanggal' => $tanggal,
            'footer' => $footer,
        );

        //Kirim email
        Mail::send('master_driver/email_jadwal_ujian_driver', $data, function($mail) use($pengirim, $subject, $email_tujuan){
            $mail->to($email_tujuan, 'no-reply')
                ->subject($subject, 'no-reply');
            $mail->from($email_tujuan, $pengirim);
        });

        //Cek kegagalan
        if (Mail::failures()){
            return redirect ('master_driver/'.$id.'/detail')->with('warning', 'Gagal mengirim Email!');
        }
        return redirect ('master_driver/'.$id.'/detail')->with('success', 'Email Penjadwalan Ujian driver berhasil dikirim!');
    }

    public function jadwal_ujian_driver()
    {
        $title = "master_driver";
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $jadwal_ujian = \App\Models\Jadwal_ujian::whereBetween('tanggal',[$start_date,$end_date])->get();
        } else {
            $jadwal_ujian = \App\Models\Jadwal_ujian::latest()->get();
        }

        return view('master_driver.rekapan_jadwal_ujian_driver',
            [
            'title' => $title,
            'jadwal_ujian' => $jadwal_ujian,
        ]);

    }

    public function status_jadwal_ujian(Request $request, $id)
    {

        $user = \App\Models\User::find($id);
        //lihat data
        $jadwal_ujian = \DB::table('jadwal_ujian')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $jadwal_ujian->status;
        //kondisi
        if($status_sekarang == 'Belum Ujian'){
            \DB::table('jadwal_ujian')->where('id',$id)->update([
                'status'=>'Sudah Ujian'
            ]);
        
        return redirect('master_driver/jadwal_ujian_driver')->with('success', 'Ujian driver sudah selesai');

        }elseif($status_sekarang == 'Sudah Ujian'){
            \DB::table('jadwal_ujian')->where('id',$id)->update([
                'status'=>'Belum Ujian'
            ]);
        }

        return redirect('master_driver/jadwal_ujian_driver')->with('success', 'Ujian driver diulangi');
    }

    public function cetak_rfid($id)
    {
        $driver = \App\Models\Driver::find($id);
 
        $pdf = PDF::loadview('master_driver.rfid_driver',['driver'=>$driver])
        ->setPaper('a7', 'patroit')
        ;
        return $pdf->stream();
        // return $pdf->download('laporan-driver-pdf');
    }

    public function cetak_data_driver($id)
    {
        $driver = \App\Models\Driver::find($id);
        $driver->tanggal = Carbon::now()->isoFormat('D MMMM Y');
        $pdf = PDF::loadview('master_driver.cetak_data_driver',[
            'driver'=>$driver
        ])
        // ->setPaper('a7', 'patroit')
        ;
        return $pdf->stream();
        // return $pdf->download('laporan-driver-pdf');
    }

    public function export_excel()
    {
        return Excel::download(new DriverExport, 'Driver.xls');
    }

///////////////////////////////////////////////

    public function recycle_bin()
    {
        $title = "master_driver";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();
        $drivers = \App\Models\Driver_history::all();

        return view('master_driver.recycle_bin',
            [
            'title' => $title,
            'user' => $user,
            'company' => $company, 
            'drivers' => $drivers,
        ]);
    }

    public function restore($id)
    {
        $driver_history = \App\Models\Driver_history::find($id);
        //memindahkan data driver_history ke data driver
        $driver = new \App\Models\Driver;

        $driver->id = $driver_history->id;
        $driver->company_id = $driver_history->company_id;
        $driver->status = $driver_history->status;

        $driver->owner_name = $driver_history->owner_name;
        $driver->email = $driver_history->email;
        $driver->pic_nama = $driver_history->pic_nama;

        $driver->name = $driver_history->name;
        $driver->nik = $driver_history->nik;
        $driver->birthday = $driver_history->birthday;
        $driver->gender = $driver_history->gender;
        $driver->addr = $driver_history->addr;
        $driver->hp1 = $driver_history->hp1;
        $driver->hp2 = $driver_history->hp2;
        $driver->phone = $driver_history->phone;
        $driver->fax = $driver_history->fax;
        $driver->mobile = $driver_history->mobile;
        
        $driver->drive_license = $driver_history->drive_license;
        $driver->valid_date = $driver_history->valid_date;
        $driver->display_cust = $driver_history->display_cust;
        $driver->done = $driver_history->done;

        $driver->id_license = $driver_history->id_license;
        $driver->id_customer = $driver_history->id_customer;
        $driver->customer = $driver_history->customer;
        $driver->site_id = $driver_history->site_id;
        $driver->opername = $driver_history->opername;
        $driver->done_date = $driver_history->done_date;
        $driver->ins_date = $driver_history->ins_date;
        $driver->upd_ts = $driver_history->upd_ts;
        $driver->id_rfid = $driver_history->id_rfid;

        $driver->remaks = $driver_history->remaks;

        $driver->statement_form = $driver_history->statement_form;
        $driver->file_sim = $driver_history->file_sim;
        $driver->file_ktp = $driver_history->file_ktp;
        $driver->file_foto = $driver_history->file_foto;

        $driver->sudah_ujian = $driver_history->sudah_ujian;
        $driver->lulus_ujian = $driver_history->lulus_ujian;
        $driver->nilai_ujian = $driver_history->nilai_ujian;
        $driver->alasan_blokir = $driver_history->alasan_blokir;
        $driver->tanggal_blokir = $driver_history->tanggal_blokir;
        $driver->nama_blokir = $driver_history->nama_blokir;

        $driver->tanggal_pengajuan = $driver_history->tanggal_pengajuan;
        $driver->tanggal_setujui = $driver_history->tanggal_setujui;
        $driver->nama_setujui = $driver_history->nama_setujui;
        $driver->save();

        //////////////////////////////////////////////////
        $driver_history = \App\Models\Driver_history::find($id);
        $driver_history->delete($driver_history);      

        return redirect('/master_driver/recycle_bin')->with('success', 'Data Driver Berhasil Dipulihkan');
    }

    public function clear()
    {
        $koneksi = mysqli_connect("localhost", "root", "", "project_master_truck");
        $sql = "DELETE FROM DRIVER_HISTORY";
        mysqli_query($koneksi, $sql);     

        return redirect('/master_driver/recycle_bin')->with('success', 'Data Driver Berhasil Dibersihkan');
    }

}
