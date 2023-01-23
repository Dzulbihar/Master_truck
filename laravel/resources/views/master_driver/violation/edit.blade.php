@section('heading', 'Edit Pelanggaran')

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
						<h3 class="card-title"> <b>Edit Data Pelanggaran Sopir {{$driver->name}}</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{url('violation')}}/{{$driver->id}}/{{$violation->id}}/{{('update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<input type="hidden" name="id" value="{{ $violation->id}}">

							<!-- police_no --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor Polisi Truk </label>
								</div>
								<div class="col-md-9">
									<select class="form-control select2" style="width: 100%;" name="police_no">
										<option selected> {{ $violation->police_no}} </option>
										@foreach($truck as $ka)
										<option>
											{{$ka->police_no}}
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- jenis_pelanggaran --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis Pelanggaran </label>
								</div>
								<div class="col-md-9">
									<select id="jenis_pelanggaran" class="form-control" name="jenis_pelanggaran">
										<option selected> {{ $violation->jenis_pelanggaran}} </option>
										@foreach($jenis_pelanggaran as $ka)
										<option>
											{{$ka->jenis_pelanggaran}}
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- bentuk_pelanggaran -->
							<div class="form-group row">
								<div class="col-md-3">
									<label>Bentuk Pelanggaran</label>
								</div>
								<div class="col-md-9">
									<select class="form-control" name="bentuk_pelanggaran" id="bentuk_pelanggaran">
										<option selected> {{ $violation->bentuk_pelanggaran}} </option>
									</select>
								</div>
							</div>

				      <!-- alasan -->                        
				      <div class="form-group row">
				      	<div class="col-md-3">
				      		<label> Alasan </label>
				      	</div>
				      	<div class="col-md-9">
				      		<input id="alasan" type="text" class="form-control" name="alasan" value="{{ $violation->alasan}}" required autocomplete="off" autofocus>
				      	</div>
				      </div>

				      <!-- kapan -->                        
				      <div class="form-group row">
				      	<div class="col-md-3">
				      		<label> Waktu </label>
				      	</div>
				      	<div class="col-md-9">
				      		<input id="kapan" type="datetime-local" class="form-control" name="kapan" value="{{ $violation->kapan}}" required autocomplete="off" autofocus>
				      	</div>
				      </div>

				      <!-- dimana -->                        
				      <div class="form-group row">
				      	<div class="col-md-3">
				      		<label> Tempat </label>
				      	</div>
				      	<div class="col-md-9">
				      		<input id="dimana" type="text" class="form-control" name="dimana" value="{{ $violation->dimana}}" required autocomplete="off" autofocus>
				      	</div>
				      </div>

				      <!-- foto -->                        
				      <div class="form-group row">
				      	<div class="col-md-3">
				      		<label> Foto pendukung </label>
				      	</div>
				      	<div class="col-md-7">
				      		<input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{$violation->foto}}">
				      		@error('foto')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{ $message }}</strong>
				      		</span>
				      		@enderror
				      	</div>
				      	<div class="col-md-2">
				      		<embed type="application/pdf" src="{{$violation->getFoto()}}" width="100%"></embed>
				      	</div>
				      </div>

				      <!-- tombol --> 
				      <div class="form-group row">   
				      	<div class="col-md-12">
				      		<br>
				      		<button type="submit" class="btn btn-primary btn-sm">
				      			Perbarui
				      		</button>
				      		<a href="{{url('violation')}}/{{$driver->id}}/{{('index')}}" class="btn btn-default btn-sm float-right">Kembali</a>
				      	</div>
				      </div>

				    </div>
				  </form>
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	$('#jenis_pelanggaran').change(function(){
		var kabID = $(this).val();    
		if(kabID){
			$.ajax({
				type:"GET",
               // url:"{{url('getPelanggaranBentuk')}}?kabID="+kabID,
               url:"{{url("")}}/getPelanggaranBentuk?kabID="+kabID,
               dataType: 'JSON',
               success:function(res){               
               	if(res){
               		$("#bentuk_pelanggaran").empty();
               		$("#bentuk_pelanggaran").append('<option>---Pilih Bentuk Pelanggaran---</option>');
               		$.each(res,function(nama,kode){
               			$("#bentuk_pelanggaran").append('<option value="'+kode+'">'+kode+'</option>');
               		});
               	}else{
               		$("#bentuk_pelanggaran").empty();
               	}
               }
             });
		}else{
			$("#bentuk_pelanggaran").empty();
		}      
	});
</script>


	@stop