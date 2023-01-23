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
            <form action="{{url('/driver/cari')}}/{{$company->id}}" method="GET">
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
            <table id="driver" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Status Pengajuan</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>HP (WA)</th>
                  <th>RFID</th>
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
                      <a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('detail')}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>
                        Detail
                      </a>  
                    @else ($driver->status == 'Sudah Disetujui' || $driver->status == 'Diblokir')
                      <a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('detail')}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>
                        Detail
                      </a>    
                      <a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('ujian')}}" class="btn btn-info btn-sm">
                        <i class="fa fa-book"></i>
                        Proses Ujian
                      </a> 
                    @endif
                  </td>
                  <td>  
                    <label>
                      @if ($driver->status == 'Proses Pengajuan')
                      <a class="badge badge-warning text-white">
                        Proses Pengajuan
                      </a>
                      @elseif ($driver->status == 'Sudah Disetujui')
                      <a class="badge badge-success text-white">
                        Sudah Disetujui
                      </a>
                      @else ($driver->status == 'Diblokir')
                      <a class="badge badge-danger text-white">
                        Diblokir
                      </a>
                      @endif
                    </label> 
                  </td>
                  <td>{{$driver->name}}</td>
                  <td>{{$driver->addr}}</td>
                  <td>{{$driver->hp1}}</td>
                  <td>  
                    <label>
                      @if ($driver->status == 'Proses Pengajuan')
                         Belum Ada
                      @elseif ($driver->status == 'Sudah Disetujui')
                         Sudah Ada
                      @else ($driver->status == 'Diblokir')
                        Diblokir
                      @endif
                    </label> 
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
            <!-- Button bawah -->
            <div>
              <a href="{{url('driver')}}/{{$company->id}}/{{('add')}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>
                Tambah Data
              </a>
              <a href="{{url('driver')}}/{{$company->id}}/{{('tulis_pesan')}}" class="btn btn-info btn-sm">
                <i class="fa fa-envelope"></i> 
                Kirim Pesan Email
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
  <!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection

