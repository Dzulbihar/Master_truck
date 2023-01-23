@section('heading', 'Edit Truck')

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
						<h3 class="card-title"> <b>Edit Data Truck dengan Nomor Polisi {{ $truck->police_no}}</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('master_truck') }}/{{$truck->id}}/{{('update_data')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<input type="hidden" class="form-control" name="id" value="{{ $truck->id}}" >

							<!-- company_id --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Id User Login </label>
								</div>
								<div class="col-md-9">
									<select class="form-control select2" style="width: 100%;" name="company_id">
										<option selected> {{ $truck->company_id}} </option>
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
									<select class="form-control select2" style="width: 100%;" name="owner_name">
										<option selected> {{ $truck->owner_name}} </option>
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
									<select class="form-control select2" style="width: 100%;" name="pic_nama">
										<option selected> {{ $truck->pic_nama}} </option>  
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
									<select class="form-control select2" style="width: 100%;" name="email">
										<option selected> {{ $truck->email}} </option>  
											@foreach($company as $ka)
											<option>
												{{$ka->email}}
											</option>
											@endforeach
										</option>
									</select>
								</div>
							</div>

							<!-- police_no -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor Polisi </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control @error('police_no') is-invalid @enderror" name="police_no" value="{{ $truck->police_no}}" required autocomplete="off">
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
									<input  type="text" class="form-control @error('stnk_no') is-invalid @enderror" name="stnk_no" value="{{ $truck->stnk_no}}"  required autocomplete="off">
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
									<input type="text" class="form-control  @error('stnk_no') is-invalid @enderror" name="machine_no" value="{{ $truck->machine_no}}" required autocomplete="off">
									@error('stnk_no')
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
									<input type="text" class="form-control  @error('stnk_no') is-invalid @enderror" name="design_no" value="{{ $truck->design_no}}" required autocomplete="off">
									@error('stnk_no')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- expired_lisence -->               
							<div class="form-group row">
								<div class="col-md-3">
									<label> Tanggal berlaku STNK </label>
								</div>
								<div class="col-md-9">
									<input type="date" class="form-control" name="expired_lisence" value="{{$truck->expired_lisence}}" required>
									<span> Isi Tanggal berlaku STNK = {{$truck->get_expired_lisence()}} </span>
								</div>
							</div>

							<!-- trade_mark --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Merk </label>
								</div>
								<div class="col-md-9">
									<select class="form-control select2" style="width: 100%;" name="trade_mark">
										<option selected> {{ $truck->trade_mark}} </option>  
											@foreach($merk_truck as $ka)
											<option>
												{{$ka->kode_item}}
											</option>
											@endforeach
										</option>
									</select>
								</div>
							</div>

							<!-- year_made --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Tahun </label>
								</div>
								<div class="col-md-9">
									<input type="number" class="form-control @error('year_made') is-invalid @enderror" name="year_made" value="{{ $truck->year_made}}"  required autocomplete="off">
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
									<select class="form-control select2" style="width: 100%;" name="state">
										<option selected> {{ $truck->state}} </option> 
											@foreach($state_truck as $ka)
											<option>
												{{$ka->kota}}
											</option>
											@endforeach
										</option>
									</select>
								</div>
							</div>

							<!-- truck_weight -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Berat Head Truck (kg)</label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control @error('truck_weight') is-invalid @enderror" name="truck_weight" value="{{ $truck->truck_weight}}"  required autocomplete="off">
									@error('truck_weight')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- chassis_code --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Kode Chasis </label>
								</div>
								<div class="col-md-9">
									<select class="form-control select2" style="width: 100%;" name="chassis_code">
										<option selected> {{ $truck->chassis_code}} </option> 
											@foreach($ms_chassis_code as $ka)
											<option>
												{{$ka->chassis}}
											</option>
											@endforeach
										</option>
									</select>
								</div>
							</div>

							<!-- jenis_chassis -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis Chasis Truk </label>
								</div>
								<div class="col-md-9">
									<select class="form-control" name="jenis_chassis">
										<option selected>-- Pilih --</option>
										<option value="20" @if($truck->jenis_chassis == '20') selected @endif> 20 </option>
										<option value="40/45" @if($truck->jenis_chassis == '40/45') selected @endif> 40/45 </option>
									</select>
								</div>
							</div>

							<!-- chassis_weight -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Berat Chasis Truck (kg)</label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control @error('chassis_weight') is-invalid @enderror" name="chassis_weight" value="{{ $truck->chassis_weight}}"  required autocomplete="off">
									@error('chassis_weight')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							
							<!-- gate_no --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor Gerbang </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="gate_no" value="{{ $truck->gate_no}}" autocomplete="off">
								</div>
							</div>			

							<!-- bbg_yn -->
							<div class="form-group row">
								<div class="col-md-3">
									<label>Bahan Bakar Gas? </label>
								</div>
								<div class="col-md-9">
									<select class="form-control" name="bbg_yn">
										<option disabled>-- Select --</option>
										<option value="Y" @if($truck->bbg_yn == 'Y') selected @endif> Y </option>
										<option value="N" @if($truck->bbg_yn == 'N') selected @endif> N </option>
									</select>
								</div>
							</div>

							<!-- otl_yn --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Truck Internal?</label>
								</div>
								<div class="col-md-9">
									<select class="form-control"  name="otl_yn">
										<option disabled>-- Select --</option>
										<option value="Y" @if($truck->otl_yn == 'Y') selected @endif> Y </option>
										<option value="N" @if($truck->otl_yn == 'N') selected @endif> N </option>
									</select>
								</div>
							</div>

							@if(auth()->user()->role == 'admin')
							<!-- id_rfid -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> RFID </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control @error('id_rfid') is-invalid @enderror" name="id_rfid" value="{{ $truck->id_rfid}}"  required autocomplete="off">
									@error('id_rfid')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							@endif

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