@section('heading', 'Edit Truck')

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
						<h3 class="card-title"> <b>Edit File Truck dengan Nomor Polisi {{ $truck->police_no}}</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('master_truck') }}/{{$truck->id}}/{{('update_file')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<input type="hidden" class="form-control" name="id" value="{{ $truck->id}}" >

							<!-- foto_stnk --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto STNK (jpg)</label>
								</div>
								<div class="col-md-7">
									<input type="file" class="form-control @error('foto_stnk') is-invalid @enderror" name="foto_stnk" value="{{ $truck->foto_stnk}}">
									@error('foto_stnk')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="image/jpg" src="{{$truck->get_foto_stnk()}}" width="100%"></embed>
								</div>
							</div>	

							<!-- foto_truck --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto Head Truk (jpg)</label>
								</div>
								<div class="col-md-7">
									<input type="file" class="form-control @error('foto_truck') is-invalid @enderror" name="foto_truck" value="{{ $truck->foto_truck}}">
									@error('foto_truck')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="image/jpg" src="{{$truck->get_foto_truck()}}" width="100%"></embed>
								</div>
							</div>

							<!-- foto_kir_truck --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto KIR Head Truk (jpg)</label>
								</div>
								<div class="col-md-7">
									<input  type="file" class="form-control @error('foto_kir_truck') is-invalid @enderror" name="foto_kir_truck" value="{{ $truck->foto_kir_truck}}">
									@error('foto_kir_truck')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="image/jpg" src="{{$truck->get_foto_kir_truck()}}" width="100%"></embed>
								</div>
							</div>	
							
							<!-- foto_chassis --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto Chasis Truk (jpg)</label>
								</div>
								<div class="col-md-7">
									<input type="file" class="form-control @error('foto_chassis') is-invalid @enderror" name="foto_chassis" value="{{ $truck->foto_chassis}}">
									@error('foto_chassis')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="image/jpg" src="{{$truck->get_foto_chassis()}}" width="100%"></embed>
								</div>
							</div>

							<!-- foto_kir_chassis --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto KIR Chasis Truk (jpg)</label>
								</div>
								<div class="col-md-7">
									<input type="file" class="form-control @error('foto_kir_chassis') is-invalid @enderror" name="foto_kir_chassis" value="{{ $truck->foto_kir_chassis}}">
									@error('foto_kir_chassis')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="image/jpg" src="{{$truck->get_foto_kir_chassis()}}" width="100%"></embed>
								</div>
							</div>		
						
							<!-- tombol --> 
							<div class="form-group row">   
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('master_truck')}}/{{$truck->id}}/{{('detail')}}" class="btn btn-default btn-sm float-right">Kembali</a>
								</div>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->


@stop