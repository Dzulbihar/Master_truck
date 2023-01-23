@section('heading', 'Master Truck')

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
            <form action="{{url('/master_truck/cari')}}" method="GET">
              <h3 class="card-title">Master Truck &nbsp;&nbsp; 
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

          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Status Pengajuan</th>
                  <th>Perusahaan</th>
                  <th>PIC</th>
                  <th>Nomor Polisi</th>
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
                @foreach($trucks as $truck)
                <tr>
                  <th>{{$nomer++}}</th>
                  <td>
                    <a href="{{url('master_truck')}}/{{$truck->id}}/{{('detail')}}" class="btn btn-primary btn-sm">
                      <i class="fa fa-edit"></i>
                      Detail
                    </a>
                  </td>
                  <td>  
                    <label>
                      @if ($truck->status == 'Proses Pengajuan')
                      <a class="badge badge-warning text-white"> Proses Pengajuan</a>
                      @elseif ($truck->status == 'Sudah Disetujui')
                      <a class="badge badge-success text-white">Sudah Disetujui</a>
                      @else ($truck->status == 'Diblokir')
                      <a class="badge badge-danger text-white"> Diblokir</a>
                      @endif
                    </label> 
                  </td>
                  <td>{{$truck->owner_name}}</td>
                  <td>{{$truck->pic_nama}}</td>
                  <td>{{$truck->police_no}}</td>
                  <td>
                    {{date('l, d F Y, H:i:s', strtotime($truck->tanggal_pengajuan))}}
                  </td>
                  <td>
                    @if ($truck->status == 'Proses Pengajuan')
                      Belum Disetujui
                    @elseif($truck->status == 'Sudah Disetujui')
                      {{date('l, d F Y, H:i:s', strtotime($truck->tanggal_setujui))}}
                    @else($truck->status == 'Diblokir')
                      {{date('l, d F Y, H:i:s', strtotime($truck->tanggal_setujui))}}
                    @endif
                  </td>
                  <td>
                    @if ($truck->status == 'Proses Pengajuan')
                      Belum Disetujui
                    @elseif($truck->status == 'Sudah Disetujui')
                      {{$truck->nama_setujui}}
                    @else($truck->status == 'Diblokir')
                      {{$truck->nama_setujui}}
                    @endif
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>

            <!-- Button bawah -->
            <div>
              <a href="{{url('master_truck')}}/{{('add')}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>
                Tambah Data
              </a>
              <a href="{{url('master_truck')}}/{{('jadwal_pengambilan_rfid_tag')}}" class="btn btn-success btn-sm">
                <i class='far fa-clock'></i>
                Penjadwalan Pengambilan RFID Tag
              </a>
              <a href="{{url('master_truck')}}/{{('export_excel')}}" target="_blank" class="btn btn-default btn-sm">
                <i class="fa fa-download"></i>
                Export Data
              </a>
              <a href="{{url('/master_truck/recycle_bin')}}" class="btn btn-danger btn-sm">
                <i class="fa fa-history"></i>
                Catatan
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

