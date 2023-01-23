@section('heading', 'Jadwal Ujian')

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
              <h3 class="card-title"> <b>Rekapan Jadwal Ujian Driver</b> </h3>
          </div>

          <div class="card-body">
            <form action="{{url('master_driver')}}/{{('jadwal_ujian_driver')}}" method="get">
              <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <label class="col-form-label">Periode</label>
                </div>
                <div class="col-auto">
                  <input type="date" class="form-control" name="start_date" required>
                </div>
                <div class="col-auto">
                  <label class="col-form-label">To</label>
                </div>
                <div class="col-auto">
                  <input type="date" class="form-control" name="end_date" required>
                </div>
                <div class="col-auto">
                  <button class="btn btn-primary" type="submit">Cari</button>
                </div>
              </div>
            </form>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Waktu</th>
                  <th>Perusahaan</th>
                  <th>PIC</th>
                  <th>Email</th>
                  <th>Nama Driver</th>
                  <th>Nomor SIM</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $nomer = 1;
                ?>

                @foreach($jadwal_ujian as $jadwal)
                <tr>
                  <th>{{$nomer++}}</th>
                  <td>
                    @if ($jadwal->status == 'Belum Ujian')
                    <a href="#" class="btn btn-success text-white btn-sm ujian_driver" data-id-jadwal="{{ $jadwal->id}}" data-jadwal="{{ $jadwal->drive_license}}">
                      <i class="fas fa-check"></i>
                      Ujian Sekarang 
                    </a>
                    @else ($jadwal->status == 'Sudah Ujian')
                    <a href="#" class="btn btn-info text-white btn-sm ujian_ulang_driver" data-id-jadwal="{{ $jadwal->id}}" data-jadwal="{{ $jadwal->drive_license}}">
                      <i class="fa fa-spinner"></i>
                      Ujian Diulang 
                    </a>
                    @endif
                  </td>
                  <td>{{$jadwal->tanggal}}</td>
                  <td>{{$jadwal->owner_name}}</td>
                  <td>{{$jadwal->pic_nama}}</td>
                  <td>{{$jadwal->email}}</td>
                  <td>{{$jadwal->name}}</td>
                  <td>{{$jadwal->drive_license}}</td>
                  <td>  
                    <label>
                      @if ($jadwal->status == 'Belum Ujian')
                      <a class="badge badge-danger text-white">Belum Ujian</a>
                      @else($jadwal->status == 'Sudah Ujian')
                      <a class="badge badge-success text-white">Sudah Ujian</a>
                      @endif
                    </label> 
                  </td>
                </tr>
                @endforeach 
 
              </tbody>
            </table>

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
