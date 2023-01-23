@section('heading', 'Edit Merk')

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
						<h3 class="card-title"> <b>Edit Merk</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('merk') }}/{{$merk->id}}/{{('updatemerk')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- kode_item -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Kode Item </label>
								</div>
								<div class="col-md-9">
									<input  id="kode_item" type="text" class="form-control" name="kode_item" value="{{ $merk->kode_item}}" placeholder="" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- keterangan -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Keterangan </label>
								</div>
								<div class="col-md-9">
									<input  id="keterangan" type="text" class="form-control" name="keterangan" value="{{ $merk->keterangan}}" placeholder="">
								</div>
							</div>

							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/merk')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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