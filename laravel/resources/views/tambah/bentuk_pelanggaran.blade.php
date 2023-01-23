@section('heading', 'Bentuk Pelanggaran')

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
            <h3 class="card-title"> Data Master Bentuk Pelanggaran </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Jenis Pelanggaran </th>
                  <th> Bentuk Pelanggaran </th>
                  <th> Status </th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($bentuk_pelanggaran as $bentuk)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $bentuk->bentuk_jenis}} </td>
                  <td>{{ $bentuk->bentuk_pelanggaran}} </td>
                  <td>  
                    <label  class="badge {{($bentuk->status == 'Aktif') ? 'badge-success' : 'badge-danger'}}" >
                      @if ($bentuk->status == 'Aktif')
                      <a class="text-white">  Aktif </a>
                      @else
                      <a class="text-white"> Tidak Aktif </a>
                      @endif
                    </label> 
                  </td>
                  <td>
                      @if ($bentuk->status == 'Aktif')
                      <a href="{{url('/bentuk_pelanggaran/statusbentuk_pelanggaran/'.$bentuk->bentuk_pelanggaran)}}" class="btn btn-danger btn-sm">
                        <i class="fa fa-exclamation-circle"></i>
                        Nonaktifkan
                      </a>
                      @else
                      <a href="{{url('/bentuk_pelanggaran/statusbentuk_pelanggaran/'.$bentuk->bentuk_pelanggaran)}}" class="btn btn-success btn-sm">
                        <i class="fa fa-exclamation-circle"></i>
                        Aktifkan
                      </a>
                      @endif
                    <a href="{{ url('bentuk_pelanggaran') }}/{{$bentuk->bentuk_pelanggaran}}/{{('editbentuk_pelanggaran')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                    <a href="#" class="btn btn-danger btn-sm delete_bentuk_pelanggaran" data-bentuk_pelanggaran="{{ $bentuk->bentuk_pelanggaran}}">
                      <i class="fa fa-trash"></i>
                      Delete
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
            <!-- Button trigger modal -->
            <div>
              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                <i class="fa fa-plus"></i>
                Tambah Data
              </button>
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


<!-- Modal ------------------------------------------------- -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Master Jenis Pelanggaran </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Formulir ______________________________________________________________________________________________ -->
      <div class="modal-body">
        <form action="{{url('bentuk_pelanggaran/createbentuk_pelanggaran')}}" method="POST" enctype="multipart/form-data" >
          {{csrf_field()}}

          <!-- bentuk_jenis -->
          <div class="form-group row">
            <div class="col-md-3">
              <label> Jenis Pelanggaran </label>
            </div>
            <div class="col-md-9">
              <select id="bentuk_jenis" name="bentuk_jenis" class="form-control" class="form-control" value="{{ old('bentuk_jenis') }}">
                @foreach($jenis_pelanggaran as $ka)
                <option 
                  value="{{$ka->jenis_pelanggaran}}">
                  {{$ka->jenis_pelanggaran}} 
                </option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- bentuk_pelanggaran -->
          <div class="form-group row">
            <div class="col-md-3">
              <label> Bentuk Pelanggaran </label>
            </div>
            <div class="col-md-9">
              <input  id="bentuk_pelanggaran" type="text" class="form-control" name="bentuk_pelanggaran" value="{{old('bentuk_pelanggaran')}}" placeholder="" required autocomplete="off" autofocus>
            </div>
          </div>

          <input type="hidden" name="status" value="Aktif">

          <div class="form-group row">
            <!-- Tombol -->    
            <div class="col-md-12">
              <br>
              <button type="submit" class="btn btn-primary btn-sm">
                Simpan
              </button>
              <button type="button" class="btn btn-default btn-sm float-right" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </form>  
      </div>
      <!-- EndFormulir __________________________________________________________________________________________ -->
    </div>
  </div>
</div>
<!-- EndModal ------------------------------------------------- -->



@endsection
