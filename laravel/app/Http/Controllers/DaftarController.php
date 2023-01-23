<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Email_user;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class DaftarController extends Controller
{

    public function daftar()
    {
        return view('daftar');
    }

    public function simpandaftar(Request $request)
    {
        $password = $request->password;
        // Validasi kekuatan password
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
         
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {

            return redirect ('/daftar')->with('warning', 'Pasword setidaknya harus 8 karakter dan harus memiliki huruf besar, huruf kecil, angka, dan spesial karakter.');

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
                $user = new User;
                $user->role = 'user';
                $user->owner_name = $request->owner_name;
                $user->status = 'Tidak Aktif';
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->password2 = bcrypt($request->password2);
                $user->tgl_pengajuan = Carbon::now();
               // $user->remember_token = str_random(60);
                $user->save();
            
                //insert ke tabel company
                $request->request->add(['id' => $user->id ]);
                $request->request->add(['user_id' => $user->id ]);
                $request->request->add(['email' => $user->email ]);

                $company = \App\Models\Company::create($request->all());

                return redirect ('/login')->with('success', 'Data Pendaftaran Berhasil Dikirim');

            }else {
                return redirect ('/daftar')->with('warning', 'Password yang Anda Masukan Tidak Sama! Silakan ulangi kembali!');
            }

        }

    }

}
