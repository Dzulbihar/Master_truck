@section('heading', 'Catatan Driver')

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
              Catatan (Master Driver)
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

                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Tanggal lahir</th>
                  <th>Jenis kelamin</th>
                  <th>Alamat</th>
                  <th>HP 1</th>
                  <th>HP 2</th>
                  <th>Phone</th>
                  <th>Fax</th>
                  <th>Mobile</th>
                  
                  <th>Nomor SIM</th>
                  <th>Tanggal berlaku SIM</th>
                  <th>Tanggal masuk</th>
                  
                  <th>Keterangan</th>

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
                @foreach($drivers as $driver)
                <tr>
                  <th>{{$nomer++}}</th>
                  <th>
                    <a href="{{url('master_driver')}}/{{$driver->id}}/{{('restore')}}" class="btn btn-success btn-sm" onclick="return confirm('Yakin mau memulihkan ?')">
                      <i class="fa fa-window-restore"></i>
                      Restore
                    </a>
                  </th>

                  <td>{{$driver->created_at()}}</td>
                  <td>{{$driver->penghapus}}</td>
                  <td>{{$driver->alasan_dihapus}}</td>

                  <td>  
                    <label>
                      @if ($driver->status == 0)
                      <a class="badge badge-warning text-white"> Proses Pengajuan</a>
                      @elseif ($driver->status == 1)
                      <a class="badge badge-success text-white">Sudah Disetujui</a>
                      @else ($driver->status == 2)
                      <a class="badge badge-danger text-white"> Diblokir</a>
                      @endif
                    </label> 
                  </td>
                  <td>{{$driver->owner_name}}</td>
                  <td>{{$driver->pic_nama}}</td>
                  <td>{{$driver->email}}</td>

                  <td>{{$driver->name}}</td>
                  <td>{{$driver->nik}}</td>
                  <td>{{$driver->birthday}}</td>
                  <td>{{$driver->gender}}</td>
                  <td>{{$driver->addr}}</td>
                  <td>{{$driver->hp1}}</td>
                  <td>{{$driver->hp2}}</td>
                  <td>{{$driver->phone}}</td>
                  <td>{{$driver->fax}}</td>
                  <td>{{$driver->mobile}}</td>
                  
                  <td>{{$driver->drive_license}}</td>
                  <td>{{$driver->valid_date}}</td>
                  <td>{{$driver->ins_date}}</td>
                  
                  <td>{{$driver->remaks}}</td>

                  <td>{{$driver->alasan_blokir}}</td>
                  <td>{{$driver->get_tanggal_pengajuan()}}</td>
                  <td>{{$driver->get_tanggal_setujui()}}</td>
                  <td>{{$driver->nama_setujui}}</td>
                </tr>
                @endforeach  
              </tbody>
            </table>

            <!-- Button trigger modal -->
            <div>
              <a href="{{url('/master_driver')}}/{{('recycle_bin')}}/{{('clear')}}" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin mau bersihkan ?')">
                <i class="fa fa-trash"></i>
                Bersihkan
              </a>
              <a href="{{url('/master_driver')}}" class="btn btn-default btn-sm float-sm-right">
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

