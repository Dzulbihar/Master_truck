@section('heading', 'Jadwal Pengambilan RFID Tag')

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
              <h3 class="card-title"> <b>Rekapan Jadwal Pengambilan RFID Tag</b> </h3>
          </div>

          <div class="card-body">
            <form action="{{url('master_truck')}}/{{('jadwal_pengambilan_rfid_tag')}}" method="get">
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
                  <th>Nomor Polisi</th>
                  <th>RFID</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $nomer = 1;
                ?>

                @foreach($jadwal_pengambilan_rfid_tag as $jadwal)
                <tr>
                  <th>{{$nomer++}}</th>
                  <td>
                    @if ($jadwal->status == 'Belum Diambil')
                    <a href="#" class="btn btn-success text-white btn-sm jadwal_ambil_rfid" data-id-jadwal="{{ $jadwal->id}}" data-jadwal="{{ $jadwal->police_no}}">
                      <i class="fas fa-check"></i>
                      Ambil Sekarang 
                    </a>
                    @else ($jadwal->status == 'Sudah Diambil')
                    <a href="#" class="btn btn-info text-white btn-sm jadwal_kembali_rfid" data-id-jadwal="{{ $jadwal->id}}" data-jadwal="{{ $jadwal->police_no}}">
                      <i class="fa fa-spinner"></i>
                      Kartu Dikembalikan 
                    </a>
                    @endif
                  </td>
                  <td>{{$jadwal->tanggal}}</td>
                  <td>{{$jadwal->owner_name}}</td>
                  <td>{{$jadwal->pic_nama}}</td>
                  <td>{{$jadwal->email}}</td>
                  <td>{{$jadwal->police_no}}</td>
                  <td>{{$jadwal->id_rfid}}</td>
                  <td>  
                    <label>
                      @if ($jadwal->status == 'Belum Diambil')
                      <a class="badge badge-danger text-white">Belum Diambil</a>
                      @else($jadwal->status == 'Sudah Diambil')
                      <a class="badge badge-success text-white">Sudah Diambil</a>
                      @endif
                    </label> 
                  </td>

                </tr>
                @endforeach 
 
              </tbody>
            </table>

            <div>
              <a href="{{url('master_truck')}}" class="btn btn-default btn-sm">
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
