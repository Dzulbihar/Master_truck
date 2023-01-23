@section('heading', 'Tambah User')

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
						<h3 class="card-title"> <b>Tambah Data User</b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('master_user') }}/{{('create')}}" method="POST" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- role -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Role </label>
								</div>
								<div class="col-md-9">
									<select id="role" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}">
										<option disabled>-- Pilih --</option>
										<option> admin</option>
										<option> user </option>
									</select>
									@error('role')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- owner_name -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama Perusahaan </label>
								</div>
								<div class="col-md-9">
									<input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" placeholder="wajib di isi ..." required autocomplete="off">
									@error('owner_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- email -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Email (username) </label>
								</div>
								<div class="col-md-9">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="wajib di isi ..." required autocomplete="off">
									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- password -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Password </label>
								</div>
								<div class="col-md-9">
									<input id="password" type="password" class="form-control kata_sandi @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="wajib di isi ..." required autocomplete="off">
									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- password2 -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Ulangi Password </label>
								</div>
								<div class="col-md-9">
									<input id="password2" type="password" class="form-control kata_sandi @error('password2') is-invalid @enderror" name="password2" value="{{ old('password2') }}" placeholder="wajib di isi ..." required autocomplete="off">
									@error('password2')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- Show password -->
							<div class="form-group row">
								<div class="col-md-3">
									<label>  </label>
								</div>
								<div class="col-md-9">
									<input type="checkbox" class="form-checkbox"> Show password
								</div>
							</div>

							<!-- Tombol --> 
							<div class="form-group row">
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Simpan
									</button>
									<a href="{{url('master_user')}}" class="btn btn-default btn-sm float-sm-right">
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

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.kata_sandi').attr('type','text');
			}else{
				$('.kata_sandi').attr('type','password');
			}
		});
	});
</script>

@stop