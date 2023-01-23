@section('heading', 'Master User')

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
            <!-- Button atas -->
            <!-- Status -->
            <form action="{{url('/master_user/cari')}}" method="GET">
              <h3 class="card-title">Master User &nbsp;&nbsp; 
              <select type="text" name="cari" class="btn btn-default btn-sm">
                <option>Tidak Aktif</option>
                <option>Aktif</option>
                <option>Blokir</option>
              </select>
              <input type="submit" value="CARI" class="btn btn-default btn-sm">
              <?php 
                if(isset($_GET['cari'])){
                 $cari = $_GET['cari'];
              ?>
              <a class="btn btn-default btn-sm"> Hasil Pencarian : <?php echo "Status : $cari" ?> </a>
              <?php 
                 }
              ?>
              </h3>
            </form>
            <br>       
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Role</th>
                  <th>Nama Perusahaan</th>
                  <th>Status</th>
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
                @foreach($users as $user)
                <tr>
                  <th>{{$nomer++}}</th>

                  @if ($user->status == 'Tidak Aktif' || $user->status == 'Blokir')
                  <td>
                    <a href="{{url('master_user')}}/{{$user->id}}/{{('detail')}}" class="btn btn-info btn-sm">
                      <!-- <i class="fas fa-eye"></i> -->
                      <i class="fa fa-edit"></i>
                      Detail
                    </a>
                    <a href="{{url('master_user')}}/{{$user->id}}/{{('edit')}}" class="btn btn-default btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                    @if ($user->status == 'Tidak Aktif')
                    <a href="#" class="btn btn-success text-white btn-sm approve_user" data-id-user="{{ $user->id}}" data-user="{{ $user->owner_name}}">
                      <i class="fas fa-check"></i>
                      Approve 
                    </a>
                    @else ($user->status == 'Blokir')
                    <a href="#" class="btn btn-success text-white btn-sm unblock_user" data-id-user="{{ $user->id}}" data-user="{{ $user->owner_name}}">
                      <i class="fa fa-unlock-alt"></i>
                      Unblock 
                    </a>
                    @endif
                  </td>
                  @endif

                  @if ($user->status == 'Aktif')
                  <td>
                    <a href="{{url('master_user')}}/{{$user->id}}/{{('detail')}}" class="btn btn-info btn-sm">
                      <!-- <i class="fas fa-folder"></i> -->
                      <i class="fa fa-edit"></i>
                      Detail
                    </a>
                    <a href="{{url('master_user')}}/{{$user->id}}/{{('edit')}}" class="btn btn-default btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                    <a href="#" class="btn btn-warning text-white btn-sm reject_user" data-id-user="{{ $user->id}}" data-user="{{ $user->owner_name}}">
                      <i class="fas fa-undo"></i>
                      Reject 
                    </a>
                    <a href="{{url('master_user')}}/{{$user->id}}/{{('edit_blokir')}}" class="btn btn-danger btn-sm">
                      <i class="fa fa-lock"></i>
                      Block
                    </a>
                  </td>
                  @endif

                  <td>{{$user->role}}</td>
                  <td>{{$user->owner_name}}</td>
                  <td>  
                    <label>
                      @if ($user->status == 'Tidak Aktif')
                      <a class="badge badge-danger text-white">Tidak Aktif</a>
                      @elseif($user->status == 'Aktif')
                      <a class="badge badge-success text-white">Aktif</a>
                      @else($user->status == 'Blokir')
                      <a class="badge badge-danger text-white">Blokir</a>
                      @endif
                    </label> 
                  </td>
                  <td>
                    {{date('l, d F Y, H:i:s', strtotime($user->tgl_pengajuan))}}
                  </td>
                  <td>
                    @if ($user->status == 'Tidak Aktif')
                      Belum Disetujui
                    @elseif($user->status == 'Aktif')
                      {{date('l, d F Y, H:i:s', strtotime($user->tgl_disetujui))}}
                    @else($user->status == 'Blokir')
                      {{date('l, d F Y, H:i:s', strtotime($user->tgl_disetujui))}}
                    @endif
                  </td>
                  <td>
                    @if ($user->role == 'user')
                      @if ($user->status == 'Tidak Aktif')
                        Belum Disetujui
                      @elseif($user->status == 'Aktif')
                        {{$user->disetujui_oleh}}
                      @else($user->status == 'Blokir')
                        {{$user->disetujui_oleh}}
                      @endif
                    @endif
                    @if ($user->role == 'admin')
                      Admin
                    @endif
                  </td>
                </tr>
                @endforeach 
              </tbody>
            </table>
            <a href="{{url('master_user')}}/{{('add')}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>
                Tambah Data
              </a>
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
