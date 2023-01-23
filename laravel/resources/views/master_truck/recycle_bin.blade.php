@section('heading', 'Catatan Truck')

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
              Catatan (Master Truck)
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

                  <th>Status Pengajuan</th>
                  <th>Nama Perusahaan</th>
                  <th>Nama PIC</th>
                  <th>Email</th>

                  <th>Nomor Polisi</th>
                  <th>Nomor STNK</th>
                  <th>Nomor Mesin</th>
                  <th>Nomor Rangka</th>
                  <th>Tanggal berlaku STNK</th>

                  <th>Merk</th>
                  <th>Tahun </th>
                  <th>Kota</th>

                  <th>Berat Head Truck</th>
                  <th>Kode Chasis</th>
                  <th>Jenis Chasis</th>
                  <th>Berat Chasis Truck</th>
                  <th>Total Berat Head Chasis Truck</th>
                  
                  <th>Nomor Gerbang</th>
                  <th>Bahan Bakar Gas ?</th>
                  <th>Truck Internal ?</th>
                  <th>RFID</th>

                  <th>Alasan Diblokir</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Tanggal Disetujui</th>
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
                  <th>
                    <a href="#" class="btn btn-success btn-sm restore_truck" data-id-truck="{{ $truck->id}}" data-truck="{{ $truck->police_no}}">
                      <i class="fa fa-window-restore"></i>
                      Restore 
                    </a>
                  </th>
                  <td>{{$truck->get_created_at()}}</td>
                  <td>{{$truck->penghapus}}</td>
                  <td>{{$truck->alasan_dihapus}}</td>

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
                  <td>{{$truck->email}}</td>

                  <td>{{$truck->police_no}}</td>
                  <td>{{$truck->stnk_no}}</td>
                  <td>{{$truck->machine_no}}</td>
                  <td>{{$truck->design_no}}</td>
                  <td>{{$truck->get_expired_lisence()}}</td>

                  <td>{{$truck->trade_mark}}</td>
                  <td>{{$truck->year_made}}</td>
                  <td>{{$truck->state}}</td>

                  <td>{{$truck->truck_weight}} kg</td>
                  <td>{{$truck->chassis_code}}</td>
                  <td>{{$truck->jenis_chassis}}</td>
                  <td>{{$truck->chassis_weight}} kg</td>
                  <td>
                    <?php
                      $berat_truck = "$truck->truck_weight";
                      $kode_parameter_chasis = "$truck->chassis_weight";
                      $total_berat = $berat_truck+$kode_parameter_chasis;
                      echo $total_berat;
                      echo ' kg';
                    ?>  
                  </td>
                  
                  <td>{{$truck->gate_no}}</td>
                  <td>{{$truck->bbg_yn}}</td>
                  <td>{{$truck->otl_yn}}</td>
                  <td>{{$truck->id_rfid}}</td>

                  <td>{{$truck->alasan_blokir}}</td>
                  <td>{{$truck->get_tanggal_pengajuan()}}</td>
                  <td>{{$truck->get_tanggal_setujui()}}</td>
                  <td>{{$truck->nama_setujui}}</td>
                </tr>
                @endforeach  
              </tbody>
            </table>
            <!-- Button trigger modal -->
            <div>
              <a href="#" class="btn btn-danger btn-sm bersihkan_truck">
                <i class="fa fa-trash"></i>
                Bersihkan 
              </a>
              <a href="{{url('/master_truck')}}" class="btn btn-default btn-sm float-sm-right">
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
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





@endsection

