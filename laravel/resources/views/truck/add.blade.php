@section('heading', 'Tambah Truck')

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
						<h3 class="card-title"> <b>Tambah Data Truck</b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{url('truck')}}/{{$company->id}}/{{('addtruck')}}" method="POST" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- police_no -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor Polisi </label>
								</div>
								<div class="col-md-9">
									<input id="police_no" type="text" class="form-control @error('police_no') is-invalid @enderror" name="police_no" value="{{ old('police_no') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('police_no')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- stnk_no -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor STNK </label>
								</div>
								<div class="col-md-9">
									<input id="stnk_no" type="text" class="form-control @error('stnk_no') is-invalid @enderror" name="stnk_no" value="{{ old('stnk_no') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('stnk_no')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- machine_no -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor Mesin </label>
								</div>
								<div class="col-md-9">
									<input id="machine_no" type="text" class="form-control @error('machine_no') is-invalid @enderror" name="machine_no" value="{{ old('machine_no') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('machine_no')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- design_no -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor Rangka </label>
								</div>
								<div class="col-md-9">
									<input id="design_no" type="text" class="form-control @error('design_no') is-invalid @enderror" name="design_no" value="{{ old('design_no') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('design_no')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- expired_lisence =  tgl berlaku stnk -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Tanggal berlaku STNK </label>
								</div>
								<div class="col-md-9">
									<input id="expired_lisence" type="date" class="form-control" name="expired_lisence" value="{{ old('expired_lisence') }}" required>
								</div>
							</div>

							<!-- foto_stnk --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto STNK (jpg,pdf)</label>
								</div>
								<div class="col-md-9">
									<input id="foto_stnk" type="file" class="form-control @error('foto_stnk') is-invalid @enderror" name="foto_stnk" value="{{ old('foto_stnk') }}" required autocomplete="off" autofocus>
									@error('foto_stnk')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>


							<!-- trade_mark -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Merk </label>
								</div>
								<div class="col-md-9">
									<select id="trade_mark" name="trade_mark" class="form-control select2 @error('trade_mark') is-invalid @enderror" style="width: 100%;" value="{{ old('trade_mark') }}" required autocomplete="off" autofocus>
										@foreach($merk_truck as $ka)
										<option 
										value="{{$ka->kode_item}}">
										{{$ka->kode_item}}, (Keterangan = {{$ka->keterangan}})</option>
										@endforeach
									</select>
									@error('trade_mark')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror 
								</div>
							</div>

							<!-- year_made -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Tahun </label>
								</div>
								<div class="col-md-9">
									<input id="year_made" type="number" class="form-control @error('year_made') is-invalid @enderror" name="year_made" value="{{ old('year_made') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('year_made')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div> 
							</div> 

							<!-- state -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Kota </label>
								</div>
								<div class="col-md-9">
									<select id="state" name="state" class="form-control select2 @error('trade_mark') is-invalid @enderror" style="width: 100%;" value="{{ old('state') }}" required autocomplete="off" autofocus>
										@foreach($state_truck as $ka)
										<option 
										value="{{$ka->kota}}">
										{{$ka->kota}}</option>
										@endforeach
									</select>
									@error('state')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror 
								</div>
							</div>


							<!-- truck_weight -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Berat Head Truk (kg)</label>
								</div> 
								<div class="col-md-9">
									<input id="truck_weight" type="number" class="form-control @error('truck_weight') is-invalid @enderror" name="truck_weight" value="{{ old('truck_weight') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('truck_weight')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div> 

							<!-- foto_truck --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto Head Truk (jpg,pdf)</label>
								</div>
								<div class="col-md-9">
									<input id="foto_truck" type="file" class="form-control @error('foto_truck') is-invalid @enderror" name="foto_truck" value="{{ old('foto_truck') }}" required autocomplete="off" autofocus>
									@error('foto_truck')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							<!-- foto_kir_truck --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto KIR Head Truk (jpg,pdf)</label>
								</div>
								<div class="col-md-9">
									<input id="foto_kir_truck" type="file" class="form-control @error('foto_kir_truck') is-invalid @enderror" name="foto_kir_truck" value="{{ old('foto_kir_truck') }}" required autocomplete="off" autofocus>
									@error('foto_kir_truck')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>


							<!--     chassis_code -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Kode Chasis </label>
								</div>
								<div class="col-md-9">
									<select class="form-control select2 @error('trade_mark') is-invalid @enderror" style="width: 100%;" name="chassis_code" id="chassis_code" required autocomplete="off" autofocus>
										<option disabled>---Pilih Kode Chasis---</option>
										@foreach ($ms_chassis_code as $chassis_code)
										<option  value="{{$chassis_code->chassis}}">{{$chassis_code->chassis}}</option>
										@endforeach
									</select>
									@error('chassis_code')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- jenis_chassis -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis Chasis Truk </label>
								</div>
								<div class="col-md-9">
									<select id="jenis_chassis" class="form-control" name="jenis_chassis" value="{{ old('jenis_chassis') }}">
										<option disabled>-- Pilih Jenis Chasis Truk--</option>
										<option> 20 </option>
										<option> 40/45 </option>
									</select>
								</div> 
							</div> 

							<!-- chassis_weight -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Berat Chasis Truk (kg)</label>
								</div> 
								<div class="col-md-9">
									<input id="chassis_weight" type="number" class="form-control @error('chassis_weight') is-invalid @enderror" name="chassis_weight" value="{{ old('chassis_weight') }}" placeholder="wajib di isi ..." required autocomplete="off" autofocus>
									@error('chassis_weight')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div> 

							<!-- foto_chassis --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto Chasis Truk (jpg,pdf)</label>
								</div>
								<div class="col-md-9">
									<input id="foto_chassis" type="file" class="form-control @error('foto_chassis') is-invalid @enderror" name="foto_chassis" value="{{ old('foto_chassis') }}" required autocomplete="off" autofocus>
									@error('foto_chassis')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							<!-- foto_kir_chassis --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Foto KIR Chasis Truk (jpg,pdf)</label>
								</div>
								<div class="col-md-9">
									<input id="foto_kir_chassis" type="file" class="form-control @error('foto_kir_chassis') is-invalid @enderror" name="foto_kir_chassis" value="{{ old('foto_kir_chassis') }}" required autocomplete="off" autofocus>
									@error('foto_kir_chassis')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>        

							<!-- komitmen --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Komitmen</label>
								</div>
								<div class="col-md-9 custom-control custom-checkbox">
									<input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" required>
									<label class="custom-control-label" for="exampleCheck1">
										Bahwa unit trailer yang didaftarkan dalam kondisi layak jalan
									</label>
								</div>
							</div>

							<!-- komitmen --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label class="text-white"> Komitmen</label>
								</div>
								<div class="col-md-9 custom-control custom-checkbox">
									<input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck2" required>
									<label class="custom-control-label" for="exampleCheck2">
										Kesediaan untuk menjaga, merawat RFID tag yag diberikan oleh TPKS
									</label>
								</div>
							</div>


							<!-- Tombol --> 
							<div class="form-group row">
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Simpan
									</button>
									<a href="{{url('truck')}}/{{$company->id}}/{{('index')}}" class="btn btn-default btn-sm float-sm-right">
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