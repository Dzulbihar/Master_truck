<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/daftar', [App\Http\Controllers\DaftarController::class, 'daftar']);
Route::post('/simpandaftar', [App\Http\Controllers\DaftarController::class, 'simpandaftar'])->name('simpandaftar');
Route::get('/tamplate', [App\Http\Controllers\FileController::class, 'tamplate']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','checkRole:admin']],function(){

    ////////////////////////////// MASTER USER  //////////////////////////////
        Route::get('/master_user', [App\Http\Controllers\Master_userController::class, 'index']);
        Route::get('/master_user/add', [App\Http\Controllers\Master_userController::class, 'add']);
        Route::post('/master_user/create', [App\Http\Controllers\Master_userController::class, 'create']);
        Route::get('/master_user/{id}/edit', [App\Http\Controllers\Master_userController::class, 'edit']);
        Route::post('/master_user/{id}/update', [App\Http\Controllers\Master_userController::class, 'update']);
        Route::get('/master_user/cari', [App\Http\Controllers\Master_userController::class, 'cari']);
        Route::get('/master_user/status/{id}', [App\Http\Controllers\Master_userController::class, 'status']);
        Route::get('/master_user/{id}/edit_blokir', [App\Http\Controllers\Master_userController::class, 'edit_blokir']);
        Route::post('/master_user/{id}/update_blokir', [App\Http\Controllers\Master_userController::class, 'update_blokir']);
        Route::get('/master_user/{id}/detail', [App\Http\Controllers\Master_userController::class, 'detail']);
        Route::get('/master_user/{id}/detail_edit', [App\Http\Controllers\Master_userController::class, 'detail_edit']);
        Route::post('/master_user/{id}/detail_update', [App\Http\Controllers\Master_userController::class, 'detail_update']);
        Route::get('/master_user/{id}/foto_nib_perusahaan', [App\Http\Controllers\Master_userController::class, 'foto_nib_perusahaan']);
        Route::get('/master_user/{id}/foto_npwp_perusahaan', [App\Http\Controllers\Master_userController::class, 'foto_npwp_perusahaan']);
        Route::get('/master_user/{id}/file_pmku_company', [App\Http\Controllers\Master_userController::class, 'file_pmku_company']);
        Route::get('/master_user/{id}/form_pernyataan', [App\Http\Controllers\Master_userController::class, 'form_pernyataan']);
     
    ////////////////////////////// MASTER TRUCK //////////////////////////////
        Route::get('/master_truck', [App\Http\Controllers\Master_truckController::class, 'index']);
        Route::get('/master_truck/cari', [App\Http\Controllers\Master_truckController::class, 'cari']);

        Route::get('/master_truck/status_approve_master_truck/{id}', [App\Http\Controllers\Master_truckController::class, 'status_approve_master_truck']);
        Route::get('/master_truck/status_reject_master_truck/{id}', [App\Http\Controllers\Master_truckController::class, 'status_reject_master_truck']);
        Route::get('/master_truck/status_block_master_truck/{id}', [App\Http\Controllers\Master_truckController::class, 'status_block_master_truck']);
        Route::get('/master_truck/status_unblock_master_truck/{id}', [App\Http\Controllers\Master_truckController::class, 'status_unblock_master_truck']);

        Route::get('/master_truck/add', [App\Http\Controllers\Master_truckController::class, 'add']);
        Route::post('/master_truck/create', [App\Http\Controllers\Master_truckController::class, 'create']);
        Route::get('/master_truck/{id}/edit_data', [App\Http\Controllers\Master_truckController::class, 'edit_data']);
        Route::post('/master_truck/{id}/update_data', [App\Http\Controllers\Master_truckController::class, 'update_data']);
        Route::get('/master_truck/{id}/edit_file', [App\Http\Controllers\Master_truckController::class, 'edit_file']);
        Route::post('/master_truck/{id}/update_file', [App\Http\Controllers\Master_truckController::class, 'update_file']);

        Route::get('/master_truck/{id}/detail', [App\Http\Controllers\Master_truckController::class, 'detail']);
        Route::get('/master_truck/{id}/delete', [App\Http\Controllers\Master_truckController::class, 'delete']);

        Route::post('/send_email_pengambilan_rfid_tag/{id}', [App\Http\Controllers\Master_truckController::class, 'send_email_pengambilan_rfid_tag']);
        Route::get('/master_truck/jadwal_pengambilan_rfid_tag', [App\Http\Controllers\Master_truckController::class, 'jadwal_pengambilan_rfid_tag']);
        Route::get('/master_truck/status_pengambilan_rfid_tag/{id}', [App\Http\Controllers\Master_truckController::class, 'status_pengambilan_rfid_tag']);

        Route::get('/master_truck/{id}/cetak_rfid', [App\Http\Controllers\Master_truckController::class, 'cetak_rfid']);
        Route::get('/master_truck/{id}/cetak_data_truck', [App\Http\Controllers\Master_truckController::class, 'cetak_data_truck']);

        Route::get('/master_truck/recycle_bin', [App\Http\Controllers\Master_truckController::class, 'recycle_bin']);
        Route::get('/master_truck/{id}/restore', [App\Http\Controllers\Master_truckController::class, 'restore']);
        Route::get('/master_truck/recycle_bin/clear', [App\Http\Controllers\Master_truckController::class, 'clear']);
     
        Route::get('/master_truck/export_excel', [App\Http\Controllers\Master_truckController::class, 'export_excel']);

    ////////////////////////////// MASTER DRIVER //////////////////////////////
        Route::get('/master_driver', [App\Http\Controllers\Master_driverController::class, 'index']);
        Route::get('/master_driver/cari', [App\Http\Controllers\Master_driverController::class, 'cari']);

        Route::get('/master_driver/status_approve_master_driver/{id}', [App\Http\Controllers\Master_driverController::class, 'status_approve_master_driver']);
        Route::get('/master_driver/status_reject_master_driver/{id}', [App\Http\Controllers\Master_driverController::class, 'status_reject_master_driver']);
        Route::get('/master_driver/status_block_master_driver/{id}', [App\Http\Controllers\Master_driverController::class, 'status_block_master_driver']);
        Route::get('/master_driver/status_unblock_master_driver/{id}', [App\Http\Controllers\Master_driverController::class, 'status_unblock_master_driver']);

        Route::get('/master_driver/add', [App\Http\Controllers\Master_driverController::class, 'add']);
        Route::post('/master_driver/create', [App\Http\Controllers\Master_driverController::class, 'create']);
        Route::get('/master_driver/{id}/edit_data', [App\Http\Controllers\Master_driverController::class, 'edit_data']);
        Route::post('/master_driver/{id}/update_data', [App\Http\Controllers\Master_driverController::class, 'update_data']);
        Route::get('/master_driver/{id}/edit_file', [App\Http\Controllers\Master_driverController::class, 'edit_file']);
        Route::post('/master_driver/{id}/update_file', [App\Http\Controllers\Master_driverController::class, 'update_file']);
        
        Route::get('/master_driver/{id}/detail', [App\Http\Controllers\Master_driverController::class, 'detail']);
        Route::get('/master_driver/{id}/delete', [App\Http\Controllers\Master_driverController::class, 'delete']);

        Route::post('/send_email_ujian_driver/{id}', [App\Http\Controllers\Master_driverController::class, 'send_email_ujian_driver']);
        Route::get('/master_driver/jadwal_ujian_driver', [App\Http\Controllers\Master_driverController::class, 'jadwal_ujian_driver']);
        Route::get('/master_driver/status_jadwal_ujian/{id}', [App\Http\Controllers\Master_driverController::class, 'status_jadwal_ujian']);

        Route::get('/master_driver/{id}/cetak_rfid', [App\Http\Controllers\Master_driverController::class, 'cetak_rfid']);
        Route::get('/master_driver/{id}/cetak_data_driver', [App\Http\Controllers\Master_driverController::class, 'cetak_data_driver']);

        Route::get('/master_driver/recycle_bin', [App\Http\Controllers\Master_driverController::class, 'recycle_bin']);
        Route::get('/master_driver/{id}/restore', [App\Http\Controllers\Master_driverController::class, 'restore']);
        Route::get('/master_driver/recycle_bin/clear', [App\Http\Controllers\Master_driverController::class, 'clear']);

        Route::get('/master_driver/export_excel', [App\Http\Controllers\Master_driverController::class, 'export_excel']);

    //////////////////////////////  MATERI UJIAN //////////////////////////////
        Route::get('/kirim_materi_ujian/{id}/kirim_materi_ujian', [App\Http\Controllers\ProsesUjianController::class, 'kirim_materi_ujian']);
        Route::get('/kirim_materi_ujian/{id}/nilai_ujian', [App\Http\Controllers\ProsesUjianController::class, 'nilai_ujian']);
        Route::get('/kirim_materi_ujian/{id}/konfirmasi_kelulusan', [App\Http\Controllers\ProsesUjianController::class, 'konfirmasi_kelulusan']);

    ////////////////////////////// MASTER PELANGGARAN ///////////////////////
        Route::get('/violation/{id}/index', [App\Http\Controllers\ViolationController::class, 'index']);
        Route::get('/violation/{id}/add', [App\Http\Controllers\ViolationController::class, 'add']);
        Route::post('/violation/{id}/addviolation', [App\Http\Controllers\ViolationController::class, 'addviolation']);
        Route::get('/violation/{driverid}/{violationid}/edit', [App\Http\Controllers\ViolationController::class, 'edit']);
        Route::post('/violation/{driverid}/{violationid}/update', [App\Http\Controllers\ViolationController::class, 'update']);
        Route::get('/violation/{driverid}/{violationid}/delete', [App\Http\Controllers\ViolationController::class, 'delete']);

        Route::get('/getPelanggaranBentuk', [App\Http\Controllers\ViolationController::class, 'getPelanggaranBentuk']);

        Route::get('/violation/{id}/recycle_bin', [App\Http\Controllers\ViolationController::class, 'recycle_bin']);
        Route::get('/violation/{driverid}/{violationid}/restore', [App\Http\Controllers\ViolationController::class, 'restore']);
        Route::get('/violation/{id}/clear', [App\Http\Controllers\ViolationController::class, 'clear']);

        Route::get('/master_driver/rekapan_pelanggaran', [App\Http\Controllers\ViolationController::class, 'rekapan_pelanggaran']);

    ////////////////////////////// MASTER EMAIL  //////////////////////////////
        Route::get('/email', [App\Http\Controllers\EmailController::class, 'email']);
        Route::post('/email/{id}/update', [App\Http\Controllers\EmailController::class, 'update']);
        
        Route::get('/email/{id}/editemail_admin', [App\Http\Controllers\EmailController::class, 'editemail_admin']);
        Route::get('/email/{id}/editemail_jadwal_rfid_tag', [App\Http\Controllers\EmailController::class, 'editemail_jadwal_rfid_tag']);
        Route::get('/email/{id}/editemail_jadwal_ujian', [App\Http\Controllers\EmailController::class, 'editemail_jadwal_ujian']);
        ////////////////////////////////////////////////////////
        Route::get('/email/{id}/editemail_user_daftar', [App\Http\Controllers\EmailController::class, 'editemail_user_daftar']);
        Route::get('/email/{id}/editemail_user_aktif', [App\Http\Controllers\EmailController::class, 'editemail_user_aktif']);
        Route::get('/email/{id}/editemail_user_tidak_aktif', [App\Http\Controllers\EmailController::class, 'editemail_user_tidak_aktif']);
        Route::get('/email/{id}/editemail_user_block', [App\Http\Controllers\EmailController::class, 'editemail_user_block']);
        Route::get('/email/{id}/editemail_user_unblock', [App\Http\Controllers\EmailController::class, 'editemail_user_unblock']);
        ////////////////////////////////////////////////////////
        Route::get('/email/{id}/editemail_truck_daftar', [App\Http\Controllers\EmailController::class, 'editemail_truck_daftar']);
        Route::get('/email/{id}/editemail_truck_approve', [App\Http\Controllers\EmailController::class, 'editemail_truck_approve']);
        Route::get('/email/{id}/editemail_truck_reject', [App\Http\Controllers\EmailController::class, 'editemail_truck_reject']);
        Route::get('/email/{id}/editemail_truck_delete', [App\Http\Controllers\EmailController::class, 'editemail_truck_delete']);
        Route::get('/email/{id}/editemail_truck_block', [App\Http\Controllers\EmailController::class, 'editemail_truck_block']);
        Route::get('/email/{id}/editemail_truck_unblock', [App\Http\Controllers\EmailController::class, 'editemail_truck_unblock']);
        ////////////////////////////////////////////////////////
        Route::get('/email/{id}/editemail_driver_daftar', [App\Http\Controllers\EmailController::class, 'editemail_driver_daftar']);
        Route::get('/email/{id}/editemail_driver_approve', [App\Http\Controllers\EmailController::class, 'editemail_driver_approve']);
        Route::get('/email/{id}/editemail_driver_reject', [App\Http\Controllers\EmailController::class, 'editemail_driver_reject']);
        Route::get('/email/{id}/editemail_driver_delete', [App\Http\Controllers\EmailController::class, 'editemail_driver_delete']);
        Route::get('/email/{id}/editemail_driver_block', [App\Http\Controllers\EmailController::class, 'editemail_driver_block']);
        Route::get('/email/{id}/editemail_driver_unblock', [App\Http\Controllers\EmailController::class, 'editemail_driver_unblock']);  
      
    ////////////////////////////// MASTER MERK  //////////////////////////////
        Route::get('/merk', [App\Http\Controllers\TambahController::class, 'merk']);
        Route::post('/merk/createmerk', [App\Http\Controllers\TambahController::class, 'createmerk']);

        Route::get('/merk/statusmerk/{id}', [App\Http\Controllers\TambahController::class, 'statusmerk']);

        Route::get('/merk/{id}/editmerk', [App\Http\Controllers\TambahController::class, 'editmerk']);
        Route::post('/merk/{id}/updatemerk', [App\Http\Controllers\TambahController::class, 'updatemerk']);
        Route::get('/merk/{id}/deletemerk', [App\Http\Controllers\TambahController::class, 'deletemerk']);

    ////////////////////////////// MASTER KOTA  //////////////////////////////
        Route::get('/kota', [App\Http\Controllers\TambahController::class, 'kota']);
        Route::post('/kota/createkota', [App\Http\Controllers\TambahController::class, 'createkota']);

        Route::get('/kota/statuskota/{id}', [App\Http\Controllers\TambahController::class, 'statuskota']);

        Route::get('/kota/{id}/editkota', [App\Http\Controllers\TambahController::class, 'editkota']);
        Route::post('/kota/{id}/updatekota', [App\Http\Controllers\TambahController::class, 'updatekota']);
        Route::get('/kota/{id}/deletekota', [App\Http\Controllers\TambahController::class, 'deletekota']);

    ////////////////////////////// MASTER CHASIS CODE  ///////////////////////
        Route::get('/chasis_code', [App\Http\Controllers\TambahController::class, 'chasis_code']);
        Route::post('/chasis_code/createchasis_code', [App\Http\Controllers\TambahController::class, 'createchasis_code']);

        Route::get('/chasis_code/statuschasis_code/{id}', [App\Http\Controllers\TambahController::class, 'statuschasis_code']);

        Route::get('/chasis_code/{id}/editchasis_code', [App\Http\Controllers\TambahController::class, 'editchasis_code']);
        Route::post('/chasis_code/{id}/updatechasis_code', [App\Http\Controllers\TambahController::class, 'updatechasis_code']);
        Route::get('/chasis_code/{id}/deletechasis_code', [App\Http\Controllers\TambahController::class, 'deletechasis_code']);

    ////////////////////////////// MASTER MATERI UJIAN  /////////////////////
        Route::get('/materi_ujian', [App\Http\Controllers\TambahController::class, 'materi_ujian']);
        Route::post('/materi_ujian/createmateri_ujian', [App\Http\Controllers\TambahController::class, 'createmateri_ujian']);
        Route::get('/materi_ujian/statusmateri_ujian/{id}', [App\Http\Controllers\TambahController::class, 'statusmateri_ujian']);
        Route::get('/materi_ujian/{id}/editmateri_ujian', [App\Http\Controllers\TambahController::class, 'editmateri_ujian']);
        Route::post('/materi_ujian/{id}/updatemateri_ujian', [App\Http\Controllers\TambahController::class, 'updatemateri_ujian']);
        Route::get('/materi_ujian/{id}/deletemateri_ujian', [App\Http\Controllers\TambahController::class, 'deletemateri_ujian']);

    ////////////////////////////// MASTER JENIS PELANGGARAN  //////////////////
        Route::get('/jenis_pelanggaran', [App\Http\Controllers\TambahController::class, 'jenis_pelanggaran']);
        Route::post('/jenis_pelanggaran/createjenis_pelanggaran', [App\Http\Controllers\TambahController::class, 'createjenis_pelanggaran']);

        Route::get('/jenis_pelanggaran/statusjenis_pelanggaran/{id}', [App\Http\Controllers\TambahController::class, 'statusjenis_pelanggaran']);

        Route::get('/jenis_pelanggaran/{id}/editjenis_pelanggaran', [App\Http\Controllers\TambahController::class, 'editjenis_pelanggaran']);
        Route::post('/jenis_pelanggaran/{id}/updatejenis_pelanggaran', [App\Http\Controllers\TambahController::class, 'updatejenis_pelanggaran']);
        Route::get('/jenis_pelanggaran/{id}/deletejenis_pelanggaran', [App\Http\Controllers\TambahController::class, 'deletejenis_pelanggaran']);

    ////////////////////////////// MASTER BENTUK PELANGGARAN  /////////////////
        Route::get('/bentuk_pelanggaran', [App\Http\Controllers\TambahController::class, 'bentuk_pelanggaran']);
        Route::post('/bentuk_pelanggaran/createbentuk_pelanggaran', [App\Http\Controllers\TambahController::class, 'createbentuk_pelanggaran']);

        Route::get('/bentuk_pelanggaran/statusbentuk_pelanggaran/{id}', [App\Http\Controllers\TambahController::class, 'statusbentuk_pelanggaran']);

        Route::get('/bentuk_pelanggaran/{id}/editbentuk_pelanggaran', [App\Http\Controllers\TambahController::class, 'editbentuk_pelanggaran']);
        Route::post('/bentuk_pelanggaran/{id}/updatebentuk_pelanggaran', [App\Http\Controllers\TambahController::class, 'updatebentuk_pelanggaran']);
        Route::get('/bentuk_pelanggaran/{id}/deletebentuk_pelanggaran', [App\Http\Controllers\TambahController::class, 'deletebentuk_pelanggaran']);

});

Route::group(['middleware' => ['auth','checkRole:user']],function(){

////////////////////////////// PROFILE  //////////////////////////////
    Route::get('/approver_admin', [App\Http\Controllers\ProfilController::class, 'approver_admin']);
    Route::get('/profilperusahaan', [App\Http\Controllers\ProfilController::class, 'profilperusahaan']);
    Route::get('/profilperusahaan/{id}/edit', [App\Http\Controllers\ProfilController::class, 'edit']);
    Route::post('/profilperusahaan/{id}/update', [App\Http\Controllers\ProfilController::class, 'update']); 


////////////////////////////// TRUCK  //////////////////////////////
    Route::get('/truck/{id}/index', [App\Http\Controllers\TruckController::class, 'index']);
    Route::get('/truck/cari/{id}', [App\Http\Controllers\TruckController::class, 'cari']);
    Route::get('/truck/{id}/add', [App\Http\Controllers\TruckController::class, 'add']);
    Route::post('/truck/{id}/addtruck', [App\Http\Controllers\TruckController::class, 'addtruck']);

    Route::get('/truck/{id}/tulis_pesan', [App\Http\Controllers\TruckController::class, 'tulis_pesan']);
    Route::post('/truck/{id}/kirim_pesan', [App\Http\Controllers\TruckController::class, 'kirim_pesan']);

    Route::get('/truck/{companyid}/{truckid}/edit_data', [App\Http\Controllers\TruckController::class, 'edit_data']);
    Route::post('/truck/{companyid}/{truckid}/update_data', [App\Http\Controllers\TruckController::class, 'update_data']);
    Route::get('/truck/{companyid}/{truckid}/edit_file', [App\Http\Controllers\TruckController::class, 'edit_file']);
    Route::post('/truck/{companyid}/{truckid}/update_file', [App\Http\Controllers\TruckController::class, 'update_file']);

    Route::get('/truck/{companyid}/{truckid}/detail', [App\Http\Controllers\TruckController::class, 'detail']);
    Route::get('/truck/{companyid}/{truckid}/delete', [App\Http\Controllers\TruckController::class, 'delete']);

    Route::get('/truck/{id}/cetak_rfid', [App\Http\Controllers\TruckController::class, 'cetak_rfid']);
    Route::get('/truck/{id}/cetak_data_truck', [App\Http\Controllers\TruckController::class, 'cetak_data_truck']);
       
////////////////////////////// DRIVER  //////////////////////////////
    Route::get('/driver/{id}/index', [App\Http\Controllers\DriverController::class, 'index']);
    Route::get('/driver/cari/{id}', [App\Http\Controllers\DriverController::class, 'cari']);
    Route::get('/driver/{id}/add', [App\Http\Controllers\DriverController::class, 'add']);
    Route::post('/driver/{id}/adddriver', [App\Http\Controllers\DriverController::class, 'adddriver']);

    Route::get('/driver/{id}/tulis_pesan', [App\Http\Controllers\DriverController::class, 'tulis_pesan']);
    Route::post('/driver/{id}/kirim_pesan', [App\Http\Controllers\DriverController::class, 'kirim_pesan']);

    Route::get('/driver/{companyid}/{driverid}/edit_data', [App\Http\Controllers\DriverController::class, 'edit_data']);
    Route::post('/driver/{companyid}/{driverid}/update_data', [App\Http\Controllers\DriverController::class, 'update_data']);
    Route::get('/driver/{companyid}/{driverid}/edit_file', [App\Http\Controllers\DriverController::class, 'edit_file']);
    Route::post('/driver/{companyid}/{driverid}/update_file', [App\Http\Controllers\DriverController::class, 'update_file']);
    
    Route::get('/driver/{companyid}/{driverid}/detail', [App\Http\Controllers\DriverController::class, 'detail']);
    Route::post('/driver/{companyid}/{driverid}/updatedetail', [App\Http\Controllers\DriverController::class, 'updatedetail']);
    Route::get('/driver/{companyid}/{driverid}/delete', [App\Http\Controllers\DriverController::class, 'delete']);

    Route::get('/driver/{id}/cetak_rfid', [App\Http\Controllers\DriverController::class, 'cetak_rfid']);
    Route::get('/driver/{id}/cetak_data_driver', [App\Http\Controllers\DriverController::class, 'cetak_data_driver']);  

    Route::get('/driver/{companyid}/{driverid}/ujian', [App\Http\Controllers\DriverController::class, 'ujian']);
    Route::post('/driver/{companyid}/{driverid}/ujian_jawaban', [App\Http\Controllers\DriverController::class, 'ujian_jawaban']);
    Route::get('/driver/{companyid}/{driverid}/ujian_jawaban_edit', [App\Http\Controllers\DriverController::class, 'ujian_jawaban_edit']);  
    Route::post('/driver/{companyid}/{driverid}/ujian_jawaban_update', [App\Http\Controllers\DriverController::class, 'ujian_jawaban_update']);
    Route::get('/driver/{companyid}/{driverid}/ujian_hapus', [App\Http\Controllers\DriverController::class, 'ujian_hapus']);
       
});
