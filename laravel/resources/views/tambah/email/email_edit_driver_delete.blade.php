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
						<h3 class="card-title"> <b>Edit Notifikasi Email untuk Delete Driver</b> </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('email') }}/{{$email->id}}/{{('update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- subjek_driver_delete -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Subjek </label>
								</div>
								<div class="col-md-9">
									<textarea name="subjek_driver_delete"  rows="4" cols="50" required>
									{{ $email->subjek_driver_delete}}
									</textarea>
								</div>
							</div>

							<!-- header_driver_delete -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Header </label>
								</div>
								<div class="col-md-9">
									<textarea name="header_driver_delete"  rows="4" cols="50" required>
									{{ $email->header_driver_delete}}
									</textarea>
								</div>
							</div>

							<!-- body_1_driver_delete -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Body (paragraf 1)  </label>
								</div>
								<div class="col-md-9">
									<textarea name="body_1_driver_delete"  rows="4" cols="50" required>
									{{ $email->body_1_driver_delete}}
									</textarea>
								</div>
							</div>

							<!-- body_2_driver_delete -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Body (paragraf 2) </label>
								</div>
								<div class="col-md-9">
									<textarea name="body_2_driver_delete"  rows="4" cols="50" required>
									{{ $email->body_2_driver_delete}}
									</textarea>
								</div>
							</div>

							<!-- footer_driver_delete -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Footer </label>
								</div>
								<div class="col-md-9">
									<textarea name="footer_driver_delete"  rows="4" cols="50" required>
									{{ $email->footer_driver_delete}}
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