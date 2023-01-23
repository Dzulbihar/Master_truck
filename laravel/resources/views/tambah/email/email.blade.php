@section('heading', 'Notifikasi Email')

@extends('layouts.app')

@section('content')

<br>
<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> <b> Data Email Admin </b> </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <div class="card-body">
            <table id="user_daftar" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Email Admin </th>
                  <th> Nama Admin </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->alamat_email_admin}} </td>
                  <td>{{ $email->nama_pengirim_admin}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_admin')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Penjadwalan pengambilan RFID tag</b> </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <div class="card-body">
            <table id="user_daftar" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_rfid_tag}} </td>
                  <td>{{ $email->header_rfid_tag}} </td>
                  <td>{{ $email->body_1_rfid_tag}} </td>
                  <td>{{ $email->body_2_rfid_tag}} </td>
                  <td>{{ $email->footer_rfid_tag}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_jadwal_rfid_tag')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Penjadwalan ujian driver</b> </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <div class="card-body">
            <table id="user_daftar" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_jadwal_ujian}} </td>
                  <td>{{ $email->header_jadwal_ujian}} </td>
                  <td>{{ $email->body_1_jadwal_ujian}} </td>
                  <td>{{ $email->body_2_jadwal_ujian}} </td>
                  <td>{{ $email->footer_jadwal_ujian}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_jadwal_ujian')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Pendaftaran Akun User</b> </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <div class="card-body">
            <table id="user_daftar" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_user_daftar}} </td>
                  <td>{{ $email->header_user_daftar}} </td>
                  <td>{{ $email->body_1_user_daftar}} </td>
                  <td>{{ $email->body_2_user_daftar}} </td>
                  <td>{{ $email->footer_user_daftar}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_user_daftar')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Approve Akun User</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_aktif" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_user_aktif}} </td>
                  <td>{{ $email->header_user_aktif}} </td>
                  <td>{{ $email->body_1_user_aktif}} </td>
                  <td>{{ $email->body_2_user_aktif}} </td>
                  <td>{{ $email->footer_user_aktif}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_user_aktif')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Reject Akun User</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_tidak_aktif" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_user_tidak_aktif}} </td>
                  <td>{{ $email->header_user_tidak_aktif}} </td>
                  <td>{{ $email->body_1_user_tidak_aktif}} </td>
                  <td>{{ $email->body_2_user_tidak_aktif}} </td>
                  <td>{{ $email->footer_user_tidak_aktif}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_user_tidak_aktif')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Block Akun User</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_block" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_user_block}} </td>
                  <td>{{ $email->header_user_block}} </td>
                  <td>{{ $email->body_1_user_block}} </td>
                  <td>{{ $email->body_2_user_block}} </td>
                  <td>{{ $email->footer_user_block}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_user_block')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Unblock Akun User</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_unblock" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_user_unblock}} </td>
                  <td>{{ $email->header_user_unblock}} </td>
                  <td>{{ $email->body_1_user_unblock}} </td>
                  <td>{{ $email->body_2_user_unblock}} </td>
                  <td>{{ $email->footer_user_unblock}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_user_unblock')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Pendaftaran Truk</b> </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table id="user_daftar" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_truck_daftar}} </td>
                  <td>{{ $email->header_truck_daftar}} </td>
                  <td>{{ $email->body_1_truck_daftar}} </td>
                  <td>{{ $email->body_2_truck_daftar}} </td>
                  <td>{{ $email->footer_truck_daftar}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_truck_daftar')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Approve Truk</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_aktif" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_truck_approve}} </td>
                  <td>{{ $email->header_truck_approve}} </td>
                  <td>{{ $email->body_1_truck_approve}} </td>
                  <td>{{ $email->body_2_truck_approve}} </td>
                  <td>{{ $email->footer_truck_approve}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_truck_approve')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Reject Truk</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_tidak_aktif" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_truck_reject}} </td>
                  <td>{{ $email->header_truck_reject}} </td>
                  <td>{{ $email->body_1_truck_reject}} </td>
                  <td>{{ $email->body_2_truck_reject}} </td>
                  <td>{{ $email->footer_truck_reject}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_truck_reject')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Delete Truk</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_block" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_truck_delete}} </td>
                  <td>{{ $email->header_truck_delete}} </td>
                  <td>{{ $email->body_1_truck_delete}} </td>
                  <td>{{ $email->body_2_truck_delete}} </td>
                  <td>{{ $email->footer_truck_delete}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_truck_delete')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Block Truk</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_unblock" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_truck_block}} </td>
                  <td>{{ $email->header_truck_block}} </td>
                  <td>{{ $email->body_1_truck_block}} </td>
                  <td>{{ $email->body_2_truck_block}} </td>
                  <td>{{ $email->footer_truck_block}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_truck_block')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Unblock Truk</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_unblock" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_truck_unblock}} </td>
                  <td>{{ $email->header_truck_unblock}} </td>
                  <td>{{ $email->body_1_truck_unblock}} </td>
                  <td>{{ $email->body_2_truck_unblock}} </td>
                  <td>{{ $email->footer_truck_unblock}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_truck_unblock')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Pendaftaran Driver</b> </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table id="user_daftar" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_driver_daftar}} </td>
                  <td>{{ $email->header_driver_daftar}} </td>
                  <td>{{ $email->body_1_driver_daftar}} </td>
                  <td>{{ $email->body_2_driver_daftar}} </td>
                  <td>{{ $email->footer_driver_daftar}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_driver_daftar')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Approve Driver</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_aktif" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_driver_approve}} </td>
                  <td>{{ $email->header_driver_approve}} </td>
                  <td>{{ $email->body_1_driver_approve}} </td>
                  <td>{{ $email->body_2_driver_approve}} </td>
                  <td>{{ $email->footer_driver_approve}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_driver_approve')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Reject Driver</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_tidak_aktif" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_driver_reject}} </td>
                  <td>{{ $email->header_driver_reject}} </td>
                  <td>{{ $email->body_1_driver_reject}} </td>
                  <td>{{ $email->body_2_driver_reject}} </td>
                  <td>{{ $email->footer_driver_reject}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_driver_reject')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Delete Driver</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_block" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_driver_reject}} </td>
                  <td>{{ $email->header_driver_delete}} </td>
                  <td>{{ $email->body_1_driver_delete}} </td>
                  <td>{{ $email->body_2_driver_delete}} </td>
                  <td>{{ $email->footer_driver_delete}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_driver_delete')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Block Driver</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_unblock" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_driver_block}} </td>
                  <td>{{ $email->header_driver_block}} </td>
                  <td>{{ $email->body_1_driver_block}} </td>
                  <td>{{ $email->body_2_driver_block}} </td>
                  <td>{{ $email->footer_driver_block}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_driver_block')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
          <hr>
          <div class="card-header">
            <h3 class="card-title"> <b>Notifikasi Email untuk Unblock Driver</b> </h3>
          </div>
          <div class="card-body">
            <table id="user_unblock" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Subjek </th>
                  <th> Header </th>
                  <th> Isi paragraf 1 </th>
                  <th> Isi paragraf 2 </th>
                  <th> Footer </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($emails as $email)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $email->subjek_driver_unblock}} </td>
                  <td>{{ $email->header_driver_unblock}} </td>
                  <td>{{ $email->body_1_driver_unblock}} </td>
                  <td>{{ $email->body_2_driver_unblock}} </td>
                  <td>{{ $email->footer_driver_unblock}} </td>
                  <td>
                    <a href="{{ url('email') }}/{{$email->id}}/{{('editemail_driver_unblock')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
