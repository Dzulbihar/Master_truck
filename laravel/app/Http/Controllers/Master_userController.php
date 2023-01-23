<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Company;
use App\Models\Email;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class Master_userController extends Controller
{
    public function index()
    {
        $title = "master_user";
        $users = \App\Models\User::
        // ->where('role', 'user')
        orderBy('role', 'ASC')
        ->get();
        $company = \App\Models\Company::all();

        return view('master_user.index',
            [
            'title' => $title,
            'users' => $users,
            'company' => $company,
        ]);
    }

    public function cari(Request $request)
    {
        $title = "master_user";
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table sesuai pencarian data
        $users = DB::table('users')
        ->where('STATUS',$cari)
        ->orderBy('role', 'ASC')
        ->get();

        // mengirim data pegawai ke view index
        return view('master_user.index',
            [
            'users' => $users,
            'title' => $title
        ]);
    }

    public function add()
    {
        $title = "master_user";
        $user = \App\Models\User::all();
        $company = \App\Models\Company::all();

        return view('master_user.add',
            [
            'title' => $title,
            'user' => $user,
            'company' => $company, 
        ]);
    }

    public function create(Request $request)
    {
        $password = $request->password;
        // Validasi kekuatan password
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
         
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {

            return redirect ('/master_user/add')->with('warning', 'Pasword setidaknya harus 8 karakter dan harus memiliki huruf besar, huruf kecil, angka, dan spesial karakter.');

        }else{
            
            if ($_POST['password']==$_POST['password2'] ) {

                $messages = [
                    'required' => '*kolom wajib diisi ya!!!',
                    'mimes' => '*upload dengan format jpg, jpeg, pdf!',
                    // 'min' => '*upload file minimal 1 mb !',
                    'max' => '*upload file maksimal 4 mb!',
                    'unique' => 'Email sudah terdaftar! silakan ulangi pendaftaran',
                    // 'alpha' => '*kolom hanya boleh disi huruf ya!!!',
                    // 'numeric' => '*kolom hanya boleh disi angka ya!!!',
                    // 'email' => '*kolom hanya boleh disi email ya!!!',
                ];
         
                $this->validate($request,[
                    'email' => ['required', 'max:255',Rule::unique('users')->where('email', $request->email)],
                    'file_nib_company' => 'mimes:pdf,jpg,jpeg|file|max:4096',
                    'file_npwp_company' => 'mimes:pdf,jpg,jpeg|file|max:4096',
                    'file_pmku_company' => 'mimes:pdf,jpg,jpeg|file|max:4096',
                    // 'email' => 'required|email|min:5|max:30',
                    'statement_form' => 'mimes:pdf,jpg,jpeg|file|max:4096',
                ],$messages);

                //input pendaftaran sebagai user dulu
                $user = new \App\Models\User;
                $user->role = $request->role;
                $user->owner_name = $request->owner_name;
                $user->status = 'Aktif';
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->password2 = bcrypt($request->password2);
                $user->tgl_pengajuan = Carbon::now();
               // $user->remember_token = str_random(60);
                $user->save();
            
                //insert ke tabel company
                $request->request->add(['id' => $user->id ]);
                $request->request->add(['user_id' => $user->id ]);
                $request->request->add(['owner_name' => $user->owner_name ]);
                $request->request->add(['email' => $user->email ]);

                $company = \App\Models\Company::create($request->all());

                // Mail::to('ahmad.dzulbihar69@gmail.com')->send(new userDaftar());

                return redirect ('/master_user')->with('success', 'Data Pendaftaran Berhasil Dikirim');

            }else {
                return redirect ('/master_user/add')->with('warning', 'Password yang Anda Masukan Tidak Sama! Silakan ulangi kembali!');
            }
        }
    }

    public function edit($id)
    {
        $title = "master_user";
        $user = \App\Models\User::find($id);
        $company = \App\Models\Company::find($id);

        return view('master_user.edit', [
            'title' => $title,
            'user' => $user,
            'company' => $company,
        ]);
    }

    public function update(Request $request ,$id)
    {       
        $user = \App\Models\User::find($id);
        $user->update($request->all());

        return redirect ('/master_user')->with('success', 'Data User Berhasil Diupdate');
    }

    public function status($id)
    {
        //lihat data
        $user = \DB::table('users')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $user->status;
        //kondisi
        if($status_sekarang == 'Tidak Aktif'){
            \DB::table('users')->where('id',$id)->update([
                'status'=>'Aktif'
            ]);
            \DB::table('users')->where('id',$id)->update([
                'tgl_disetujui'=>Carbon::now(),'disetujui_oleh'=>Auth::user()->owner_name
            ]);

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_user_aktif = $email->subjek_user_aktif;
            $header_user_aktif = $email->header_user_aktif;
            $body_1_user_aktif = $email->body_1_user_aktif;
            $body_2_user_aktif = $email->body_2_user_aktif;
            $footer_user_aktif = $email->footer_user_aktif;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_user_aktif' => $header_user_aktif,
                'body_1_user_aktif' => $body_1_user_aktif,
                'body_2_user_aktif' => $body_2_user_aktif,
                'footer_user_aktif' => $footer_user_aktif,
            );

            $user = \App\Models\User::find($id);
            Mail::send('emails.user_aktif', $data, function($mail) use($subjek_user_aktif, $user, $nama_pengirim_admin ){
                $mail->to($user->email, 'no-reply')
                    ->subject($subjek_user_aktif, 'no-reply');
                $mail->from($user->email, $nama_pengirim_admin );
            });

            return redirect('master_user/'.$id.'/detail')->with('success', ' Akun User Berhasil Diaktifkan');

        }elseif($status_sekarang == 'Aktif'){
            \DB::table('users')->where('id',$id)->update([
                'status'=>'Tidak Aktif'
            ]);
            \DB::table('users')->where('id',$id)->update([
                'tgl_disetujui'=>'','disetujui_oleh'=>''
            ]);

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_user_tidak_aktif = $email->subjek_user_tidak_aktif;
            $header_user_tidak_aktif = $email->header_user_tidak_aktif;
            $body_1_user_tidak_aktif = $email->body_1_user_tidak_aktif;
            $body_2_user_tidak_aktif = $email->body_2_user_tidak_aktif;
            $footer_user_tidak_aktif = $email->footer_user_tidak_aktif;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_user_tidak_aktif' => $header_user_tidak_aktif,
                'body_1_user_tidak_aktif' => $body_1_user_tidak_aktif,
                'body_2_user_tidak_aktif' => $body_2_user_tidak_aktif,
                'footer_user_tidak_aktif' => $footer_user_tidak_aktif,
            );

            $user = \App\Models\User::find($id);
            Mail::send('emails.user_tidak_aktif', $data, function($mail) use($subjek_user_tidak_aktif, $user, $nama_pengirim_admin ){
                $mail->to($user->email, 'no-reply')
                    ->subject($subjek_user_tidak_aktif, 'no-reply');
                $mail->from($user->email, $nama_pengirim_admin );
            });

            return redirect('master_user/'.$id.'/detail')->with('success', ' Akun User Batal Diaktifkan');

        }elseif($status_sekarang == 'Blokir'){
            \DB::table('users')->where('id',$id)->update([
                'status'=>'Aktif'
            ]);
            \DB::table('users')->where('id',$id)->update([
                'alasan_blokir'=>''
            ]);

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_user_unblock = $email->subjek_user_unblock;
            $header_user_unblock = $email->header_user_unblock;
            $body_1_user_unblock = $email->body_1_user_unblock;
            $body_2_user_unblock = $email->body_2_user_unblock;
            $footer_user_unblock = $email->footer_user_unblock;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_user_unblock' => $header_user_unblock,
                'body_1_user_unblock' => $body_1_user_unblock,
                'body_2_user_unblock' => $body_2_user_unblock,
                'footer_user_unblock' => $footer_user_unblock,
            );

            $user = \App\Models\User::find($id);
            Mail::send('emails.user_tidak_blokir', $data, function($mail) use($subjek_user_unblock, $user, $nama_pengirim_admin ){
                $mail->to($user->email, 'no-reply')
                    ->subject($subjek_user_unblock, 'no-reply');
                $mail->from($user->email, $nama_pengirim_admin );
            });

            return redirect('master_user/'.$id.'/detail')->with('success', ' Akun User Berhasil Diaktifkan kembali');
        }        
    }

    public function edit_blokir($id)
    {
        $title = "master_user";
        $user = \App\Models\User::find($id);

        return view('master_user.edit_blokir', [
            'title' => $title,
            'user' => $user,
        ]);
    }

    public function update_blokir(Request $request ,$id)
    {       
        $user = \App\Models\User::find($id);
        $user->update($request->all());

        //lihat data
        $user = \DB::table('users')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $user->status;
        //kondisi
        if($status_sekarang == 'Aktif'){
            \DB::table('users')->where('id',$id)->update([
                'status'=>'Blokir'
            ]);

            //Mengambil data dari email
            $email = Email::where('id', '1')->first();
            $subjek_user_block = $email->subjek_user_block;
            $header_user_block = $email->header_user_block;
            $body_1_user_block = $email->body_1_user_block;
            $body_2_user_block = $email->body_2_user_block;
            $footer_user_block = $email->footer_user_block;
            $nama_pengirim_admin = $email->nama_pengirim_admin;
            $data = array(
                'header_user_block' => $header_user_block,
                'body_1_user_block' => $body_1_user_block,
                'body_2_user_block' => $body_2_user_block,
                'footer_user_block' => $footer_user_block,
            );

            $user = \App\Models\User::find($id);
            Mail::send('emails.user_blokir', $data, function($mail) use($subjek_user_block, $user, $nama_pengirim_admin ){
                $mail->to($user->email, 'no-reply')
                    ->subject($subjek_user_block, 'no-reply');
                $mail->from($user->email, $nama_pengirim_admin );
            });
        }

        return redirect ('master_user/'.$id.'/detail')->with('success', 'Akun User Berhasil Diblokir');
    }

    public function delete($id)
    {
        $User = \App\Models\User::find($id);
        $User->delete($User);

        return redirect('/master_user')->with('error', 'Data User berhasil dihapus');
    }

//////////////////////////////////////////////////////////


    public function detail($id)
    {
        $title = "master_user";
        $user = \App\Models\User::find($id);
        $company = \App\Models\Company::find($id);
        // $company = \App\Models\Company::where('user_id',$id)->get();
        
        return view('master_user.detail', [
            'title' => $title,
            'user' => $user,
            'company' => $company,
        ]);
    }


    public function detail_edit($id)
    {
        $title = "master_user";
        $company = \App\Models\Company::find($id);

        return view('master_user.detail_edit', [
            'title' => $title,
            'company' => $company,
        ]);
    }

    public function detail_update(Request $request ,$id)
    {       
        $messages = [
            'mimes' => '*upload dengan format jpg, jpeg, pdf!',
            'max' => '*upload file maksimal 4 mb!',
        ];
 
        $this->validate($request,[
            'file_nib_company' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_npwp_company' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_pmku_company' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'statement_form' => 'mimes:pdf,jpg,jpeg|file|max:4096',
        ],$messages);

        $company = \App\Models\Company::find($id);
        $company->update($request->all());

        //file_nib_company 
        if($request->hasFile('file_nib_company'))
        {
            $file_file_nib_company = time()."_".$request->file('file_nib_company')->getClientOriginalName();
            $request->file('file_nib_company')->move('images/',$file_file_nib_company);
            $company->file_nib_company = $file_file_nib_company;
            $company->save();
        }
        //file_npwp_company 
        if($request->hasFile('file_npwp_company'))
        {
            $file_file_npwp_company = time()."_".$request->file('file_npwp_company')->getClientOriginalName();
            $request->file('file_npwp_company')->move('images/',$file_file_npwp_company);
            $company->file_npwp_company = $file_file_npwp_company;
            $company->save();
        }
        //file_pmku_company 
        if($request->hasFile('file_pmku_company'))
        {
            $file_file_pmku_company = time()."_".$request->file('file_pmku_company')->getClientOriginalName();
            $request->file('file_pmku_company')->move('images/',$file_file_pmku_company);
            $company->file_pmku_company = $file_file_pmku_company;
            $company->save();
        }
        //statement_form 
        if($request->hasFile('statement_form'))
        {
            $file_statement_form = time()."_".$request->file('statement_form')->getClientOriginalName();
            $request->file('statement_form')->move('images/',$file_statement_form);
            $company->statement_form = $file_statement_form;
            $company->save();
        }

        return redirect ('master_user/'.$id.'/detail')->with('success', 'Data berhasil diupdate');
    }


////////////////////////////////////////////////////////////

    public function foto_nib_perusahaan($id)
    {
        $title = "master_user";
        $user = \App\Models\User::find($id);
        $company = \App\Models\Company::find($id);
        
        return view('master_user.foto_nib_perusahaan', [
            'title' => $title,
            'user' => $user,
            'company' => $company,
        ]);
    }

    public function foto_npwp_perusahaan($id)
    {
        $title = "master_user";
        $user = \App\Models\User::find($id);
        $company = \App\Models\Company::find($id);
        
        return view('master_user.foto_npwp_perusahaan', [
            'title' => $title,
            'user' => $user,
            'company' => $company,
        ]);
    }

    public function form_pernyataan($id)
    {
        $title = "master_user";
        $user = \App\Models\User::find($id);
        $company = \App\Models\Company::find($id);
        
        return view('master_user.form_pernyataan', [
            'title' => $title,
            'user' => $user,
            'company' => $company,
        ]);
    }

    public function file_pmku_company($id)
    {
        $title = "master_user";
        $user = \App\Models\User::find($id);
        $company = \App\Models\Company::find($id);
        
        return view('master_user.file_pmku_company', [
            'title' => $title,
            'user' => $user,
            'company' => $company,
        ]);
    }

}
