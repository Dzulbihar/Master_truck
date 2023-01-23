@section('heading', 'Edit Jawaban Ujian Driver')

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

			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-white">

					<div class="card-header">
						<h3 class="card-title"><b> Edit Jawaban</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{url('driver')}}/{{$driver->id}}/{{$proses_ujian->id}}/{{('ujian_jawaban_update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<input type="hidden" name="id" value="{{ $proses_ujian->id}}">

							<!-- nomor -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor </label>
								</div>
								<div class="col-md-9">
									<input id="nomor" type="text" class="form-control" name="nomor" value="{{ $proses_ujian->nomor}}" required autocomplete="nomor" autofocus>
								</div>
							</div>

							<!-- jawaban_text -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jawaban </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" name="jawaban_text" id="jawaban_text" rows="3" value="{{$proses_ujian->jawaban_text}}" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- jawaban_file -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Upload FIle (PDF) </label>
								</div>
								<div class="col-md-7">
									<input id="jawaban_file" type="file" class="form-control @error('jawaban_file') is-invalid @enderror" name="jawaban_file" value="{{ $proses_ujian->jawaban_file}}" >
									@error('jawaban_file')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger"> upload format pdf | ukuran maksimal 4 mb </span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$proses_ujian->getjawabanfile()}}" width="100%"></embed>
								</div>
							</div>

							<!-- tombol --> 
							<div class="form-group row">   
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('ujian')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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