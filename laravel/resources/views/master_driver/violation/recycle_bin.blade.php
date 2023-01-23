@section('heading', 'Catatan Pelanggaran Driver')

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
            <h3 class="card-title">  
              Catatan (Pelanggaran)
            </h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Restore </th>

                  <th>Tanggal Hapus</th>
                  <th>Dihapus oleh</th>
                  <th>Alasan dihapus</th>
                  <th>Nama Perusahaan</th>
                  <th>Nama Sopir</th>
                  <th>Nomor Polisi</th>

                  <th>Bentuk Pelanggaran</th>
                  <th>Jenis Pelanggaran</th>
                  <th>Alasan</th>
                  <th>Waktu</th>
                  <th>Tempat</th>

                  <th>Foto pendukung</th>

              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($violations_history as $violation)
                <tr>
                  <th>{{$nomer++}}</th>
                  <th>
                    <a href="{{url('violation')}}/{{$driver->id}}/{{$violation->id}}/{{('restore')}}" class="btn btn-success btn-sm" onclick="return confirm('Yakin mau memulihkan ?')">
                      <i class="fa fa-window-restore"></i>
                      Restore
                    </a>
                  </th>

                  <td>{{$violation->get_created_at()}}</td>
                  <td>{{$violation->penghapus}}</td>
                  <td>{{$violation->alasan_dihapus}}</td>

                  <td>{{$violation->nama_perusahaan}}</td>
                  <td>{{$violation->nama_driver}}</td>
                  <td>{{$violation->police_no}}</td>

                  <td>{{$violation->bentuk_pelanggaran}}</td>
                  <td>{{$violation->jenis_pelanggaran}}</td>
                  <td>{{$violation->alasan}}</td>
                  <td>{{$violation->get_kapan()}}</td>
                  <td>{{$violation->dimana}}</td>
                  <td>{{$violation->getFoto()}}</td>

                </tr>
                @endforeach  
              </tbody>
            </table>

            <!-- Button trigger modal -->
            <div>
              <a href="{{url('violation')}}/{{$driver->id}}/{{('clear')}}" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin mau bersihkan ?')">
                <i class="fa fa-trash"></i>
                Bersihkan
              </a>
              <a href="{{url('violation')}}/{{$driver->id}}/{{('index')}}" class="btn btn-default btn-sm float-sm-right">
                <i class="fa fa-undo"></i>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





@endsection

