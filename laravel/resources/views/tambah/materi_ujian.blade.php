@section('heading', 'Materi Ujian')

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
            <h3 class="card-title"> Master Materi Ujian Sopir Truck </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th> Pertanyaan  </th>
                  <th> Isi Pertanyaan </th>
                  <th> Lampiran </th>
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
                @foreach($materi_ujian as $materi)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $materi->nama_pertanyaan}} </td>
                  <td>{{ $materi->isi_pertanyaan}} </td>
                  <td>{{ $materi->lampiran}} </td>

                  <td>  
                    <label  class="badge {{($materi->status == 'Aktif') ? 'badge-success' : 'badge-danger'}}" >
                      @if ($materi->status == 'Aktif')
                      <a class="text-white">  Aktif </a>
                      @else
                      <a class="text-white"> Tidak Aktif </a>
                      @endif
                    </label> 
                  </td>

                  <td>
                      @if ($materi->status == 'Aktif')
                      <a href="{{url('/materi_ujian/statusmateri_ujian/'.$materi->id)}}" class="btn btn-danger btn-sm">
                        <i class="fa fa-exclamation-circle"></i>
                        Nonktifkan
                      </a>
                      @else
                      <a href="{{url('/materi_ujian/statusmateri_ujian/'.$materi->id)}}" class="btn btn-success btn-sm">
                        <i class="fa fa-exclamation-circle"></i>
                        Aktifkan
                      </a>
                      @endif
                    <a href="{{ url('materi_ujian') }}/{{$materi->id}}/{{('editmateri_ujian')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                    <a href="#" class="btn btn-danger btn-sm delete_materi_ujian" data-id-materi_ujian="{{ $materi->id}}" data-materi_ujian="{{ $materi->materi_ujian}}">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data materi_ujian </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Formulir ______________________________________________________________________________________________ -->
      <div class="modal-body">

        <form action="{{url('materi_ujian/createmateri_ujian')}}" method="POST" enctype="multipart/form-data" >
          {{csrf_field()}}

          <!-- nama_pertanyaan -->
          <div class="form-group row">
            <div class="col-md-3">
              <label> Nama Pertanyaan </label>
            </div>
            <div class="col-md-9">
              <input  id="nama_pertanyaan" type="text" class="form-control" name="nama_pertanyaan" value="{{old('nama_pertanyaan')}}" placeholder="Nama Pertanyaan" autocomplete="off" >
            </div>
          </div>

          <!-- isi_pertanyaan -->
          <div class="form-group row">
            <div class="col-md-3">
              <label> Isi Pertanyaan </label>
            </div>
            <div class="col-md-9">
              <input  id="isi_pertanyaan" type="text" class="form-control" name="isi_pertanyaan" value="{{old('isi_pertanyaan')}}" placeholder="Isi Pertanyaan" autocomplete="off">
            </div>
          </div>

          <!-- Lampiran -->            
          <div class="form-group row">
            <div class="col-md-3">
              <label> Lampiran </label>
            </div>
            <div class="col-md-9">
              <select id="lampiran" class="form-control" id="lampiran" class="form-control" name="lampiran" value="{{ old('lampiran') }}">
                <option disabled>-- Pilih Ya / Tidak --</option>
                <option> Ya </option>
                <option> Tidak </option>
              </select>
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
