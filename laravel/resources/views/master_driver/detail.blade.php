@section('heading', 'Detail Driver')

@extends('layouts.app')

@section('content')


{{-- menampilkan error validasi --}}
@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


<br>
<!-- Main content -->
<section class="content">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <label>
          @if ($driver->status == 'Proses Pengajuan')
          <a class="badge badge-danger text-white">Proses Pengajuan</a>
          @elseif($driver->status == 'Sudah Disetujui')
          <a class="badge badge-success text-white">Sudah Disetujui</a>
          @else($driver->status == 'Diblokir')
          <a class="badge badge-danger text-white">Diblokir</a>
          @endif

          @if ($driver->sudah_ujian == 'Sudah Ujian')
          <a class="badge badge-success text-white">Sudah Ujian</a>
          @else
          <a class="badge badge-danger text-white">Belum Ujian</a>
          @endif

          @empty ($driver->lulus_ujian)
          @else
          @if ($driver->lulus_ujian == 'Lulus Ujian')
          <a class="badge badge-success text-white">Lulus Ujian</a>
          @else
          <a class="badge badge-danger text-white">Tidak Lulus Ujian</a>
          @endif
          @endempty

          @foreach($violations as $violation)
          <?php 
          $hari_kejadian = date('d F Y, H:i:s', strtotime($violation->kapan));
          $hari_2 = date('d F Y, H:i:s', strtotime('+2 day', strtotime($violation->kapan)));
          $hari_ini = date('d F Y, H:i:s');
          ?>
          @if ($violation->jenis_pelanggaran == 'Ringan')
          @if ($hari_ini >= $hari_2 )
          <!-- <p class="badge badge-success">Diaktifkan kembali</p> -->
          @else
          <p class="badge badge-danger">Diblokir sementara karena melakukan pelanggaran ringan</p>
          @endif
          @endif
          @if ($violation->jenis_pelanggaran == 'Berat')
          <p class="badge badge-danger">Diblokir selamanya karena melakukan pelanggaran berat</p>
          @endif
          @endforeach

        <label>
      </h3>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        Driver dengan nama {{ $driver->name}}
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
          <div class="row">
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td> Nama Perusahaan &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->owner_name}} &nbsp;</td>
              </tr>
              <tr>
                <td> Nama PIC &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->pic_nama}} &nbsp;</td>
              </tr>
              <tr>
                <td> Email &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->email}} &nbsp;</td>
              </tr>  
              <tr>
                <td> Site Id &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->site_id}} &nbsp;</td>
              </tr>
              <tr>
                <td> Nama &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->name}} &nbsp;</td>
              </tr>
              </tr>
              <tr>
                <td> NIK &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->nik}} &nbsp;</td>
              </tr>
              <tr>
                <td> Tanggal lahir &nbsp; </td>
                <td>  : </td>
                @empty ($driver->birthday)
                <td> - </td>
                @else
                <td>  {{$driver->birthday()}} </td>
                @endempty
              </tr>
              <tr>
                <td> Jenis kelamin &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->gender}} &nbsp;</td>
              </tr>
              <tr>
                <td> Alamat &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->addr}} &nbsp;</td>
              </tr>
              <tr>
                <td> Phone &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->phone}} &nbsp;</td>
              </tr>
              <tr>
                <td> Fax &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->fax}} &nbsp;</td>
              </tr>
              <tr>
                <td> Mobile &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->mobile}} &nbsp;</td>
              </tr>
              <tr>
                <td> HP 1 &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->hp1}} &nbsp;</td>
              </tr>
              <tr>
                <td> HP 2 &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->hp2}} &nbsp;</td>
              </tr>
              <tr>
                <td> Nomor SIM &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->drive_license}} &nbsp;</td>
              </tr>
              <tr>
                <td> Tanggal berlaku SIM &nbsp; </td>
                <td>  : </td>
                @empty ($driver->valid_date)
                <td>  - </td>
                @else
                <td>  {{$driver->valid_date()}} </td>
                @endempty
              </tr>
              <tr>
                <td> Display Cust &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->display_cust}} &nbsp;</td>
              </tr>
              <tr>
              <td> done &nbsp; </td>
              <td>  : </td>
              <td> {{$driver->done}} &nbsp;</td>
              </tr>
              <tr>
                <td> Tanggal daftar &nbsp; </td>
                <td>  : </td>
                @empty ($driver->created_at)
                <td>  - </td>
                @else
                <td>  {{$driver->created_at()}} </td>
                @endempty
              </tr>
              <tr>
                <td> Keterangan &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->remaks}} &nbsp;</td>
              </tr>            
              <tr>
                <td> Tanggal Pengajuan &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->get_tanggal_pengajuan()}} &nbsp;</td>
              </tr>
              <tr>
              <td> Tanggal Disetujui &nbsp; </td>
              <td>  : </td>
              @empty ($driver->tanggal_setujui)
              <td>  Belum disetujui </td>
              @else
              <td>  {{$driver->get_tanggal_setujui()}} </td>
              @endempty
              </tr>
              <tr>
                <td> Disetujui Oleh &nbsp; </td>
                <td>  : </td>
                @empty ($driver->nama_setujui)
                <td>  Belum disetujui </td>
                @else
                <td>  {{$driver->nama_setujui}} </td>
                @endempty
              </tr>
              <tr>
                <td> Status Tes &nbsp; </td>
                <td>  : </td>
                @empty ($driver->sudah_ujian)
                <td>  Belum Ujian </td>
                @else
                <td>  {{$driver->sudah_ujian}} </td>
                @endempty
              </tr>
              <tr>
                <td> Nilai Tes &nbsp; </td>
                <td>  : </td>
                @empty ($driver->nilai_ujian)
                <td>  Belum diketahui </td>
                @else
                <td>  {{$driver->nilai_ujian}} </td>
                @endempty
              </tr>
              <tr>
              <td> Status Kelulusan &nbsp; </td>
              <td>  : </td>
              @empty ($driver->lulus_ujian)
              <td>  Belum diketahui </td>
              @else
              <td>  {{$driver->lulus_ujian}} </td>
              @endempty
            </tr>
          </table>
        </div>

        @if ($driver->status == 'Proses Pengajuan' || $driver->status == 'Sudah Disetujui')
        <div class="text-center mt-5 mb-3">
          @if ($driver->status == 'Proses Pengajuan')
          <a href="#" class="btn btn-success text-white btn-sm approve_driver" data-id-driver="{{ $driver->id}}" data-driver="{{ $driver->drive_license}}">
            <i class="fas fa-check"></i>
            Approve 
          </a>
          @endif
          @if ($driver->status ==  'Sudah Disetujui')
          <a href="#" class="btn btn-warning text-white btn-sm reject_driver" data-id-driver="{{ $driver->id}}" data-driver="{{ $driver->drive_license}}">
            <i class="fas fa-undo"></i>
            Reject 
          </a>
          <button href="#" class="btn btn-dark btn-sm" type="button"  data-toggle="modal" data-target="#block">
            <i class="fa fa-lock"></i>
            Block
          </button>
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#jadwal">
            <i class='far fa-clock'></i>
            Jadwal Ujian Driver
          </button>
          <a href="{{url('master_driver')}}/{{$driver->id}}/{{('cetak_data_driver')}}" class="btn btn-primary btn-sm" target="_blank">
            <i class="fas fa-download"></i>
            Cetak Data Driver
          </a>
          @endif
          @if ($driver->lulus_ujian ==  'Lulus Ujian')
          <a href="{{url('master_driver')}}/{{$driver->id}}/{{('cetak_rfid')}}" class="btn btn-default btn-sm" target="_blank">
            <i class="fas fa-print"></i>
            Cetak ID Card Driver
          </a>
          @endif

          <a href="{{url('master_driver')}}/{{$driver->id}}/{{('edit_data')}}" class="btn btn-warning btn-sm text-white">
            <i class="fas fa-pencil-alt"></i>
            Edit Data
          </a>
          <a href="{{url('master_driver')}}/{{$driver->id}}/{{('edit_file')}}" class="btn btn-warning btn-sm text-white">
            <i class="fas fa-pencil-alt"></i>
            Edit File
          </a>
          <button href="#" class="btn btn-danger btn-sm" type="button"  data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-trash"></i>
            Delete
          </button>
          <!-- <a href="{{('/master_driver')}}" class="btn btn-primary btn-sm">Kembali</a> -->
        </div>
        @endif
        <!-- _______________________________ -->
        @if ($driver->status == 'Diblokir')
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12">
                <h1 class="bg-danger"> DATA INI DIBLOKIR </h1>
                <br>
                <p class="bg-danger">Tanggal Diblokir = {{ $driver->get_tanggal_blokir()}}
                  <br>
                  Alasan Diblokir = {{ $driver->alasan_blokir}}
                  <br>
                  Diblokir Oleh= {{ $driver->nama_blokir}}</p>
                  <br>
                  <a href="#" class="btn btn-secondary text-white btn-sm unblock_driver" data-id-driver="{{ $driver->id}}" data-driver="{{ $driver->drive_license}}">
                    <i class="fa fa-unlock-alt"></i>
                    Unblock 
                  </a>
                  <button href="#" class="btn btn-danger btn-sm" type="button"  data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-trash"></i>
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </section>
          @endif

        </div>

        <!-- file -->
        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> File Foto </h3>
            </div>
            <div class="card-body">
              <p class="text-muted">
                <img src="{{$driver->get_file_foto()}}" width="100%" height="500">
              </p>              
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> File SIM </h3>
            </div>
            <div class="card-body">
              <p class="text-muted">
                <embed type="application/pdf" src="{{$driver->get_file_sim()}}" width="100%" height="500"></embed>
              </p>              
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> File KTP </h3>
            </div>
            <div class="card-body">
              <p class="text-muted">
                <embed type="application/pdf" src="{{$driver->get_file_ktp()}}" width="100%" height="500"></embed>
              </p>              
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Surat pengantar dari perusahaan trucking </h3>
            </div>
            <div class="card-body">
              <p class="text-muted">
                <embed type="application/pdf" src="{{$driver->get_statement_form()}}" width="100%" height="500"></embed>
              </p>              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

</section>
<!-- /.content -->

<!-- Alasan diblock -->
<div class="modal fade" id="block" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alasan diblock?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{url('/master_driver/status_block_master_driver/'.$driver->id)}}" method="GET" enctype="multipart/form-data" >
          {{csrf_field()}}

          <!-- alasan_blokir -->
          <div class="form-group row">
            <div class="col-md-12">
              <input type="text" class="form-control @error('alasan_blokir') is-invalid @enderror" name="alasan_blokir" value="{{ old('alasan_blokir') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
              @error('alasan_blokir')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <!-- Tombol --> 
          <div class="form-group row">
            <div class="col-md-12">
              <br>
              <button type="submit" class="btn btn-dark btn-sm">
                Block
              </button>
            </div>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>

<!-- Alasan dihapus -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alasan dihapus?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{url('master_driver')}}/{{$driver->id}}/{{('delete')}}" method="GET" enctype="multipart/form-data" >
          {{csrf_field()}}

          <!-- alasan_dihapus -->
          <div class="form-group row">
            <div class="col-md-12">
              <input type="text" class="form-control @error('alasan_dihapus') is-invalid @enderror" name="alasan_dihapus" value="{{ old('alasan_dihapus') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
              @error('alasan_dihapus')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <!-- Tombol --> 
          <div class="form-group row">
            <div class="col-md-12">
              <br>
              <button type="submit" class="btn btn-danger btn-sm">
                Delete
              </button>
            </div>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>

<!-- Penjadwalan RFID Tag -->
<div class="modal fade" id="jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Jadwal Ujian Driver </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($email as $email)
        @endforeach 
        <form action="{{url('/send_email_ujian_driver/'.$driver->id)}}" method="post" role="form" class="form">
          @csrf
          <div class="form-group mt-3">
            <label> Pengirim </label>
            <input type="text" class="form-control" name="pengirim" value="{{$email->nama_pengirim_admin}}" required>
          </div>
          <div class="form-group mt-3">
            <label> Subject </label>
            <input type="text" class="form-control" name="subject" value="{{$email->subjek_jadwal_ujian}}" required>
          </div>
          <div class="form-group mt-3">
            <label> Header </label>
            <input type="text" class="form-control" name="header" value="{{$email->header_jadwal_ujian}}" required>
          </div>
          <div class="form-group mt-3">
            <label> Body (paragraf 1) </label>
            <textarea type="text" class="form-control" name="isi_1" required>{{$email->body_1_jadwal_ujian}}</textarea>
          </div>
          <div class="form-group mt-3">
            <label> Body (paragraf 2) </label>
            <textarea type="text" class="form-control" name="isi_2" required>{{$email->body_2_jadwal_ujian}}</textarea>
          </div>
          <div class="form-group mt-3">
            <label> Tanggal </label>
            <input type="datetime-local" class="form-control" name="tanggal" required>
          </div>
          <div class="form-group mt-3">
            <label> Footer </label>
            <input type="text" class="form-control" name="footer" value="{{$email->footer_jadwal_ujian}}" required>
          </div>
          <div class="form-group mt-3">
            <label> Email tujuan </label>
            <input type="text" readonly class="form-control" name="email_tujuan" value="{{$driver->email}}" required>
          </div>
          <div class="form-group mt-3">
            <button type="submit" class="btn btn-success btn-sm">
              Kirim Email 
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

