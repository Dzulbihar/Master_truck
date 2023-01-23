<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Company;
use App\Models\Truck;
use App\Models\Truck_history;
use App\Models\Chassis_code;
use App\Models\Chassis_parameter;
use App\Models\Merk;
use App\Models\Kota;
use App\Models\Email;
use PDF;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Jadwal_pengambilan_rfid_tag;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TruckExport;

class Master_truckController extends Controller
{

    public function index()
    {
        $title = "master_truck";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();
        $trucks = \App\Models\Truck::orderBy('status', 'ASC')
        ->get();
        // ->orderBy('id', 'DESC');
        // $trucks = \App\Models\Truck::all()->where('status', !0); //selain 0

        return view('master_truck.index',
            [
            'title' => $title,
            'user' => $user,
            'company' => $company, 
            'trucks' => $trucks,
        ]);
    }

    public function cari(Request $request)
    {
        $title = "master_truck";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();
        $merk_truck = \App\Models\Merk::all()->where('status', 'Aktif');
        $chassis_code = \App\Models\Chassis_code::all()->where('status', 'Aktif');
        $state_truck = \App\Models\Kota::all()->where('status', 'Aktif');
        
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $trucks = DB::table('truck')
        ->where('STATUS','like',"%".$cari."%")
        ->paginate();


        // mengirim data pegawai ke view index
        return view('master_truck.index',
            [
            'title' => $title,
            'user' => $user,
            'company' => $company, 
            'trucks' => $trucks,
            'merk_truck' => $merk_truck,
            'chassis_code' => $chassis_code,
            'state_truck' => $state_truck
        ]);
    }

    public function status_approve_master_truck(Request $request, $id)
    {
        $messages = [
            'unique' => 'RFID sudah pernah didaftarkan! silakan menggunakan RFID yang lain',
        ];

        $this->validate($request,[
            'id_rfid' => ['required', 'max:255',Rule::unique('truck')->where('id_rfid', $request->id_rfid)],
        ],$messages);

        $user = \App\Models\User::find($id);
        //lihat data
        $truck = \DB::table('truck')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $truck->status;
        //kondisi
        if($status_sekarang == 'Proses Pengajuan'){
            \DB::table('truck')->where('id',$id)->update([
                'status'=>'Sudah Disetujui'
            ]);
        }

        $truck = \App\Models\Truck::find($id);
        $login = Auth::user()->owner_name;
        $truck->nama_setujui = $login;
        $truck->tanggal_setujui = Carbon::now();

        $truck->update($request->all());

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_truck_approve = $email->subjek_truck_approve;
            $header_truck_approve = $email->header_truck_approve;
            $body_1_truck_approve = $email->body_1_truck_approve;
            $body_2_truck_approve = $email->body_2_truck_approve;
            $footer_truck_approve = $email->footer_truck_approve;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_truck_approve' => $header_truck_approve,
                'body_1_truck_approve' => $body_1_truck_approve,
                'body_2_truck_approve' => $body_2_truck_approve,
                'footer_truck_approve' => $footer_truck_approve,
            );

            $truck = \App\Models\Truck::find($id);
            Mail::send('emails.truck_approve', $data, function($mail) use($subjek_truck_approve, $truck, $nama_pengirim_admin ){
                $mail->to($truck->email, 'no-reply')
                    ->subject($subjek_truck_approve, 'no-reply');
                $mail->from($truck->email, $nama_pengirim_admin );
            });

        return redirect('master_truck/'.$id.'/detail')->with('success', 'Data RFID Truck Berhasil Disetujui');
    }

    public function status_reject_master_truck($id)
    {
        $user = \App\Models\User::find($id);
        //lihat data
        $truck = \DB::table('truck')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $truck->status;
        //kondisi
        if($status_sekarang == 'Sudah Disetujui'){
            \DB::table('truck')->where('id',$id)->update([
                'status'=>'Proses Pengajuan'
            ]);
            \DB::table('truck')->where('id',$id)->update([
                'id_rfid'=>'-','nama_setujui'=>'','tanggal_setujui'=>''
            ]);
        }

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_truck_reject = $email->subjek_truck_reject;
            $header_truck_reject = $email->header_truck_reject;
            $body_1_truck_reject = $email->body_1_truck_reject;
            $body_2_truck_reject = $email->body_2_truck_reject;
            $footer_truck_reject = $email->footer_truck_reject;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_truck_reject' => $header_truck_reject,
                'body_1_truck_reject' => $body_1_truck_reject,
                'body_2_truck_reject' => $body_2_truck_reject,
                'footer_truck_reject' => $footer_truck_reject,
            );

            $truck = \App\Models\Truck::find($id);
            Mail::send('emails.truck_reject', $data, function($mail) use($subjek_truck_reject, $truck, $nama_pengirim_admin ){
                $mail->to($truck->email, 'no-reply')
                    ->subject($subjek_truck_reject, 'no-reply');
                $mail->from($truck->email, $nama_pengirim_admin );
            });

        return redirect('master_truck/'.$id.'/detail')->with('success', 'Persetujuan RFID Truck Sudah Dibatalkan');
    }

    public function status_block_master_truck(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        //lihat data
        $truck = \DB::table('truck')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $truck->status;
        //kondisi
        if($status_sekarang == 'Sudah Disetujui'){
            \DB::table('truck')->where('id',$id)->update([
                'status'=>'Diblokir'
            ]);
        }

        $truck = \App\Models\Truck::find($id);
        $login = Auth::user()->owner_name;
        $truck->nama_blokir = $login;
        $truck->tanggal_blokir = Carbon::now();
        $truck->update($request->all());

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_truck_block = $email->subjek_truck_block;
            $header_truck_block = $email->header_truck_block;
            $body_1_truck_block = $email->body_1_truck_block;
            $body_2_truck_block = $email->body_2_truck_block;
            $footer_truck_block = $email->footer_truck_block;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_truck_block' => $header_truck_block,
                'body_1_truck_block' => $body_1_truck_block,
                'body_2_truck_block' => $body_2_truck_block,
                'footer_truck_block' => $footer_truck_block,
            );

            $truck = \App\Models\Truck::find($id);
            Mail::send('emails.truck_block', $data, function($mail) use($subjek_truck_block, $truck, $nama_pengirim_admin ){
                $mail->to($truck->email, 'no-reply')
                    ->subject($subjek_truck_block, 'no-reply');
                $mail->from($truck->email, $nama_pengirim_admin );
            });

        return redirect('master_truck/'.$id.'/detail')->with('success', 'Data RFID Truck Berhasil Diblokir');
    }

    public function status_unblock_master_truck($id)
    {
        $user = \App\Models\User::find($id);
        //lihat data
        $truck = \DB::table('truck')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $truck->status;
        //kondisi
        if($status_sekarang == 'Diblokir'){
            \DB::table('truck')->where('id',$id)->update([
                'status'=>'Sudah Disetujui','nama_blokir'=>'','tanggal_blokir'=>''
            ]);
        }

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_truck_unblock = $email->subjek_truck_unblock;
            $header_truck_unblock = $email->header_truck_unblock;
            $body_1_truck_unblock = $email->body_1_truck_unblock;
            $body_2_truck_unblock = $email->body_2_truck_unblock;
            $footer_truck_unblock = $email->footer_truck_unblock;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_truck_unblock' => $header_truck_unblock,
                'body_1_truck_unblock' => $body_1_truck_unblock,
                'body_2_truck_unblock' => $body_2_truck_unblock,
                'footer_truck_unblock' => $footer_truck_unblock,
            );

            $truck = \App\Models\Truck::find($id);
            Mail::send('emails.truck_unblock', $data, function($mail) use($subjek_truck_unblock, $truck, $nama_pengirim_admin ){
                $mail->to($truck->email, 'no-reply')
                    ->subject($subjek_truck_unblock, 'no-reply');
                $mail->from($truck->email, $nama_pengirim_admin );
            });

        return redirect('master_truck/'.$id.'/detail')->with('success', 'Data RFID Truck Berhasil Diaktifkan');
    }

    public function add()
    {
        $title = "master_truck";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();
        $trucks = \App\Models\Truck::all();

        $merk_truck = \App\Models\Merk::all()->where('status', 'Aktif');
        $ms_chassis_code = \App\Models\Chassis_code::all()->where('status', 'Aktif');
        $state_truck = \App\Models\Kota::all()->where('status', 'Aktif');

        return view('master_truck.add',
            [
            'title' => $title,
            'user' => $user,
            'company' => $company, 
            'trucks' => $trucks,
            'merk_truck' => $merk_truck,
            'ms_chassis_code' => $ms_chassis_code,
            'state_truck' => $state_truck
        ]);
    }

    public function create(Request $request)
    { 
        $messages = [
            'mimes' => 'Upload dengan format jpg, jpeg! dan silakan isi kembali datanya',
            // 'min' => '*upload file minimal 1 mb !',
            'max' => 'Upload file maksimal 4 mb! dan silakan isi kembali datanya',
            'unique' => 'Nomor polisi tidak boleh sama! dan silakan isi kembali datanya',
        ];
         
        $this->validate($request,[
            'police_no' => ['required', 'max:255',Rule::unique('truck')->where('police_no', $request->police_no)],
            'foto_stnk' => 'mimes:jpg,jpeg|file|max:4096',
            'foto_truck' => 'mimes:jpg,jpeg|file|max:4096',
            'foto_kir_truck' => 'mimes:jpg,jpeg|file|max:4096',
            'foto_chassis' => 'mimes:jpg,jpeg|file|max:4096',
            'foto_kir_chassis' => 'mimes:jpg,jpeg|file|max:4096',
        ],$messages);

        $request->request->add(['status' => 'Proses Pengajuan' ]);
        $request->request->add(['tanggal_pengajuan' => Carbon::now() ]);

        $truck = \App\Models\Truck::create($request->all());

        //tambah foto_stnk
        if($request->hasFile('foto_stnk'))
        {
            $file_foto_stnk = time()."_".$request->file('foto_stnk')->getClientOriginalName();
            $request->file('foto_stnk')->move('images/',$file_foto_stnk);
            $truck->foto_stnk = $file_foto_stnk;
            $truck->save();
        }

        //tambah foto_truck
        if($request->hasFile('foto_truck'))
        {
            $file_foto_truck = time()."_".$request->file('foto_truck')->getClientOriginalName();
            $request->file('foto_truck')->move('images/',$file_foto_truck);
            $truck->foto_truck = $file_foto_truck;
            $truck->save();
        }

        //tambah foto_kir_truck
        if($request->hasFile('foto_kir_truck'))
        {
            $file_foto_kir_truck = time()."_".$request->file('foto_kir_truck')->getClientOriginalName();
            $request->file('foto_kir_truck')->move('images/',$file_foto_kir_truck);
            $truck->foto_kir_truck = $file_foto_kir_truck;
            $truck->save();
        }

        //tambah foto_chassis
        if($request->hasFile('foto_chassis'))
        {
            $file_foto_chassis = time()."_".$request->file('foto_chassis')->getClientOriginalName();
            $request->file('foto_chassis')->move('images/',$file_foto_chassis);
            $truck->foto_chassis = $file_foto_chassis;
            $truck->save();
        }

        //tambah foto_kir_chassis
        if($request->hasFile('foto_kir_chassis'))
        {
            $file_foto_kir_chassis = time()."_".$request->file('foto_kir_chassis')->getClientOriginalName();
            $request->file('foto_kir_chassis')->move('images/',$file_foto_kir_chassis);
            $truck->foto_kir_chassis = $file_foto_kir_chassis;
            $truck->save();
        }

        return redirect ('/master_truck')->with('success', 'Data Truck Berhasil Ditambah');
    }

    public function edit_data($id)
    {
        $title = "master_truck";
        $company = \App\Models\Company::all();
        $truck = \App\Models\Truck::find($id);

        $merk_truck = \App\Models\Merk::all()->where('status', 'Aktif');
        $ms_chassis_code = \App\Models\Chassis_code::all()->where('status', 'Aktif');
        $state_truck = \App\Models\Kota::all()->where('status', 'Aktif');

        return view('master_truck.edit_data', [
            'title' => $title,
            'company' => $company,
            'truck' => $truck,
            'merk_truck' => $merk_truck,
            'ms_chassis_code' => $ms_chassis_code,
            'state_truck' => $state_truck
        ]);
    }

    public function edit_file($id)
    {
        $title = "master_truck";
        $company = \App\Models\Company::all();
        $truck = \App\Models\Truck::find($id);

        return view('master_truck.edit_file', [
            'title' => $title,
            'company' => $company,
            'truck' => $truck,
        ]);
    }

    public function update_data(Request $request ,$id)
    {       
        $truck = \App\Models\Truck::find($id);
        $truck->update($request->all());

        return redirect ('master_truck/'.$id.'/detail')->with('success', 'Data Truck Berhasil Diupdate');
    }

    public function update_file(Request $request, $id)
    {       
        $messages = [
            'mimes' => 'Upload dengan format jpg, jpeg! dan silakan isi kembali datanya',
            'max' => 'Upload file maksimal 4 mb!  dan silakan isi kembali datanya',
        ];
         
        $this->validate($request,[
            'foto_stnk' => 'mimes:jpg,jpeg|file|max:4096',
            'foto_truck' => 'mimes:jpg,jpeg|file|max:4096',
            'foto_kir_truck' => 'mimes:jpg,jpeg|file|max:4096',
            'foto_chassis' => 'mimes:jpg,jpeg|file|max:4096',
            'foto_kir_chassis' => 'mimes:jpg,jpeg|file|max:4096',
        ],$messages);

        $truck = \App\Models\Truck::find($id);
        $truck->update($request->all());

        //foto_stnk 
        if($request->hasFile('foto_stnk'))
        {
            $file_foto_stnk = time()."_".$request->file('foto_stnk')->getClientOriginalName();
            $request->file('foto_stnk')->move('images/',$file_foto_stnk);
            $truck->foto_stnk = $file_foto_stnk;
            $truck->save();
        }
        //foto_truck 
        if($request->hasFile('foto_truck'))
        {
            $file_foto_truck = time()."_".$request->file('foto_truck')->getClientOriginalName();
            $request->file('foto_truck')->move('images/',$file_foto_truck);
            $truck->foto_truck = $file_foto_truck;
            $truck->save();
        }
        //foto_kir_truck 
        if($request->hasFile('foto_kir_truck'))
        {
            $file_foto_kir_truck = time()."_".$request->file('foto_kir_truck')->getClientOriginalName();
            $request->file('foto_kir_truck')->move('images/',$file_foto_kir_truck);
            $truck->foto_kir_truck = $file_foto_kir_truck;
            $truck->save();
        }
        //foto_chassis 
        if($request->hasFile('foto_chassis'))
        {
            $file_foto_chassis = time()."_".$request->file('foto_chassis')->getClientOriginalName();
            $request->file('foto_chassis')->move('images/',$file_foto_chassis);
            $truck->foto_chassis = $file_foto_chassis;
            $truck->save();
        }
        //foto_chassis 
        if($request->hasFile('foto_chassis'))
        {
            $file_foto_chassis = time()."_".$request->file('foto_chassis')->getClientOriginalName();
            $request->file('foto_chassis')->move('images/',$file_foto_chassis);
            $truck->foto_chassis = $file_foto_chassis;
            $truck->save();
        }
        //foto_kir_chassis 
        if($request->hasFile('foto_kir_chassis'))
        {
            $file_foto_kir_chassis = time()."_".$request->file('foto_kir_chassis')->getClientOriginalName();
            $request->file('foto_kir_chassis')->move('images/',$file_foto_kir_chassis);
            $truck->foto_kir_chassis = $file_foto_kir_chassis;
            $truck->save();
        }

        return redirect ('master_truck/'.$id.'/detail')->with('success', 'Data Truck Berhasil Diupdate');
    }

    public function detail($id)
    {
        $title = "master_truck";
        $truck = \App\Models\Truck::find($id);
        $email = \App\Models\Email::all()->where('id', 1);

        return view('master_truck.detail', 
            [
                'title' => $title,
                'truck' => $truck,
                'email' => $email,
            ]);
    }

    public function delete(Request $request, $id)
    {
        $truck = \App\Models\Truck::find($id);
        //memindahkan data truck ke data truck_history
        $truck_history = new Truck_history;

        $login = Auth::user()->owner_name;
        $truck_history->penghapus = $login;
        $truck_history->alasan_dihapus = $request->alasan_dihapus;

        $truck_history->id = $truck->id;
        $truck_history->company_id = $truck->company_id;
        $truck_history->status = $truck->status;
        $truck_history->owner_name = $truck->owner_name;
        $truck_history->pic_nama = $truck->pic_nama;
        $truck_history->email = $truck->email;
        $truck_history->police_no = $truck->police_no;
        $truck_history->stnk_no = $truck->stnk_no;
        $truck_history->machine_no = $truck->machine_no;
        $truck_history->design_no = $truck->design_no;
        $truck_history->expired_lisence = $truck->expired_lisence;
        $truck_history->foto_stnk = $truck->foto_stnk;
        $truck_history->trade_mark = $truck->trade_mark;
        $truck_history->year_made = $truck->year_made;
        $truck_history->state = $truck->state;
        $truck_history->truck_weight = $truck->truck_weight;
        $truck_history->foto_truck = $truck->foto_truck;
        $truck_history->foto_kir_truck = $truck->foto_kir_truck;

        $truck_history->chassis_code = $truck->chassis_code;
        $truck_history->jenis_chassis = $truck->jenis_chassis;
        $truck_history->chassis_weight = $truck->chassis_weight;
        $truck_history->foto_chassis = $truck->foto_chassis;
        $truck_history->foto_kir_chassis = $truck->foto_kir_chassis;

        $truck_history->id_customer = $truck->id_customer;
        $truck_history->customer = $truck->customer;
        $truck_history->site_id = $truck->site_id;
        $truck_history->truck_code = $truck->truck_code;
        $truck_history->upd_ts = $truck->upd_ts;
        $truck_history->opername = $truck->opername;
        $truck_history->gate_no = $truck->gate_no;
        $truck_history->total_weiht_ht_ch = $truck->total_weiht_ht_ch;
        $truck_history->bbg_yn = $truck->bbg_yn;
        $truck_history->otl_yn = $truck->otl_yn;
        $truck_history->id_rfid = $truck->id_rfid;

        $truck_history->alasan_blokir = $truck->alasan_blokir;
        $truck_history->tanggal_blokir = $truck->tanggal_blokir;
        $truck_history->nama_blokir = $truck->nama_blokir;

        $truck_history->tanggal_pengajuan = $truck->tanggal_pengajuan;
        $truck_history->tanggal_setujui = $truck->tanggal_setujui;
        $truck_history->nama_setujui = $truck->nama_setujui;
        $truck_history->save();

        //////////////////////////////////////////////////
        $truck = \App\Models\Truck::find($id);
        $truck->delete($truck);  

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_truck_delete = $email->subjek_truck_delete;
            $header_truck_delete = $email->header_truck_delete;
            $body_1_truck_delete = $email->body_1_truck_delete;
            $body_2_truck_delete = $email->body_2_truck_delete;
            $footer_truck_delete = $email->footer_truck_delete;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_truck_delete' => $header_truck_delete,
                'body_1_truck_delete' => $body_1_truck_delete,
                'body_2_truck_delete' => $body_2_truck_delete,
                'footer_truck_delete' => $footer_truck_delete,
            );

            $truck_history = \App\Models\Truck_history::find($id);
            Mail::send('emails.truck_hapus', $data, function($mail) use($subjek_truck_delete, $truck_history, $nama_pengirim_admin ){
                $mail->to($truck_history->email, 'no-reply')
                    ->subject($subjek_truck_delete, 'no-reply');
                $mail->from($truck_history->email, $nama_pengirim_admin );
            });   

        return redirect('/master_truck')->with('success', 'Data Truck Berhasil Dihapus');
    }
 
//////////////////////////////////////////////////////////
    
    public function send_email_pengambilan_rfid_tag(Request $request, $id)
    {
        $truck = \App\Models\Truck::find($id);
        //insert data ke tabel jadwal_pengambilan_rfid_tag
        $jadwal_pengambilan_rfid_tag = new \App\Models\Jadwal_pengambilan_rfid_tag;

        $jadwal_pengambilan_rfid_tag->owner_name = $truck->owner_name;
        $jadwal_pengambilan_rfid_tag->pic_nama = $truck->pic_nama;
        $jadwal_pengambilan_rfid_tag->email = $truck->email;
        $jadwal_pengambilan_rfid_tag->police_no = $truck->police_no;
        $jadwal_pengambilan_rfid_tag->id_rfid = $truck->id_rfid;
        $jadwal_pengambilan_rfid_tag->tanggal = date('Y-m-d', strtotime($request->tanggal)); 
        $jadwal_pengambilan_rfid_tag->save();

        //Data diambil dari request di modal
        $pengirim = $request->pengirim;
        $subject = $request->subject;
        $header = $request->header;
        $isi_1= $request->isi_1;
        $isi_2= $request->isi_2;
        $tanggal = date('d F Y', strtotime($request->tanggal)); 
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
        Mail::send('master_truck/jadwal_pengambilan_rfid_tag', $data, function($mail) use($pengirim, $subject, $email_tujuan){
            $mail->to($email_tujuan, 'no-reply')
                ->subject($subject, 'no-reply');
            $mail->from($email_tujuan, $pengirim);
        });

        //Cek kegagalan
        if (Mail::failures()){
            return redirect ('master_truck/'.$id.'/detail')->with('success', 'Gagal mengirim Email!');
        }
        return redirect ('master_truck/'.$id.'/detail')->with('success', 'Email Penjadwalan Pengambilan RFID tag berhasil dikirim!');
    }

    public function jadwal_pengambilan_rfid_tag()
    {
        $title = "master_truck";
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $jadwal_pengambilan_rfid_tag = \App\Models\Jadwal_pengambilan_rfid_tag::whereBetween('tanggal',[$start_date,$end_date])->get();
        } else {
            $jadwal_pengambilan_rfid_tag = \App\Models\Jadwal_pengambilan_rfid_tag::latest()->get();
        }

        return view('master_truck.rekapan_jadwal_pengambilan_rfid_tag',
            [
            'title' => $title,
            'jadwal_pengambilan_rfid_tag' => $jadwal_pengambilan_rfid_tag,
        ]);
    }

    public function status_pengambilan_rfid_tag(Request $request, $id)
    {

        $user = \App\Models\User::find($id);
        //lihat data
        $jadwal_pengambilan_rfid_tag = \DB::table('jadwal_pengambilan_rfid_tag')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $jadwal_pengambilan_rfid_tag->status;
        //kondisi
        if($status_sekarang == 'Belum Diambil'){
            \DB::table('jadwal_pengambilan_rfid_tag')->where('id',$id)->update([
                'status'=>'Sudah Diambil'
            ]);
        
        return redirect('master_truck/jadwal_pengambilan_rfid_tag')->with('success', 'Kartu RFID Truck Sudah Diambil');

        }elseif($status_sekarang == 'Sudah Diambil'){
            \DB::table('jadwal_pengambilan_rfid_tag')->where('id',$id)->update([
                'status'=>'Belum Diambil'
            ]);
        }

        return redirect('master_truck/jadwal_pengambilan_rfid_tag')->with('success', 'Kartu RFID Truck Dikembalikan');
    }

    public function cetak_rfid($id)
    {
        $truck = \App\Models\Truck::find($id);
 
        $pdf = PDF::loadview('master_truck.rfid_truck',['truck'=>$truck])
        ->setPaper('a7', 'landscape')
        ;
        return $pdf->stream();
        // return $pdf->download('laporan-truck-pdf');
    }

    public function cetak_data_truck($id)
    {
        $truck = \App\Models\Truck::find($id);
        $truck->tanggal = Carbon::now()->isoFormat('D MMMM Y');
        $pdf = PDF::loadview('master_truck.cetak_data_truck',[
            'truck'=>$truck
        ])
        // ->setPaper('a7', 'patroit')
        ;
        return $pdf->stream();
        // return $pdf->download('laporan-truck-pdf');
    }

    public function export_excel()
    {
        return Excel::download(new TruckExport, 'Truck.xls');
    }

/////////////////////////////////////////////////////////

    public function recycle_bin()
    {
        $title = "master_truck";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();
        $truck = \App\Models\Truck::all();
        $trucks = \App\Models\Truck_history::all();

        return view('master_truck.recycle_bin',
            [
            'title' => $title,
            'user' => $user,
            'company' => $company, 
            'truck' => $truck,
            'trucks' => $trucks,
        ]);
    }

    public function restore($id)
    {
        $truck_history = \App\Models\Truck_history::find($id);
        //memindahkan data truck_history ke data truck
        $truck = new \App\Models\Truck;

        $truck->id = $truck_history->id;
        $truck->company_id = $truck_history->company_id;
        $truck->status = $truck_history->status;
        $truck->owner_name = $truck_history->owner_name;
        $truck->pic_nama = $truck_history->pic_nama;
        $truck->email = $truck_history->email;
        $truck->police_no = $truck_history->police_no;
        $truck->stnk_no = $truck_history->stnk_no;
        $truck->machine_no = $truck_history->machine_no;
        $truck->design_no = $truck_history->design_no;
        $truck->expired_lisence = $truck_history->expired_lisence;
        $truck->foto_stnk = $truck_history->foto_stnk;
        $truck->trade_mark = $truck_history->trade_mark;
        $truck->year_made = $truck_history->year_made;
        $truck->state = $truck_history->state;
        $truck->truck_weight = $truck_history->truck_weight;
        $truck->foto_truck = $truck_history->foto_truck;
        $truck->foto_kir_truck = $truck_history->foto_kir_truck;

        $truck->chassis_code = $truck_history->chassis_code;
        $truck->jenis_chassis = $truck_history->jenis_chassis;
        $truck->chassis_weight = $truck_history->chassis_weight;
        $truck->foto_chassis = $truck_history->foto_chassis;
        $truck->foto_kir_chassis = $truck_history->foto_kir_chassis;

        $truck->id_customer = $truck_history->id_customer;
        $truck->customer = $truck_history->customer;
        $truck->site_id = $truck_history->site_id;
        $truck->truck_code = $truck_history->truck_code;
        $truck->upd_ts = $truck_history->upd_ts;
        $truck->opername = $truck_history->opername;
        $truck->gate_no = $truck_history->gate_no;
        $truck->total_weiht_ht_ch = $truck_history->total_weiht_ht_ch;
        $truck->bbg_yn = $truck_history->bbg_yn;
        $truck->otl_yn = $truck_history->otl_yn;
        $truck->id_rfid = $truck_history->id_rfid;

        $truck->alasan_blokir = $truck_history->alasan_blokir;
        $truck->tanggal_blokir = $truck_history->tanggal_blokir;
        $truck->nama_blokir = $truck_history->nama_blokir;

        $truck->tanggal_pengajuan = $truck_history->tanggal_pengajuan;
        $truck->tanggal_setujui = $truck_history->tanggal_setujui;
        $truck->nama_setujui = $truck_history->nama_setujui;
        $truck->save();

        //////////////////////////////////////////////////
        $truck_history = \App\Models\Truck_history::find($id);
        $truck_history->delete($truck_history);      

        return redirect('/master_truck/recycle_bin')->with('success', 'Data Truck Berhasil Dipulihkan');
    }

    public function clear()
    {
        $koneksi = mysqli_connect("localhost", "root", "", "project_master_truck");
        $sql = "DELETE FROM TRUCK_HISTORY";
        mysqli_query($koneksi, $sql);    

        return redirect('/master_truck/recycle_bin')->with('success', 'Data Truck Berhasil Dibersihkan');
    }



}
