@section('heading', 'Merk')

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
            <h3 class="card-title"> Data Master Merk Truck </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Kode Item </th>
                  <th> Keterangan </th>
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
                @foreach($merk as $mr)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $mr->kode_item}} </td>
                  <td>{{ $mr->keterangan}} </td>

                  <td>  
                    <label  class="badge {{($mr->status == 'Aktif') ? 'badge-success' : 'badge-danger'}}" >
                      @if ($mr->status == 'Aktif')
                      <a class="text-white">  Aktif </a>
                      @else
                      <a class="text-white"> Tidak Aktif </a>
                      @endif
                    </label> 
                  </td>

                  <td>
                      @if ($mr->status == 'Aktif')
                      <a href="{{url('/merk/statusmerk/'.$mr->id)}}" class="btn btn-danger btn-sm">
                        <i class="fa fa-exclamation-circle"></i>
                        Nonktifkan
                      </a>
                      @else
                      <a href="{{url('/merk/statusmerk/'.$mr->id)}}" class="btn btn-success btn-sm">
                        <i class="fa fa-exclamation-circle"></i>
                        Aktifkan
                      </a>
                      @endif
                    <a href="{{ url('merk') }}/{{$mr->id}}/{{('editmerk')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                    <a href="#" class="btn btn-danger btn-sm delete_merk" data-id-merk="{{ $mr->id}}" data-merk="{{ $mr->keterangan}}">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Merk </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Formulir ______________________________________________________________________________________________ -->
      <div class="modal-body">

        <form action="{{url('merk/createmerk')}}" method="POST" enctype="multipart/form-data" >
          {{csrf_field()}}

          <!-- kode_item -->
          <div class="form-group row">
            <div class="col-md-3">
              <label> Kode Item </label>
            </div>
            <div class="col-md-9">
              <input  id="kode_item" type="text" class="form-control" name="kode_item" value="{{old('kode_item')}}" placeholder="" required autocomplete="off" autofocus>
            </div>
          </div>

          <!-- keterangan -->
          <div class="form-group row">
            <div class="col-md-3">
              <label> Keterangan </label>
            </div>
            <div class="col-md-9">
              <input  id="keterangan" type="text" class="form-control" name="keterangan" value="{{old('keterangan')}}" placeholder="" >
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
