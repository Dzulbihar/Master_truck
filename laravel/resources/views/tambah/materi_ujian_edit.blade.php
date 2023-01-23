@section('heading', 'Edit Materi Ujian')

@extends('layouts.app')

@section('content')


<br>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">

			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-white">

					<div class="card-header">
						<h3 class="card-title"> <b>Edit Materi Ujian</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('materi_ujian') }}/{{$materi_ujian->id}}/{{('updatemateri_ujian')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- nama_pertanyaan -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama Pertanyaan </label>
								</div>
								<div class="col-md-9">
									<input  id="nama_pertanyaan" type="text" class="form-control" name="nama_pertanyaan" value="{{ $materi_ujian->nama_pertanyaan}}" autocomplete="off">
								</div>
							</div>

							<!-- isi_pertanyaan -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Isi Pertanyaan </label>
								</div>
								<div class="col-md-9">
									<input  id="isi_pertanyaan" type="text" class="form-control" name="isi_pertanyaan" value="{{ $materi_ujian->isi_pertanyaan}}" autocomplete="off">
								</div>
							</div>

							<!-- lampiran -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Lampiran </label>
								</div>
								<div class="col-md-9">
									<select id="lampiran" class="form-control" name="lampiran" required>
										<option selected>-- Pilih --</option>
										<option value="Ya" @if($materi_ujian->lampiran == 'Ya') selected @endif> Ya </option>
										<option value="Tidak" @if($materi_ujian->lampiran == 'Tidak') selected @endif> Tidak </option>
									</select>
								</div>
							</div>


							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/materi_ujian')}}" class="btn btn-default btn-sm float-right">Kembali</a>
								</div>
							</div>

						</div>
					</form>
				</div>
			</div>
			<!-- /.card -->

		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->



@stop