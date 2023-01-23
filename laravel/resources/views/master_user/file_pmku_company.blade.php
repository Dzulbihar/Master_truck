@section('heading', 'File PMKU')

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
            <h3 class="card-title"> <b>PMKU Perusahaan {{$company->owner_name}}</b> </h3>
          </div>
          <div class="card-body">
            <strong><i class="fas fa-file-alt mr-1"></i> PMKU Perusahaan </strong>
            <p class="text-muted">
              <embed type="application/pdf" src="{{$company->getfile_pmku_company()}}" width="100%" height="500"></embed>
            </p>
          </div>
        </div>
      </div>
    </div>
      <a href="{{url('master_user')}}/{{$user->id}}/{{('detail')}}" class="btn btn-info btn-sm">Kembali</a>
      <br>
  </div>
</section>


@endsection

