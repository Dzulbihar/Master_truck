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
            <form action="{{url('/truck/cari')}}/{{$company->id}}" method="GET">
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
          <!-- /.card-header -->
          <div class="card-body">
            <table id="truck" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Status Pengajuan</th>
                  <th>Nomor Polisi</th>
                  <th>Merk</th>
                  <th>RFID </th>
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
                    <a href="{{url('truck') }}/{{$company->id}}/{{$truck->id}}/{{('detail')}}" class="btn btn-primary btn-sm">
                      <i class="fa fa-edit"></i>
                      Detail
                    </a>
                  </td>
                  <td>  
                    <label>
                      @if ($truck->status == 'Proses Pengajuan')
                      <a class="badge badge-warning text-white">
                        Proses Pengajuan
                      </a>
                      @elseif ($truck->status == 'Sudah Disetujui')
                      <a class="badge badge-success text-white">
                        Sudah Disetujui
                      </a>
                      @else ($truck->status == 'Diblokir')
                      <a class="badge badge-danger text-white">
                        Diblokir
                      </a>
                      @endif
                    </label> 
                  </td>
                  <td>{{$truck->police_no}}</td>
                  <td>{{$truck->trade_mark}}</td>
                  <td>  
                    <label>
                      @if ($truck->status == 'Proses Pengajuan')
                         Belum Ada
                      @elseif ($truck->status == 'Sudah Disetujui')
                         Sudah Ada
                      @else ($truck->status == 'Diblokir')
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
              <a href="{{url('truck')}}/{{$company->id}}/{{('add')}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> 
                Tambah Data
              </a>
              <a href="{{url('truck')}}/{{$company->id}}/{{('tulis_pesan')}}" class="btn btn-info btn-sm">
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

