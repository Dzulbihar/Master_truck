<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use App\Models\Company;
use App\Models\Driver;
use App\Models\Driver_history;
use App\Models\Proses_ujian;
use PDF;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;

class DriverController extends Controller
{

    public function index($id)
    {
        $title = "driver";
        $company = \App\Models\Company::find($id);
        $drivers = \App\Models\Driver::where('company_id',$id)
        // ->where('status', !0)
        ->orderBy('status', 'ASC')
        ->get();

        return view('driver.index', [
            'title' => $title,
            'company' => $company,
            'drivers' => $drivers
        ]);
    }

    public function cari(Request $request, $id)
    {
        $title = "driver";
        $company = \App\Models\Company::find($id);
        
        // menangkap data pencarian
        $cari = $request->cari;

        $drivers = \App\Models\Driver::where('company_id',$id)
        ->where('STATUS','like',"%".$cari."%")
        ->paginate();

        // mengirim data ke view index
        return view('driver.index',
            [
            'title' => $title,
            'company' => $company, 
            'drivers' => $drivers,
        ]);
    }

    public function add($id)
    {
        $title = "driver";
        $company = \App\Models\Company::find($id);
        $drivers = \App\Models\Driver::where('company_id',$id)
        // ->where('status', !0)
        ->get();

        return view('driver.add', [
            'title' => $title,
            'company' => $company,
            'drivers' => $drivers
        ]);
    }

    public function adddriver(Request $request ,$idcompany)
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
          

        $company = \App\Models\Company::find($idcompany);

        $request->request->add(['company_id' => $company->id ]);
        $request->request->add(['owner_name' => $company->owner_name ]);
        $request->request->add(['pic_nama' => $company->pic_nama ]);
        $request->request->add(['email' => $company->email ]);

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

        //Mengambil data dari email
        $email = Email::where('id', '1')->first();
        $subjek_driver_daftar = $email->subjek_driver_daftar;
        $header_driver_daftar = $email->header_driver_daftar;
        $body_1_driver_daftar = $email->body_1_driver_daftar;
        $body_2_driver_daftar = $email->body_2_driver_daftar;
        $footer_driver_daftar = $email->footer_driver_daftar;
        $nama_pengirim_admin = $email->nama_pengirim_admin;
        $data = array(
            'header_driver_daftar' => $header_driver_daftar,
            'body_1_driver_daftar' => $body_1_driver_daftar,
            'body_2_driver_daftar' => $body_2_driver_daftar,
            'footer_driver_daftar' => $footer_driver_daftar,
        );
        $pengirim = Auth::user()->owner_name;

        Mail::send('emails.driver_daftar', $data, function($mail) use($subjek_driver_daftar, $email, $pengirim ){
            $mail->to($email->alamat_email_admin, 'no-reply')
                ->subject($subjek_driver_daftar, 'no-reply');
            $mail->from($email->alamat_email_admin, $pengirim );
        });

        //\Mail::to('ahmad.dzulbihar69@gmail.com')->send(new \App\Mail\driverDaftar());

        return redirect('driver/'.$idcompany.'/index')->with('success', 'Pendaftaran Driver Eksternal berhasil! Pengajuan Anda sedang kami proses. Silakan menunggu persetujuan dari Admin HSSE melalui notifikasi email!');
    }

    public function edit_data($companyid, $driverid)
    {
        $title = "driver";
        $company = auth()->user()->company;
        $driver = \App\Models\Driver::find($driverid);

        return view('driver.edit_data', [
          'title' => $title,
          'company' => $company,
          'driver' => $driver
        ]);
    }

    public function edit_file($companyid, $driverid)
    {
        $title = "driver";
        $company = auth()->user()->company;
        $driver = \App\Models\Driver::find($driverid);

        return view('driver.edit_file', [
          'title' => $title,
          'company' => $company,
          'driver' => $driver
        ]);
    }

    public function update_data(Request $request, $companyid, $driverid)
    {           
        $driver = \App\Models\Driver::find($driverid);
        $driver->update($request->all());

        return redirect ('driver/'.$companyid.'/'.$driverid.'/detail')->with('success', 'Data Driver Berhasil Diupdate');
    }

    public function update_file(Request $request, $companyid, $driverid)
    {       
        $company = auth()->user()->company;
        $driver = \App\Models\Driver::find($driverid);

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

        $driver = \App\Models\Driver::find($driverid);
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


        return redirect ('driver/'.$companyid.'/'.$driverid.'/detail')->with('success', 'Data Driver Berhasil Diupdate');
    }

    public function detail($companyid, $driverid)
    {
        $title = "driver";
        $company = auth()->user()->company;
        $driver = \App\Models\Driver::find($driverid);

        return view('driver.detail', 
            [
                'title' => $title,
                'company' => $company,
                'driver' => $driver,
            ]);
    }

    public function delete(Request $request, $companyid, $driverid)
    {
        $company = auth()->user()->company;
        ///////////////////////////////////

        $driver = \App\Models\Driver::find($driverid);
        //memindahkan data driver ke data driver_history
        $driver_history = new \App\Models\Driver_history;
        
        $login = Auth::user()->owner_name;
        $driver_history->penghapus = $login;
        $driver_history->alasan_dihapus = 'Dihapus User';

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

        $driver = \App\Models\Driver::find($driverid);
        $driver->delete($driver);

        return redirect('driver/'.$companyid.'/index')->with('success', 'Data Driver Berhasil Dihapus');
    }


////////////////////////////////////////////////////////////////////


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

///////////////////////////////////////////////////////////

    public function ujian($companyid, $driverid)
    {
        $title = "driver";
        $company = auth()->user()->company;
        $driver = \App\Models\Driver::find($driverid);

        $materi_ujians = \App\Models\Materi_ujian::all();
        $proses_ujians = \App\Models\Proses_ujian::where('driver_id',$driverid)->get();

        return view('driver.ujian', 
            [
                'title' => $title,
                'company' => $company,
                'driver' => $driver,
                'materi_ujians' => $materi_ujians,
                'proses_ujians' => $proses_ujians,
            ]);
    }

    public function ujian_jawaban(Request $request ,$companyid, $driverid)
    {
        $messages = [
            'mimes' => '*upload dengan format jpg, jpeg, pdf!',
            // 'min' => '*upload file minimal 1 mb !',
            'max' => '*upload file maksimal 4 mb!',
        ];
         
        $this->validate($request,[
            'jawaban_file' => 'mimes:pdf,jpg,jpeg|file|max:4096',
        ],$messages);

        $company = auth()->user()->company;
        $driver = \App\Models\Driver::find($driverid);

        $request->request->add(['driver_id' => $driver->id ]);
        $proses_ujians = \App\Models\Proses_ujian::create($request->all());

        //jawaban_file
        if($request->hasFile('jawaban_file'))
        {
            $file_jawaban_file = time()."_".$request->file('jawaban_file')->getClientOriginalName();
            $request->file('jawaban_file')->move('images/',$file_jawaban_file);
            $proses_ujians->jawaban_file = $file_jawaban_file;
            $proses_ujians->save();
        }

        return redirect('driver/'.$companyid.'/'.$driverid.'/ujian')->with('success', 'Data Jawaban ujian sopir berhasil dimasukkan');
    }

    public function ujian_jawaban_edit($driverid, $jawabanid)
    {
        $title = "driver";
        $company = auth()->user()->company;
        $driver = \App\Models\Driver::find($driverid);

        $proses_ujian = \App\Models\Proses_ujian::find($jawabanid);

        return view('driver.ujian_jawaban_edit', [
          'title' => $title,
          'company' => $company,
          'driver' => $driver,
          'proses_ujian' => $proses_ujian
        ]);
    }

    public function ujian_jawaban_update(Request $request, $driverid, $jawabanid)
    {    
        $messages = [
            'mimes' => '*upload dengan format jpg, jpeg, pdf!',
            // 'min' => '*upload file minimal 1 mb !',
            'max' => '*upload file maksimal 4 mb!',
        ];
         
        $this->validate($request,[
            'jawaban_file' => 'mimes:pdf,jpg,jpeg|file|max:4096',
        ],$messages);


        $proses_ujian = \App\Models\Proses_ujian::find($jawabanid);
        $proses_ujian->update($request->all());

        //jawaban_file 
        if($request->hasFile('jawaban_file'))
        {
            $file_jawaban_file = time()."_".$request->file('jawaban_file')->getClientOriginalName();
            $request->file('jawaban_file')->move('images/',$file_jawaban_file);
            $driver->jawaban_file = $file_jawaban_file;
            $driver->save();
        }

        return redirect ('driver/'.$jawabanid.'/'.$driverid.'/ujian')->with('success', 'Data Jawaban ujian sopir berhasil diupdate');
    }

    public function ujian_hapus($driverid, $jawabanid)
    {
        $proses_ujian = \App\Models\Proses_ujian::find($jawabanid);
        $proses_ujian->delete($proses_ujian);

        return redirect('driver/'.$jawabanid.'/'.$driverid.'/ujian')->with('success', 'Data Jawaban ujian sopir berhasil dihapus');
    }

/////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

    public function tulis_pesan($id)
    {
        $title = "driver";
        $company = auth()->user()->company;
        $driver = \App\Models\Driver::find($id);

        return view('driver.tulis_pesan', 
            [
                'title' => $title,
                'company' => $company,
                'driver' => $driver
            ]);
    }

    public function kirim_pesan(Request $request, $id)
    {
        //Mengambil data dari email
        $email = Email::where('id', '1')->first();

        //Siapkan data
        $alamat_email_admin = $email->alamat_email_admin;
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $isi = $request->isi;
        
        $data = array(
            'name' => $name,
            'subject' => $subject,
            'isi' => $isi
        );

        Mail::send('driver.tulis_pesan_kirim', $data, function($mail) use($subject, $alamat_email_admin, $email, $name ){
            $mail->to($alamat_email_admin, 'no-reply')
                ->subject($subject, 'no-reply');
            $mail->from($email, $name );
        });

        return redirect('driver/'.$id.'/index')->with('success', 'Email berhasil terkirim!');
    }


}

 