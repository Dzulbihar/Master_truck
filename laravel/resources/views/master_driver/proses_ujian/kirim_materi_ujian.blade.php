@section('heading', 'Proses Ujian')

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
						<h3 class="card-title"> <b>Materi Ujian Sopir Truk untuk {{ $driver->name}}</b> </h3>
					</div>
					<div class="card-body"> 
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th> Kategori Pertanyaan  </th>
									<th> Isi Pertanyaan </th>
									<th> Lampiran File </th>
									<!-- <th> Review </th> -->
								</tr>
							</thead>
							<tbody>
								<!-- Variabel php untuk nomor-->    
								<?php
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
						<!-- _____________________________________________________________-->
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th> Nomor  </th>
									<th> Jawaban </th>
									<th> Lampiran File </th>
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
								</tr>
								@endforeach  
							</tbody>
						</table>
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
							Berikan Nilai
						</button>
						<a href="{{url('master_driver')}}" class="btn btn-primary btn-sm">Kembali</a>
					</div>
					<!-- /.card-body -->
					<div class="card-header">
						<hr>
						<h4>
							<b> Nilai = {{ $driver->nilai_ujian}}</b>  
						</h4>
						<hr>
							<a href="{{url('kirim_materi_ujian')}}/{{$driver->id}}/{{('konfirmasi_kelulusan')}}" class="btn btn-success text-white"> Konfirmasi kelulusan </a>
              @empty ($driver->lulus_ujian)
              @else
			          @if ($driver->lulus_ujian == 'Lulus Ujian')
			            <a class="btn btn-success text-white">Lulus Ujian</a>
			          @else
			            <a class="btn btn-danger text-white">Tidak Lulus Ujian (Harus mengulang)</a>
			          @endif
		          @endempty
						<hr>
					</div>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Berikan Nilai </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<form action="{{url('kirim_materi_ujian')}}/{{$driver->id}}/{{('nilai_ujian')}}" method="GET" enctype="multipart/form-data" >
      		{{csrf_field()}}

      		<input type="hidden" name="sudah_ujian" value="Sudah Ujian">

      		<!-- nilai_ujian -->
      		<div class="form-group row">
      			<div class="col-md-12">
      				<input type="number" class="form-control" name="nilai_ujian" placeholder="Nilai" value="{{$driver->nilai_ujian}}" required autocomplete="off">
      			</div>
      		</div>

      		<!-- Tombol --> 
      		<div class="form-group row">
      			<div class="col-md-12">
      				<br>
      				<button type="submit" class="btn btn-success btn-sm">
      					Simpan
      				</button>
      			</div>
      		</div>
      	</form> 

      </div>
    </div>
  </div>
</div>


@endsection
