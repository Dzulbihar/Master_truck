@section('heading', 'Edit Kode Chasis')

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
						<h3 class="card-title"> <b>Edit Kode Chasis Truck</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('chasis_code') }}/{{$chasis_code->id}}/{{('updatechasis_code')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- chassis -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Kode Chasis Truck </label>
								</div>
								<div class="col-md-9">
									<input  id="chassis" type="text" class="form-control" name="chassis" value="{{ $chasis_code->chassis}}" placeholder="" required autocomplete="off" autofocus>
								</div>
							</div>

							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/chasis_code')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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