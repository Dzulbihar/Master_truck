@section('heading', 'Ujian Driver')

@extends('layouts.app')

@section('content')


{{-- menampilkan error validasi --}}
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<br>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"> <b>Materi Ujian Sopir Truk untuk {{ $driver->name}}</b> </h3>
					</div>
					<div class="card-body"> 
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th> Kategori Pertanyaan  </th>
									<th> Isi Pertanyaan </th>
									<th> Lampiran </th>
									<!-- <th> Review </th> -->
								</tr>
							</thead>
							<tbody>
								<!-- Variabel php untuk nomor-->    <?php
								$nomer = 1;
								?>
								<!-- ambil data di database-->
								@foreach($materi_ujians as $materi_ujian)
								<tr>
									<th>{{ $nomer++}}</th>
									<td>{{ $materi_ujian->nama_pertanyaan}} </td>
									<td>{{ $materi_ujian->isi_pertanyaan}} </td>
									<td>{{ $materi_ujian->lampiran}} </td>
									<!-- 									
									<td>
										<a href="{{url('proses_ujian')}}/{{$driver->id}}/{{$materi_ujian->id}}/{{('jawaban')}}" class="btn btn-warning btn-sm">
											Review
										</a>
									</td> -->
								</tr>
								@endforeach  
							</tbody>
						</table>
					</div>
					<hr><hr>
					<div class="card-header">
						<h3 class="card-title"> <b>Jawaban Ujian Sopir Truk untuk {{ $driver->name}}</b> </h3>
					</div>
					<div class="card-body"> 
						<div>
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
								<i class="fas fa-pencil-alt"></i>
								Tulis Jawaban
							</button>
						</div>
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th> Nomor  </th>
									<th> Jawaban </th>
									<th> Lampiran File </th>
									<th> Aksi </th>
								</tr>
							</thead>
							<tbody>
								@foreach($proses_ujians as $proses_ujian)
								<tr>
									<td>{{ $proses_ujian->nomor}} </td>
									<td>{{ $proses_ujian->jawaban_text}} </td>
									<td>
										<embed type="application/pdf" src="{{$proses_ujian->getjawabanfile()}}" width="100%"></embed>
									</td>
									<td>
										<a href="{{url('driver')}}/{{$driver->id}}/{{$proses_ujian->id}}/{{('ujian_jawaban_edit')}}" class="btn btn-warning text-white btn-sm">
											<i class="fas fa-pencil-alt"></i>
											Edit
										</a>
										<a href="{{url('driver')}}/{{$driver->id}}/{{$proses_ujian->id}}/{{('ujian_hapus')}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">
											<i class="fas fa-trash"></i>
											Delete
										</a>
									</td>
								</tr>
								@endforeach  
							</tbody>
						</table>
						<div>
							<a href="{{url('driver')}}/{{$company->id}}/{{('index')}}" class="btn btn-primary btn-sm">Kembali</a>
						</div>
						<hr>
						<h4>
							<b> Nilai = {{ $driver->nilai_ujian}}</b>  
						</h4>
						<hr>
          		@empty ($driver->nilai_ujian)
          			<a class="btn btn-danger text-white">Belum Diketahui</a>
          		@else     
			          @if ($driver->nilai_ujian >= '70')
			            <a class="btn btn-success text-white">Lulus Ujian</a>
			          @else
			            <a class="btn btn-danger text-white">Tidak Lulus Ujian (Harus mengulang)</a>
			          @endif
		          @endempty
						<hr>
					</div>
					<!-- /.card-body -->
				</div>
			</div>
		</div>
	</div>

<!-- Modal ------------------------------------------------- -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">

	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Isi Jawaban</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>

	        <div class="modal-body">
	        	<form action="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('ujian_jawaban')}}" method="POST" enctype="multipart/form-data" >
	            {{csrf_field()}}

		            <!-- nomor -->
		            <div class="form-group row">
		              <div class="col-md-3">
		                <label> Nomor </label>
		              </div>
		              <div class="col-md-9">
		                <input  id="nomor" type="number" class="form-control" name="nomor" value="{{old('nomor')}}" placeholder="Nomor" required autocomplete="off" autofocus>
		              </div>
		            </div>

		            <!-- jawaban_text -->
		            <div class="form-group row">
		              <div class="col-md-3">
		                <label> Jawaban </label>
		              </div>
		              <div class="col-md-9">
		              	<textarea class="form-control" name="jawaban_text" id="jawaban_text" rows="3" value="{{ old('jawaban_text') }}" required autocomplete="off" autofocus></textarea>
		              </div>
		            </div>

		            <!-- jawaban_file -->
		            <div class="form-group row">
		              <div class="col-md-3">
		                <label> Upload File (jika perlu) </label>
		              </div>
		              <div class="col-md-9">
		                <input  id="jawaban_file" type="file" class="form-control @error('jawaban_file') is-invalid @enderror" name="jawaban_file" value="{{old('jawaban_file')}}" placeholder="" >
		                @error('jawaban_file')
		                  <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                  </span>
		                @enderror
		                <span class="text-danger"> upload format pdf | ukuran maksimal 4 mb </span>
		              </div>
		            </div>

		            <div class="form-group row">
		              <!-- Tombol -->    
		              <div class="col-md-12">
		                <br>
		                <button type="submit" class="btn btn-primary btn-sm">
		                  Simpan
		                </button>
		                <button type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal">Tutup</button>
		            </div>
			    </form>  
			</div>

		</div>
	</div>
</div>
<!-- EndModal ------------------------------------------------- -->


</section>
<!-- /.content -->


@endsection
