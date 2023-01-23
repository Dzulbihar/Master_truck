@section('heading', 'Edit Jenis Pelanggaran')

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
						<h3 class="card-title"> <b>Edit  Jenis Pelanggaran</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('jenis_pelanggaran') }}/{{$jenis_pelanggaran->jenis_pelanggaran}}/{{('updatejenis_pelanggaran')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- jenis_pelanggaran -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis Pelanggaran </label>
								</div>
								<div class="col-md-9">
									<input  id="jenis_pelanggaran" type="text" class="form-control" name="jenis_pelanggaran" value="{{ $jenis_pelanggaran->jenis_pelanggaran}}" placeholder="" required autocomplete="off" autofocus>
								</div>
							</div>

							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/jenis_pelanggaran')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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




@endsection