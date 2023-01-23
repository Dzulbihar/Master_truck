@section('heading', 'Profil')

@extends('layouts.app')

@section('content')

<br>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <!-- Profil Perusahaan -->
      <div class="col-md-6">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title">
              <b>Profil Perusahaan</b>
              @empty ($company->owner_name && $company->contact && $company->addr_company && $company->nib_company && $company->npwp_company && $company->pmku_company)
                <td> 
                  <a class="badge badge-danger text-white"> DATA BELUM LENGKAP </a> 
                </td>
                @else
                <td> 
                  <a class="badge badge-success text-white"> DATA SUDAH LENGKAP </a> 
                </td>
              @endempty
            </h3>
          </div>
          <div class="card-body">
            <strong><i class="fas fa-file-alt mr-1"></i> Nama Perusahaan </strong>
            <p class="text-muted">{{auth()->user()->company->owner_name}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Nomor Seluler (WA) </strong>
            <p class="text-muted">{{ auth()->user()->company->contact}}</p>          
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Alamat Perusahaan </strong>
            <p class="text-muted">{{ auth()->user()->company->addr_company}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> NIB Perusahaan </strong>
            <p class="text-muted">{{ auth()->user()->company->nib_company}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> NPWP Perusahaan </strong> 
            <p class="text-muted">{{ auth()->user()->company->npwp_company}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> PMKU Perusahaan </strong> 
            <p class="text-muted">{{ auth()->user()->company->pmku_company}}</p>
          </div>
        </div>
      </div>

      <!-- Profil PIC -->
      <div class="col-md-6">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title">
              <b>Profil PIC</b>
              @empty ($company->pic_nama && $company->pic_contact && $company->email)
                <td> 
                  <a class="badge badge-danger text-white"> DATA BELUM LENGKAP </a> 
                </td>
                @else
                <td> 
                  <a class="badge badge-success text-white"> DATA SUDAH LENGKAP </a> 
                </td>
              @endempty
            </h3>
          </div>
          <div class="card-body">
            <strong><i class="fas fa-file-alt mr-1"></i> Nama PIC </strong>
            <p class="text-muted">{{ auth()->user()->company->pic_nama}}</p>
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Nomor Seluler PIC (WA) </strong>
            <p class="text-muted">{{ auth()->user()->company->pic_contact}}</p>    
            <hr>
            <strong><i class="fas fa-file-alt mr-1"></i> Email PIC (username) </strong>
            <p class="text-muted">{{ auth()->user()->company->email}}</p>
          </div>
        </div>
      </div>
    </div>
<!-- ______________________________________________________________________ -->
    <!-- Foto -->
    <div class="row">
      <div class="col-md-3">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title">
              <b>Foto NIB Perusahaan</b>
              @empty ($company->file_nib_company)
                <td> 
                  <a class="badge badge-danger text-white"> DATA BELUM LENGKAP </a> 
                </td>
                @else
                <td> 
                  <a class="badge badge-success text-white"> DATA SUDAH LENGKAP </a> 
                </td>
              @endempty
            </h3>
          </div>
          <div class="card-body">
            <!-- <strong><i class="fas fa-file-alt mr-1"></i> Foto NIB Perusahaan </strong> -->
            <p class="text-muted">
              <embed type="application/pdf" src="{{$company->getfile_nib_company()}}" width="100%" height="500"></embed>
              <!--               
              <img src="{{auth()->user()->company->getfile_nib_company()}}" width="100%"> 
              -->
            </p>              
          </div>
        </div>        
      </div>
      <div class="col-md-3">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title">
              <b>Foto NPWP Perusahaan</b>
              @empty ($company->file_npwp_company)
                <td> 
                  <a class="badge badge-danger text-white"> DATA BELUM LENGKAP </a> 
                </td>
                @else
                <td> 
                  <a class="badge badge-success text-white"> DATA SUDAH LENGKAP </a> 
                </td>
              @endempty
            </h3>
          </div>
          <div class="card-body">
            <!-- <strong><i class="fas fa-file-alt mr-1"></i> Foto NPWP Perusahaan </strong> -->
            <p class="text-muted">
              <embed type="application/pdf" src="{{$company->getfile_npwp_company()}}" width="100%" height="500"></embed>
              <!--               
              <img src="{{auth()->user()->company->getfile_npwp_company()}}" width="100%"> 
              -->
            </p>              
          </div>
        </div>        
      </div>
      <div class="col-md-3">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title">
              <b>Foto PMKU Perusahaan</b>
              @empty ($company->file_pmku_company)
                <td> 
                  <a class="badge badge-danger text-white"> DATA BELUM LENGKAP </a> 
                </td>
                @else
                <td> 
                  <a class="badge badge-success text-white"> DATA SUDAH LENGKAP </a> 
                </td>
              @endempty
            </h3>
          </div>
          <div class="card-body">
            <!-- <strong><i class="fas fa-file-alt mr-1"></i> Foto NIB Perusahaan </strong> -->
            <p class="text-muted">
              <embed type="application/pdf" src="{{$company->getfile_pmku_company()}}" width="100%" height="500"></embed>
            </p>              
          </div>
        </div>        
      </div>
      <div class="col-md-3">
        <div class="card card-white">
          <div class="card-header">
            <h3 class="card-title">
              <b>Form Pernyataan</b>
              @empty ($company->statement_form)
                <td> 
                  <a class="badge badge-danger text-white"> DATA BELUM LENGKAP </a> 
                </td>
                @else
                <td> 
                  <a class="badge badge-success text-white"> DATA SUDAH LENGKAP </a> 
                </td>
              @endempty
            </h3>
          </div>
          <div class="card-body">
            <!-- <strong><i class="fas fa-file-alt mr-1"></i> Form Pernyataan </strong> -->
            <p class="text-muted">
              <embed type="application/pdf" src="{{$company->getstatement_form()}}" width="100%" height="500"></embed>
              <!--               
              <img src="{{auth()->user()->company->getstatement_form()}}" width="100%">
              -->
            </p>              
          </div>
        </div>        
      </div>
    </div>

    <div class="row">
      <p>
        <a href="{{url('profilperusahaan')}}/{{$company->id}}/{{('edit')}}" class="btn btn-primary btn-sm">
          <i class="fas fa-pencil-alt"></i>
          Perbarui Profil
        </a>
        <a href="{{url('home')}}" class="btn btn-default btn-sm float-sm-right">
          <i class="fas fa-undo"></i>
          Kembali
        </a>
      </p>
    </div>
    <br>
  </div>
</section>
<!-- /.content -->

@endsection

