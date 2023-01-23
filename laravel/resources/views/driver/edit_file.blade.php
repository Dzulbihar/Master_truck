@section('heading', 'Edit Driver')

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
						<h3 class="card-title"> <b>Edit File Driver dengan nama {{ $driver->name}}</b>  </h3>
					</div>

					<!-- form start -->
					<form action="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('update_file')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<input type="hidden" class="form-control" name="id" value="{{ $driver->id}}" >
			
							<!-- statement_form -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Surat pengantar dari perusahaan trucking (jpg,pdf) </label>
								</div>
								<div class="col-md-7">
									<input  id="statement_form" type="file" class="form-control @error('statement_form') is-invalid @enderror" name="statement_form" value="{{ $driver->statement_form}}">
									@error('statement_form')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$driver->get_statement_form()}}" width="100%"></embed>
								</div>
							</div>

							<!-- file_SIM -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Upload SIM (jpg,pdf) </label>
								</div>
								<div class="col-md-7">
									<input  id="file_sim" type="file" class="form-control @error('file_sim') is-invalid @enderror" name="file_sim" value="{{ $driver->file_sim}}">
									@error('file_sim')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$driver->get_file_sim()}}" width="100%"></embed>
								</div>
							</div>

							<!-- file_KTP -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Upload KTP (jpg,pdf) </label>
								</div>
								<div class="col-md-7">
									<input  id="file_ktp" type="file" class="form-control @error('file_ktp') is-invalid @enderror" name="file_ktp" value="{{ $driver->file_ktp}}">
									@error('file_ktp')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$driver->get_file_ktp()}}" width="100%"></embed>
								</div>
							</div>

							<!-- file_foto -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Upload Foto (jpg,png) </label>
								</div>
								<div class="col-md-7">
									<input  id="file_foto" type="file" class="form-control @error('file_foto') is-invalid @enderror" name="file_foto" value="{{ $driver->file_foto}}">
									@error('file_foto')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">Pas foto terbaru dengan latar belakang warna merah</span> |
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$driver->get_file_foto()}}" width="100%"></embed>
								</div>
							</div>

							<!-- tombol --> 
							<div class="form-group row">   
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('driver')}}/{{$company->id}}/{{$driver->id}}/{{('detail')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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