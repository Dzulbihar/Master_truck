@section('heading', 'Detail User')

@extends('layouts.app')

@section('content')

<br>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title">
              @empty ($company->contact && $company->nib_company && $company->file_nib_company && $company->npwp_company && $company->file_npwp_company && $company->pmku_company && $company->file_pmku_company && $company->statement_form)                <td> 
                  <a class="badge badge-danger text-white"> DATA BELUM LENGKAP </a> 
                </td>
              @else
                <td> 
                  <a class="badge badge-success text-white"> DATA SUDAH LENGKAP </a> 
                </td>
              @endempty

              @if ($user->status == 'Tidak Aktif' || $user->status == 'Aktif' || $user->status == 'Blokir')
              <label>
                @if ($user->status == 'Tidak Aktif')
                <a class="badge badge-danger text-white"> Akun Tidak Aktif</a>
                @elseif($user->status == 'Aktif')
                <a class="badge badge-success text-white"> Akun Aktif</a>
                @else($user->status == 'Blokir')
                <a class="badge badge-danger text-white"> Akun Blokir</a>
                @endif
              </label> 
              @endif             
            </h3>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

      <!-- Profil Perusahaan -->
      <div class="col-md-4">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title">
              <b>Profil Perusahaan</b>            
            </h3>
          </div>
          <div class="card-body">
            <strong><i class="fas fa-file-alt mr-1"></i> Nama Perusahaan </strong>
            <p class="text-muted">{{ $company->owner_name}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Kontak Perusahaan </strong>
            <p class="text-muted">{{ $company->contact}}</p>
            <hr>        
            <strong><i class="fas fa-file-alt mr-1"></i> Alamat Perusahaan </strong>
            <p class="text-muted">{{ $company->addr_company}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> NIB Perusahaan </strong>
            <a href="{{url('master_user')}}/{{$user->id}}/{{('foto_nib_perusahaan')}}" class="btn btn-default btn-sm">Cek file NIB </a>
            <p class="text-muted">{{ $company->nib_company}}</p>           
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> NPWP Perusahaan </strong>
            <a href="{{url('master_user')}}/{{$user->id}}/{{('foto_npwp_perusahaan')}}" class="btn btn-default btn-sm">Cek file NPWP </a>
            <p class="text-muted">{{ $company->npwp_company}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> PMKU Perusahaan </strong>
            <a href="{{url('master_user')}}/{{$user->id}}/{{('file_pmku_company')}}" class="btn btn-default btn-sm">Cek file PMKU </a>
            <p class="text-muted">{{ $company->pmku_company}}</p>
          </div>
        </div>
      </div>

      <!-- Profil PIC -->
      <div class="col-md-4">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title"> <b>Profil PIC</b> </h3>
          </div>
          <div class="card-body">
            <strong><i class="fas fa-file-alt mr-1"></i> Nama PIC </strong>
            <p class="text-muted">{{ $company->pic_nama}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Kontak PIC </strong>
            <p class="text-muted">{{ $company->pic_contact}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Email </strong>
            <p class="text-muted">{{ $company->email}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Cek Form Pernyataan </strong>
            <a href="{{url('master_user')}}/{{$user->id}}/{{('form_pernyataan')}}" class="btn btn-default btn-sm">Cek file Form</a>
          </div>
        </div>
      </div>

      <!-- Tentang Akun -->
      <div class="col-md-4">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title"> <b>Tentang Akun</b></h3>
          </div>
          <div class="card-body">
            <strong><i class="fas fa-file-alt mr-1"></i> Waktu Pengajuan </strong>
            <p class="text-muted"> {{$user->get_tgl_pengajuan()}} </p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Waktu Disetujui </strong>
            <p class="text-muted">
              <label>
                @if ($user->status == 'Tidak Aktif')
                Belum Disetujui
                @elseif($user->status == 'Aktif')
                {{$user->get_tgl_disetujui()}}
                @else($user->status == 'Blokir')
                {{$user->get_tgl_disetujui()}}
                @endif
              </label> 
            </p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Disetujui Oleh </strong>
            <p class="text-muted">
              <label>
                @if ($user->status == 'Tidak Aktif')
                Belum Disetujui
                @elseif($user->status == 'Aktif')
                {{$user->disetujui_oleh}}
                @else($user->status == 'Blokir')
                {{$user->disetujui_oleh}}
                @endif
              </label> 
            </p>
            <hr><hr>
            @if ($user->status == 'Aktif')
              <a href="#" class="btn btn-warning text-white btn-sm reject_user" data-id-user="{{ $user->id}}" data-user="{{ $user->owner_name}}">
                <i class="fas fa-undo"></i>
                Reject 
              </a>
              <a href="{{url('master_user')}}/{{$user->id}}/{{('edit_blokir')}}" class="btn btn-danger btn-sm">
                <i class="fa fa-lock"></i>
                Block
              </a>
            @endif
            @if ($user->status == 'Tidak Aktif' || $user->status == 'Blokir')
              @if ($user->status == 'Tidak Aktif')
                <a href="#" class="btn btn-success text-white btn-sm approve_user" data-id-user="{{ $user->id}}" data-user="{{ $user->owner_name}}">
                  <i class="fas fa-check"></i>
                  Approve 
                </a>
              @endif
              @if ($user->status == 'Blokir')
                <strong><i class="fas fa-file-alt mr-1"></i> Alasan Diblokir </strong>
                <p class="text-muted">{{ $user->alasan_blokir}}</p>
                <a href="#" class="btn btn-success text-white btn-sm unblock_user" data-id-user="{{ $user->id}}" data-user="{{ $user->owner_name}}">
                  <i class="fa fa-unlock-alt"></i>
                  Unblock 
                </a>
              @endif
            @endif
            <a href="{{ url('master_user')}}" class="btn btn-default btn-sm float-sm-right">Kembali</a>

            <a href="{{url('master_user')}}/{{$company->id}}/{{('detail_edit')}}" class="btn btn-primary btn-sm float-sm-right">
              <i class="fas fa-pencil-alt"></i>
              Perbarui Profil
            </a>
          </div>
        </div>
      </div>

  	</div>
  </div>
</section>
<!-- /.content -->


@endsection

