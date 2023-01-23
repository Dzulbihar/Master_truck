@section('heading', 'Pelanggaran Driver')

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
    <!-- Notifikasi ------------------------------------------------- -->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <b>
                Data Pelanggaran Sopir bernama {{$driver->name}} 

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
                      <p class="badge badge-danger">Diblokir sementara</p>
                      @endif
                    @endif
                    @if ($violation->jenis_pelanggaran == 'Berat')
                      <p class="badge badge-danger">Diblokir selamanya</p>
                    @endif
                  @endforeach 

              </b>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Waktu </th>
                  <th>Nomor Polisi Truk</th>
                  <th>Jenis Pelanggaran</th>
                  <th>Bentuk Pelanggaran </th>
                  <!--<th>Jumlah Kejadian</th>
                  <th>Kategori Pelanggaran</th> -->
                  <th>Alasan</th>
                  <th>Tempat</th>
                  <th align="center">Foto pendukung</th>
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
                  <td>
                    <a href="{{url('violation')}}/{{$driver->id}}/{{$violation->id}}/{{('edit')}}" class="btn btn-warning btn-sm text-white">
                      <i class="fas fa-pencil-alt"></i>
                      Edit
                    </a>
                    <a href="#" class="btn btn-danger btn-sm delete_violation" data-id-driver="{{ $driver->id}}" data-id-violation="{{ $violation->id}}" data-violation="{{ $violation->bentuk_pelanggaran}}">
                      <i class="fa fa-trash"></i>
                      Delete
                    </a>
                  </td>
                  <td> {{$violation->get_kapan()}} </td>
                  <td>{{$violation->police_no}}</td>
                  <td>{{$violation->jenis_pelanggaran}}</td>
                  <td>{{$violation->bentuk_pelanggaran}}</td>
                  <td>{{$violation->alasan}}</td>
                  <!-- <td> {{ date('d F Y', strtotime($violation->kapan)) }} </td> -->
                  <td>{{$violation->dimana}}</td>
                  <td align="center">
                    <img src="{{$violation->getFoto()}}" width="50%" >
                  </td>
                </tr>
                @endif
                @endforeach  
              </tbody>
            </table>  

            <!-- Button trigger modal -->
            <div>
              <a href="{{url('violation')}}/{{$driver->id}}/{{('add')}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>
                Tambah Data
              </a>
              <a href="{{url('violation')}}/{{$driver->id}}/{{('recycle_bin')}}" class="btn btn-danger btn-sm">
                <i class="fa fa-history"></i>
                Catatan
              </a>
              <a href="{{url('master_driver')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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
  <!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection




