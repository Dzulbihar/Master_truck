@section('heading', 'Detail Driver')

@extends('layouts.app')

@section('content')


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
              <!-- <tr>
                <td> ID License &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->id_license}} &nbsp;</td>
              </tr> -->
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
              <!-- <tr>
                <td> Tanggal berlaku SIM &nbsp; </td>
                <td>  : </td>
                @empty ($driver->done_date)
                <td>  - </td>
                @else
                <td>  {{$driver->done_date}} </td>
                @endempty
              </tr> -->
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
              <!-- <tr>
                <td> RFID &nbsp; </td>
                <td>  : </td>
                <td> {{$driver->id_rfid}} &nbsp;</td>
              </tr> -->
              
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

          @if ($driver->status == 'Proses Pengajuan')
          <div class="text-center mt-5 mb-3">
            <a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('edit_data')}}" class="btn btn-warning text-white btn-sm">
              <i class="fas fa-pencil-alt"></i>
              Edit Data
            </a>
            <a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('edit_file')}}" class="btn btn-warning text-white btn-sm">
              <i class="fas fa-pencil-alt"></i>
              Edit File
            </a>

            <a href="#" class="btn btn-danger text-white btn-sm delete_driver_user" data-id-company="{{ $company->id}}" data-id-driver="{{ $driver->id}}" data-driver="{{ $driver->name}}">
              <i class="fas fa-trash"></i>
              Delete 
            </a>

            <!-- <a href="{{ url('driver') }}/{{$company->id}}/{{('index')}}" class="btn btn-info btn-sm">
              <i class="fa fa-undo"></i>
              Kembali
            </a> -->
          </div>
          @endif

          <div class="text-center mt-5 mb-3">
          @if ($driver->lulus_ujian == 'Lulus Ujian')
            <a href="{{url('driver')}}/{{ $driver->id }}/{{('cetak_rfid')}}" class="btn btn-default btn-sm" target="_blank">
              <i class="fas fa-print"></i>
              Cetak ID Card Driver
            </a>
          @endif

          @if ($driver->status == 'Sudah Disetujui')
            <a href="{{url('driver')}}/{{ $driver->id }}/{{('cetak_data_driver')}}" class="btn btn-primary btn-sm" target="_blank">
              <i class="fas fa-download"></i>
              Cetak Data Driver 
            </a>
            <a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('edit_data')}}" class="btn btn-warning text-white btn-sm">
              <i class="fas fa-pencil-alt"></i>
              Edit Data
            </a>
            <a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('edit_file')}}" class="btn btn-warning text-white btn-sm">
              <i class="fas fa-pencil-alt"></i>
              Edit File
            </a>
            <a href="#" class="btn btn-danger text-white btn-sm delete_driver_user" data-id-company="{{ $company->id}}" data-id-driver="{{ $driver->id}}" data-driver="{{ $driver->name}}">
              <i class="fas fa-trash"></i>
              Delete 
            </a>
            <!-- <a href="{{ url('driver') }}/{{$company->id}}/{{('index')}}" class="btn btn-info btn-sm">
              <i class="fa fa-undo"></i>
              Kembali
            </a> -->
          @endif
          </div>

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
                </div>
              </div>
            </div>
          </section>
          @endif
        </div>

        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> File Foto </h3>
            </div>
            <div class="card-body">
              <p class="text-muted">
                <img src="{{$driver->get_file_foto()}}" width="100%" height="500">
                <!-- <embed type="application/pdf" src="{{$driver->get_file_foto()}}" width="100%" height="500"></embed> -->
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



@endsection

