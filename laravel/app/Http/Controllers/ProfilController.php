<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Email;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Auth;

class ProfilController extends Controller
{

    public function profilperusahaan() 
    {
        $title = "profilperusahaan";
        $company = auth()->user()->company;
        return view('profil.profilperusahaan', compact(['company','title']));
    }

    public function edit($id)
    {
        $title = "profilperusahaan";
        $company = \App\Models\Company::find($id);

        return view('profil.profilperusahaan_edit', [
            'title' => $title,
            'company' => $company
        ]);
    }

    public function update(Request $request ,$id)
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

        $company = Company::find($id);
        $company->update($request->all());

        //tambah file_nib_company
        if($request->hasFile('file_nib_company'))
        {
            $file_file_nib_company = time()."_".$request->file('file_nib_company')->getClientOriginalName();
            $request->file('file_nib_company')->move('images/',$file_file_nib_company);
            $company->file_nib_company = $file_file_nib_company;
            $company->save();
        }

        // file_npwp_company
        if($request->hasFile('file_npwp_company'))
        {
            $file_file_npwp_company = time()."_".$request->file('file_npwp_company')->getClientOriginalName();
            $request->file('file_npwp_company')->move('images/',$file_file_npwp_company);
            $company->file_npwp_company = $file_file_npwp_company;
            $company->save();
        }

        // file_pmku_company
        if($request->hasFile('file_pmku_company'))
        {
            $file_file_pmku_company = time()."_".$request->file('file_pmku_company')->getClientOriginalName();
            $request->file('file_pmku_company')->move('images/',$file_file_pmku_company);
            $company->file_pmku_company = $file_file_pmku_company;
            $company->save();
        }

        // statement_form
        if($request->hasFile('statement_form'))
        {
            $file_statement_form = time()."_".$request->file('statement_form')->getClientOriginalName();
            $request->file('statement_form')->move('images/',$file_statement_form);
            $company->statement_form = $file_statement_form;
            $company->save();
        }

        return redirect ('/home')->with('success', 'Data berhasil diupdate');
    }

    public function approver_admin()
    {
        //Mengambil data dari email
        $email = Email::where('id', '1')->first();
        $subjek_user_daftar = $email->subjek_user_daftar;
        $header_user_daftar = $email->header_user_daftar;
        $body_1_user_daftar = $email->body_1_user_daftar;
        $body_2_user_daftar = $email->body_2_user_daftar;
        $footer_user_daftar = $email->footer_user_daftar;
        $nama_pengirim_admin = $email->nama_pengirim_admin;
        $data = array(
            'header_user_daftar' => $header_user_daftar,
            'body_1_user_daftar' => $body_1_user_daftar,
            'body_2_user_daftar' => $body_2_user_daftar,
            'footer_user_daftar' => $footer_user_daftar,
        );

        Mail::send('emails.user_daftar', $data, function($mail) use($subjek_user_daftar, $email, $nama_pengirim_admin ){
            $mail->to($email->alamat_email_admin, 'no-reply')
                ->subject($subjek_user_daftar, 'no-reply');
            $mail->from($email->alamat_email_admin, $nama_pengirim_admin );
        });

        return redirect ('/home')->with('success', 'Data Profil Anda Berhasil Dikirim! Pengajuan Anda sedang kami proses. Silakan menunggu persetujuan dari Admin HSSE melalui notifikasi email!');

    }

}
