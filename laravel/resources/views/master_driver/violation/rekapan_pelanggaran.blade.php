@section('heading', 'Data Pelanggaran')

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
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header">
            <h3 class="card-title"> <b>Rekapan Data Pelanggaran Driver</b> </h3>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Waktu</th>
                  <th>Status Blokir</th>
                  <th>Nama Perusahaan</th>
                  <th>Nama Driver</th>
                  <th>Nomor Polisi</th>
                  <th>Jenis Pelanggaran</th>
                  <th>Bentuk Pelanggaran</th>
                  <th>Alasan</th>
                  <th>Tempat</th>
                  <th>Foto Pendukung</th>

                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($violations as $violation)
                @if ($violation->pelanggaran !== 'pelanggaran')
                <tr>
                  <th>{{$nomer++}}</th>
                  <td>{{$violation->get_kapan()}}</td>
                  <td> 
                    <?php 
                      $hari_kejadian = date('d F Y, H:i:s', strtotime($violation->kapan));
                      $hari_2 = date('d F Y, H:i:s', strtotime('+2 day', strtotime($violation->kapan)));
                      $hari_ini = date('d F Y, H:i:s');
                    ?>
                    @if ($violation->jenis_pelanggaran == 'Ringan')
                      @if ($hari_ini >= $hari_2 )
                        <p class="badge badge-success">Diaktifkan kembali</p>
                      @else
                      <p class="badge badge-danger">Diblokir sementara</p>
                      @endif
                    @endif
                    @if ($violation->jenis_pelanggaran == 'Berat')
                      <p class="badge badge-danger">Diblokir selamanya</p>
                    @endif
                  </td>
                  <td>{{$violation->nama_perusahaan}}</td>
                  <td>{{$violation->nama_driver}}</td>
                  <td>{{$violation->police_no}}</td>
                  <td>{{$violation->jenis_pelanggaran}}</td>
                  <td>{{$violation->bentuk_pelanggaran}}</td>
                  <td>{{$violation->alasan}}</td>
                  <td>{{$violation->dimana}}</td>
                  <td>
                    <embed type="application/pdf" src="{{$violation->getFoto()}}" width="100%"></embed>
                  </td>
                </tr>
                @endif
                @endforeach  
              </tbody>
            </table>

            <!-- Tombol bawah -->
            <div>
              <a href="{{url('master_driver')}}" class="btn btn-default btn-sm">
                Kembali
              </a>           
            </div>
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content -->






@endsection
