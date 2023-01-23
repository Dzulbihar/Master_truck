@section('heading', 'Edit Notifikasi Email')

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
						<h3 class="card-title"> <b>Edit Email Admin</b> </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('email') }}/{{$email->id}}/{{('update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- alamat_email_admin -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Email Admin </label>
								</div>
								<div class="col-md-9">
									<textarea name="alamat_email_admin"  rows="4" cols="50" required>
									{{ $email->alamat_email_admin}}
									</textarea>
								</div>
							</div>

							<!-- nama_pengirim_admin -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama Admin  </label>
								</div>
								<div class="col-md-9">
									<textarea name="nama_pengirim_admin"  rows="4" cols="50" required>
									{{ $email->nama_pengirim_admin}}
									</textarea>
								</div>
							</div>

							<!-- tombol --> 
							<div class="form-group row">
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/email')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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