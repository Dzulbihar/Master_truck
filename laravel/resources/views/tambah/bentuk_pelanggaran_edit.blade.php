@section('heading', 'Edit Bentuk Pelanggaran')

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
						<h3 class="card-title"> <b> Edit Bentuk Pelanggaran</b> </h3>
					</div>
					
					<!-- form start -->
					<form action="{{ url('bentuk_pelanggaran') }}/{{$bentuk_pelanggaran->bentuk_pelanggaran}}/{{('updatebentuk_pelanggaran')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- bentuk_jenis --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis Pelanggaran</label>
								</div>
								<div class="col-md-9">
									<select id="bentuk_jenis" class="form-control" name="bentuk_jenis">
										<option selected> {{ $bentuk_pelanggaran->bentuk_jenis}} </option>
											<option 
											value=
											" 
											@foreach($jenis_pelanggaran as $ka)
											<option>
												{{$ka->jenis_pelanggaran}} 
											</option>
											@endforeach
											" 
											@if($bentuk_pelanggaran->bentuk_jenis == 
											' 
											@foreach($jenis_pelanggaran as $ka)
											<option>
												{{$ka->jenis_pelanggaran}}
											</option>
											@endforeach
											') 
											selected @endif>  
											@foreach($jenis_pelanggaran as $ka)
											<option>
												{{$ka->jenis_pelanggaran}}
											</option>
											@endforeach
										</option>
									</select>
								</div>
							</div>

							<!-- bentuk_pelanggaran -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Bentuk Pelanggaran </label>
								</div>
								<div class="col-md-9">
									<input  id="bentuk_pelanggaran" type="text" class="form-control" name="bentuk_pelanggaran" value="{{ $bentuk_pelanggaran->bentuk_pelanggaran}}" placeholder="" required autocomplete="off" autofocus>
								</div>
							</div>

							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/bentuk_pelanggaran')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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