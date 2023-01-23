@section('heading', 'Edit User')

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
						<h3 class="card-title"> <b>Edit Data {{ $user->owner_name}}</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('master_user') }}/{{$user->id}}/{{('update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

						<!-- email -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Email </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control"  value="{{$user->email}}" disabled>
								</div>
							</div>

							<!-- role -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Role </label>
								</div>
								<div class="col-md-9">
									<select id="role" class="form-control" name="role" required>
										<option selected>-- Pilih --</option>
										<option value="admin" @if($user->role == 'admin') selected @endif> admin </option>
										<option value="user" @if($user->role == 'user') selected @endif> user </option>
									</select>
								</div>
							</div>

							<!-- status -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Status </label>
								</div>
								<div class="col-md-9">
									<select id="status" class="form-control" name="status" required>
										<option selected>-- Pilih --</option>
										<option value="Aktif" @if($user->status == 'Aktif') selected @endif> Aktif </option>
										<option value="Tidak Aktif" @if($user->status == 'Tidak Aktif') selected @endif> Tidak Aktif </option>
									</select>
								</div>
							</div>

							<!-- owner_name -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama Perusahaan </label>
								</div>
								<div class="col-md-9">
									<input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ $user->owner_name}}" required autocomplete="off">
									@error('owner_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- tombol --> 
							<div class="form-group row">   
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('master_user')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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