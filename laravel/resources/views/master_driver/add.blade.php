@section('heading', 'Tambah Driver')

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
			<div class="col-md-12">
				<div class="card card-white">
					<div class="card-header">
						<h3 class="card-title"> <b>Tambah Data Driver</b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('master_driver')}}/{{('create')}}" method="POST" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- company_id -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Id User login </label>
								</div>
								<div class="col-md-9">
									<select id="company_id" name="company_id" class="form-control select2" style="width: 100%;" value="{{ old('company_id') }}">
										@foreach($company as $ka)
										<option value="{{$ka->id}}">
											{{$ka->id}} --> Perusahaan = ({{$ka->owner_name}})
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- owner_name -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama Perusahaan </label>
								</div>
								<div class="col-md-9">
									<select id="owner_name" name="owner_name" class="form-control select2" style="width: 100%;" value="{{ old('owner_name') }}">
										@foreach($company as $ka)
										<option value="{{$ka->owner_name}}">
											{{$ka->owner_name}} --> PIC = ({{$ka->pic_nama}})
										</option>
										@endforeach
									</select> 
								</div>
							</div>

							<!-- pic_nama -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama PIC </label>
								</div>
								<div class="col-md-9">
									<select id="pic_nama" name="pic_nama" class="form-control select2" style="width: 100%;" value="{{ old('pic_nama') }}">
										@foreach($company as $ka)
										<option value="{{$ka->pic_nama}}">
											{{$ka->pic_nama}} --> Email = ({{$ka->email}})
										</option>
										@endforeach
									</select> 
								</div>
							</div>

							<!-- email -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Email </label>
								</div>
								<div class="col-md-9">
									<select id="email" name="email" class="form-control select2" style="width: 100%;" value="{{ old('email') }}">
										@foreach($company as $ka)
										<option value="{{$ka->email}}">
											{{$ka->email}}
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- name -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama </label>
								</div>
								<div class="col-md-9">
									<input  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- nik -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> NIK </label>
								</div>
								<div class="col-md-9">
									<input  id="nik" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{old('nik')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('nik')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- birthday -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Tanggal Lahir </label>
								</div>
								<div class="col-md-9">
									<input  id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{old('birthday')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('birthday')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- gender -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis Kelamin </label>
								</div>
								<div class="col-md-9">
									<select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}">
										<option disabled>-- Pilih --</option>
										<option> Laki-laki </option>
										<option> Perempuan </option>
									</select>
									@error('gender')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- addr -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Alamat </label>
								</div>
								<div class="col-md-9">
									<input  id="addr" type="text" class="form-control @error('addr') is-invalid @enderror" name="addr" value="{{old('addr')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus >
									@error('addr')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- hp1 -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> HP (WA) (+62) </label>
								</div>
								<div class="col-md-9">
									<input name="hp1" id="hp1" type="text" class="form-control @error('hp1') is-invalid @enderror" data-inputmask="'mask': ['+9999999999999']" data-mask value="{{ old('hp1') }}" required autocomplete="off" autofocus>
									@error('hp1')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-success"> Aktif What'Apps </span> |
									<span class="text-success"> +6289xxxxxxxxx</span>
								</div>
							</div>

							<!-- drive_license -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor SIM </label>
								</div>
								<div class="col-md-9">
									<input  id="drive_license" type="text" class="form-control @error('drive_license') is-invalid @enderror" name="drive_license" value="{{old('drive_license')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('drive_license')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- valid_date = tanggal berlaku = tgl pembuatan SIM  -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Tanggal berlaku SIM </label>
								</div>
								<div class="col-md-9">
									<input  id="valid_date" type="date" class="form-control @error('valid_date') is-invalid @enderror" name="valid_date" value="{{old('valid_date')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('valid_date')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- statement_form -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Surat pengantar dari perusahaan trucking (jpg,pdf) </label>
								</div>
								<div class="col-md-9">
									<input  id="statement_form" type="file" class="form-control @error('statement_form') is-invalid @enderror" name="statement_form" value="{{old('statement_form')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('statement_form')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							<!-- file_sim -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Upload SIM (jpg,pdf) </label>
								</div>
								<div class="col-md-9">
									<input  id="file_sim" type="file" class="form-control @error('file_sim') is-invalid @enderror" name="file_sim" value="{{old('file_sim')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('file_sim')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							<!-- file_ktp -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Upload KTP (jpg,pdf) </label>
								</div>
								<div class="col-md-9">
									<input  id="file_ktp" type="file" class="form-control @error('file_ktp') is-invalid @enderror" name="file_ktp" value="{{old('file_ktp')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('file_ktp')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							<!-- file_foto -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Upload Foto (jpg,png) </label>
								</div>
								<div class="col-md-9">
									<input  id="file_foto" type="file" class="form-control @error('file_foto') is-invalid @enderror" name="file_foto" value="{{old('file_foto')}}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('file_foto')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">Pas foto terbaru dengan latar belakang warna merah</span> |
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							<!-- Tombol --> 
							<div class="form-group row">
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Simpan
									</button>
									<a href="{{url('master_driver')}}" class="btn btn-default btn-sm float-sm-right">
										Kembali
									</a>
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