@section('heading', 'Tambah Pelanggaran')

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
						<h3 class="card-title"> <b>Tambah Data Pelanggaran</b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{url('violation')}}/{{$driver->id}}/{{'addviolation'}}" method="POST" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- police_no -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nomor Polisi Truk </label>
								</div>
								<div class="col-md-9">
									<select name="police_no" class="form-control select2" style="width: 100%;" value="{{ old('police_no') }}">
										@foreach($truck as $ka)
										<option 
											value="{{$ka->police_no}}">
											{{$ka->police_no}}
										</option>
										@endforeach
									</select> 
								</div>
							</div>

					    <!-- jenis_pelanggaran -->
					    <div class="row mb-3">
					    	<div class="col-3">
					    		<label  class="form-label">Jenis Pelanggaran</label>
					    	</div>
					    	<div class="col-9">
					    		<select class="form-control" name="jenis_pelanggaran" id="jenis_pelanggaran">
					    			<option selected>---Pilih Jenis Pelanggaran ---</option>
					    			@foreach ($jenis_pelanggaran as $r_kab)
					    			<option  value="{{$r_kab->jenis_pelanggaran}}">{{$r_kab->jenis_pelanggaran}}</option>
					    			@endforeach
					    		</select>
					    	</div>
					    </div>

					    <!-- bentuk_pelanggaran -->
					    <div class="row mb-3">
					    	<div class="col-3">
					    		<label  class="form-label">Bentuk Pelanggaran</label>
					    	</div>
					    	<div class="col-9">
					    		<select class="form-control" name="bentuk_pelanggaran" id="bentuk_pelanggaran">
					    			<option selected>---Pilih Bentuk Pelanggaran---</option>
					    		</select>
					    	</div>
					    </div>

					    <!-- alasan -->
					    <div class="form-group row">
					    	<div class="col-md-3">
					    		<label> Alasan </label>
					    	</div>
					    	<div class="col-md-9">
					    		<textarea class="form-control" name="alasan" id="alasan" rows="3" value="{{ old('alasan') }}" required autocomplete="alasan" autofocus></textarea>
					    	</div>
					    </div>

					    <!-- kapan -->
					    <div class="form-group row">
					    	<div class="col-md-3">
					    		<label> Waktu </label>
					    	</div>
					    	<div class="col-md-9">
					    		<input  id="kapan" type="datetime-local" class="form-control" name="kapan" value="{{old('kapan')}}" placeholder="" required autocomplete="kapan" autofocus>
					    	</div>
					    </div>

					    <!-- dimana -->
					    <div class="form-group row">
					    	<div class="col-md-3">
					    		<label> Tempat </label>
					    	</div>
					    	<div class="col-md-9">
					    		<input  id="dimana" type="text" class="form-control" name="dimana" value="{{old('dimana')}}" placeholder="" required autocomplete="off" autofocus>
					    	</div>
					    </div>

					    <!-- foto -->
					    <div class="form-group row">
					    	<div class="col-md-3">
					    		<label> Foto pendukung (jpg,pdf) </label>
					    	</div>
					    	<div class="col-md-9">
					    		<input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{old('foto')}}">
					    		@error('foto')
					    		<span class="invalid-feedback" role="alert">
					    			<strong>{{ $message }}</strong>
					    		</span>
					    		@enderror
					    		<span class="text-danger">ukuran maksimal 4 mb</span>
					    	</div>
					    </div>

					    <!-- Tombol --> 
					    <div class="form-group row">
					    	<div class="col-md-12">
					    		<br>
					    		<button type="submit" class="btn btn-primary btn-sm">
					    			Simpan
					    		</button>
					    		<a href="{{url('master_driver')}}" class="btn btn-default btn-sm float-sm-right">
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#jenis_pelanggaran').change(function(){
    var kabID = $(this).val();    
    if(kabID){
      $.ajax({
       type:"GET",
        	// url:"/getMsKabupaten?kabID="+kabID,
        	// url:"{{url("")}}/getMsKabupaten?kabID="+kabID,
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