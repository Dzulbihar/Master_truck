@section('heading', 'Master Driver')

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
            <!-- Tombol Atas -->
            <form action="{{url('/master_driver/cari')}}" method="GET">
              <h3 class="card-title">Master Driver &nbsp;&nbsp; 
              <select type="text" name="cari" class="btn btn-default btn-sm">
                <option>Proses Pengajuan</option>
                <option>Sudah Disetujui</option>
                <option>Diblokir</option>
              </select>
              <input type="submit" value="CARI" class="btn btn-default btn-sm">
              <?php 
                if(isset($_GET['cari'])){
                 $cari = $_GET['cari'];
              ?>
              <a class="btn btn-default btn-sm"> Hasil Pencarian : <?php echo "Status Pengajuan : $cari" ?> </a>
              <?php 
                 }
              ?>
              </h3>
            </form>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Status Pengajuan</th>
                  <th>Perusahaan</th>
                  <th>PIC</th>
                  <th>Nama Sopir</th>
                  <th>Waktu Pengajuan</th>
                  <th>Waktu Disetujui</th>
                  <th>Disetujui Oleh</th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($drivers as $driver)
                <tr>
                  <th>{{$nomer++}}</th>
                  <td>
                    @if ($driver->status == 'Proses Pengajuan')
                      <a href="{{url('master_driver')}}/{{$driver->id}}/{{('detail')}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>
                        Detail
                      </a>
                    @endif

                    @if ($driver->status == 'Sudah Disetujui' || $driver->status == 'Diblokir')
                      <a href="{{url('master_driver')}}/{{$driver->id}}/{{('detail')}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>
                        Detail
                      </a>
                      <a href="{{url('kirim_materi_ujian')}}/{{$driver->id}}/{{('kirim_materi_ujian')}}" class="btn btn-info btn-sm" target="_blank">
                        <i class="fa fa-book"></i>
                        Proses Ujian
                      </a>
                      <a href="{{url('violation')}}/{{$driver->id}}/{{('index')}}" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i>
                        Pelanggaran
                      </a>
                    @endif
                  </td>
                  <td>  
                    <label>
                      @if ($driver->status == 'Proses Pengajuan')
                      <a class="badge badge-warning text-white"> Proses Pengajuan</a>
                      @elseif ($driver->status == 'Sudah Disetujui')
                      <a class="badge badge-success text-white">Sudah Disetujui</a>
                      @else ($driver->status == 'Diblokir')
                      <a class="badge badge-danger text-white">Diblokir</a>
                      @endif
                    </label> 
                  </td>
                  <td>{{$driver->owner_name}}</td>
                  <td>{{$driver->pic_nama}}</td>
                  <td>{{$driver->name}}</td>
                  <td>
                    {{date('l, d F Y, H:i:s', strtotime($driver->tanggal_pengajuan))}}
                  </td>
                  <td>
                    @if ($driver->status == 'Proses Pengajuan')
                      Belum Disetujui
                    @elseif($driver->status == 'Sudah Disetujui')
                      {{date('l, d F Y, H:i:s', strtotime($driver->tanggal_setujui))}}
                    @else($driver->status == 'Diblokir')
                      {{date('l, d F Y, H:i:s', strtotime($driver->tanggal_setujui))}}
                    @endif
                  </td>
                  <td>
                    @if ($driver->status == 'Proses Pengajuan')
                      Belum Disetujui
                    @elseif($driver->status == 'Sudah Disetujui')
                      {{$driver->nama_setujui}}
                    @else($driver->status == 'Diblokir')
                      {{$driver->nama_setujui}}
                    @endif
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>

            <!-- Tombol bawah -->
            <div>
              <a href="{{url('master_driver')}}/{{('add')}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>
                Tambah Data
              </a>
              <a href="{{url('master_driver')}}/{{('jadwal_ujian_driver')}}" class="btn btn-success btn-sm">
                <i class='far fa-clock'></i>
                Penjadwalan Ujian Driver
              </a>
              <a href="{{url('/master_driver/export_excel')}}" target="_blank" class="btn btn-default btn-sm">
                <i class="fa fa-download"></i>
                Export Data
              </a>
              <a href="{{url('/master_driver/rekapan_pelanggaran')}}" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i>
                Rekapan Pelanggaran
              </a>
              <a href="{{url('/master_driver/recycle_bin')}}" class="btn btn-danger btn-sm">
                <i class="fa fa-history"></i>
                Catatan
              </a>
                <!-- 
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm">
                  Import Data
                </button>
                <a href="{{url('/tamplate/?file=tamplate_driver.xls')}}" class="btn btn-success btn-sm" >
                  Download Tamplate Import Driver
                </a>
              -->              
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


<!-- Modal Import ------------------------------------------------- -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="import-driver" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="input-group mb-3">
            <input type="file" name="file" class="form-control">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection
