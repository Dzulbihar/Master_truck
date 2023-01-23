<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailController extends Controller
{

/////////////// Email //////////////

    public function email()
    {
        $title = "email";
        $emails = \App\Models\Email::all();
        
        return view('tambah.email.email',[
            'title' => $title,
            'emails' => $emails,
        ]);
    }

    public function update(Request $request ,$id)
    {       
        $emails = \App\Models\Email::find($id);
        $emails->update($request->all());

        return redirect ('/email')->with('success', 'Data berhasil diupdate');
    }

    /////////////////////////////

    public function editemail_admin($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_admin', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_jadwal_rfid_tag($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_jadwal_rfid_tag', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_jadwal_ujian($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_jadwal_ujian', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    /////////////////////////////

    public function editemail_user_daftar($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_user_daftar', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_user_aktif($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_user_aktif', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_user_tidak_aktif($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_user_tidak_aktif', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_user_block($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_user_block', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_user_unblock($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_user_unblock', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    ////////////////////////////////////////////

    public function editemail_truck_daftar($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_truck_daftar', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_truck_approve($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_truck_approve', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_truck_reject($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_truck_reject', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_truck_delete($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_truck_delete', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_truck_block($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_truck_block', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_truck_unblock($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_truck_unblock', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    //////////////////////////////////////

    public function editemail_driver_daftar($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_driver_daftar', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_driver_approve($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_driver_approve', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_driver_reject($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_driver_reject', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_driver_delete($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_driver_delete', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_driver_block($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_driver_block', [
            'title' => $title,
            'email' => $email,
        ]);
    }

    public function editemail_driver_unblock($id)
    {
        $title = "email";
        $email = \App\Models\Email::find($id);

        return view('tambah.email.email_edit_driver_unblock', [
            'title' => $title,
            'email' => $email,
        ]);
    }

}
