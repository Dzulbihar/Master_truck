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
						<h3 class="card-title"> <b>Edit Data Driver dengan nama {{ $driver->name}}</b>  </h3>
					</div>

					<!-- form start -->
					<form action="{{url('master_driver')}}/{{$driver->id}}/{{('update_data')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<input type="hidden" class="form-control" name="id" value="{{ $driver->id}}" >

							<!-- company_id --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Id User Login </label>
								</div>
								<div class="col-md-9">
									<select id="company_id" class="form-control select2" style="width: 100%;" name="company_id">
										<option selected> {{ $driver->company_id}} </option>
										@foreach($company as $ka)
										<option>
											{{$ka->id}}
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
									<select id="owner_name" class="form-control select2" style="width: 100%;" name="owner_name">
										<option selected> {{ $driver->owner_name}} </option>
											@foreach($company as $ka)
											<option>
												{{$ka->owner_name}}
											</option>
											@endforeach
										</option>
									</select>
								</div>
							</div>

							<!-- pic_nama --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama PIC </label>
								</div>
								<div class="col-md-9">
									<select id="pic_nama" class="form-control select2" style="width: 100%;" name="pic_nama">
										<option selected> {{ $driver->pic_nama}} </option>  
											@foreach($company as $ka)
											<option>
												{{$ka->pic_nama}}
											</option>
											@endforeach
										</option>
									</select>
								</div>
							</div>

							<!-- email --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Email </label>
								</div>
								<div class="col-md-9">
									<select id="email" class="form-control select2" style="width: 100%;" name="email">
										<option selected> {{ $driver->email}} </option>  
											@foreach($company as $ka)
											<option>
												{{$ka->email}}
											</option>
											@endforeach
										</option>
									</select>
								</div>
							</div>

							<!-- name -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama </label>
								</div>
								<div class="col-md-9">
									<input  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $driver->name}}" required autocomplete="off" autofocus>
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
									<input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $driver->nik}}" required autocomplete="off" autofocus>
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
									<input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $driver->birthday}}" required autocomplete="off" autofocus>
									@error('birthday')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span> Pilih Tanggal lahir = {{$driver->birthday()}}</span>
								</div>
							</div>

							<!-- gender -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis Kelamin </label>
								</div>
								<div class="col-md-9">
									<select id="gender" class="form-control" name="gender" required>
										<option selected>-- Pilih --</option>
										<option value="Laki-laki" @if($driver->gender == 'Laki-laki') selected @endif> Laki-laki </option>
										<option value="Perempuan" @if($driver->gender == 'Perempuan') selected @endif> Perempuan </option>
									</select>
									@error('name')
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
									<input  id="addr" type="text" class="form-control @error('addr') is-invalid @enderror" name="addr" value="{{ $driver->addr}}" required autocomplete="off" autofocus>
									@error('addr')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- phone -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Phone </label>
								</div>
								<div class="col-md-9">
									<input id="phone" type="text" class="form-control" name="phone" value="{{ $driver->phone}}" autocomplete="off">
								</div>
							</div>

							<!-- fax -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Fax </label>
								</div>
								<div class="col-md-9">
									<input id="fax" type="text" class="form-control" name="fax" value="{{ $driver->fax}}" autocomplete="off">
								</div>
							</div>

							<!-- mobile -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Mobile </label>
								</div>
								<div class="col-md-9">
									<input id="mobile" type="text" class="form-control" name="mobile" value="{{ $driver->mobile}}" autocomplete="off">
								</div>
							</div>

							<!-- hp1 -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> HP 1 (WA) </label>
								</div>
								<div class="col-md-9">
									<input  id="hp1" type="text" class="form-control @error('hp1') is-invalid @enderror" name="hp1" value="{{ $driver->hp1}}" required autocomplete="off" autofocus>
									@error('hp1')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- hp2 -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> HP 2 </label>
								</div>
								<div class="col-md-9">
									<input id="hp2" type="text" class="form-control" name="hp2" value="{{ $driver->hp2}}" autocomplete="off">
								</div>
							</div>

							<!-- drive_license -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor SIM </label>
								</div>
								<div class="col-md-9">
									<input id="drive_license" type="text" class="form-control @error('drive_license') is-invalid @enderror" name="drive_license" value="{{ $driver->drive_license}}" autocomplete="off">
									@error('drive_license')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- valid_date -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Tanggal berlaku SIM </label>
								</div>
								<div class="col-md-9">
									<input id="valid_date" type="date" class="form-control @error('valid_date') is-invalid @enderror" name="valid_date" value="{{ $driver->valid_date}}"  required autocomplete="off" autofocus>
									@error('valid_date')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span> Pilih Tanggal berlaku SIM = {{$driver->valid_date()}}</span>
								</div>
							</div>

							<!-- display_cust -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Display Cust </label>
								</div>
								<div class="col-md-9">
									<select id="display_cust" class="form-control" name="display_cust">
										<option selected>-- Pilih --</option>
										<option value="Y" @if($driver->display_cust == 'Y') selected @endif> Y </option>
										<option value="N" @if($driver->display_cust == 'N') selected @endif> N </option>
									</select>
								</div>
							</div>

							<!-- done -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Done </label>
								</div>
								<div class="col-md-9">
									<select id="done" class="form-control" name="done">
										<option selected>-- Pilih --</option>
										<option value="Y" @if($driver->done == 'Y') selected @endif> Y </option>
										<option value="N" @if($driver->done == 'N') selected @endif> N </option>
									</select>
								</div>
							</div>

							<!-- remaks -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Keterangan </label>
								</div>
								<div class="col-md-9">
									<input id="remaks" type="text" class="form-control" name="remaks" value="{{ $driver->remaks}}" autocomplete="off">
								</div>
							</div> 

							<!-- tombol --> 
							<div class="form-group row">   
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm" name="hasil">
										Perbarui
									</button>
									<a href="{{url('/master_driver')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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