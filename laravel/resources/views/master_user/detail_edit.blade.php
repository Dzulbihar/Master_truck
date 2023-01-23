@section('heading', 'Edit Profil')

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
						<h3 class="card-title"> <b>Edit Profil Perusahaan</b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('master_user') }}/{{$company->id}}/{{('detail_update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- owner_name -->
							<div class="form-group row">
								<div class="col-md-12">
									<label> Nama Perusahaan </label>
									<input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ $company->owner_name}}"  required autocomplete="off" autofocus>
									@error('owner_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- contact -->
							<div class="form-group row">
								<div class="col-md-12">
									<label> Nomor Seluler (WA) </label>
									<input id="contact" type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $company->contact}}"  required autocomplete="off" autofocus>
									@error('contact')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- addr_company -->
							<div class="form-group row">
								<div class="col-md-12">
									<label> Alamat Perusahaan </label>
									<input id="addr_company" type="text" class="form-control @error('addr_company') is-invalid @enderror" name="addr_company" value="{{ $company->addr_company}}"  required autocomplete="off" autofocus>
									@error('addr_company')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- nib_company -->
							<div class="form-group row">
								<div class="col-md-12">
									<label> NIB Perusahaan </label>
									<input id="nib_company" type="number" class="form-control @error('nib_company') is-invalid @enderror" name="nib_company" value="{{ $company->nib_company}}"  required autocomplete="off" autofocus>
									@error('nib_company')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- file_nib_company -->
							<div class="form-group row">
								<div class="col-md-10">
									<label> Upload NIB Perusahaan </label>
									<input id="file_nib_company" type="file" class="form-control @error('file_nib_company') is-invalid @enderror" name="file_nib_company" value="{{ $company->file_nib_company}}">
									@error('file_nib_company')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-info"> upload format pdf,jpg | ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$company->getfile_nib_company()}}" width="100%"></embed>
								</div>
							</div>

							<!-- npwp_company -->
							<div class="form-group row">
								<div class="col-md-12">
									<label> NPWP Perusahaan </label>
									<div class="input-group">
										<input type="text" name="npwp_company" id="npwp_company" class="form-control @error('npwp_company') is-invalid @enderror" 
										data-inputmask="'mask': ['99.999.999.9-999.999']" data-mask value="{{ $company->npwp_company}}" required autocomplete="off" autofocus>
									</div>
									@error('npwp_company')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- file_npwp_company -->
							<div class="form-group row">
								<div class="col-md-10">
									<label> Upload NPWP Perusahaan </label>
									<input id="file_npwp_company" type="file" class="form-control @error('file_npwp_company') is-invalid @enderror" name="file_npwp_company" value="{{ $company->file_npwp_company}}">
									@error('file_npwp_company')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-info"> upload format pdf,jpg | ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$company->getfile_npwp_company()}}" width="100%"></embed>
								</div>
							</div>

							<!-- pmku_company -->
							<div class="form-group row">
								<div class="col-md-12">
									<label> PMKU Perusahaan </label>
									<input id="pmku_company" type="text" class="form-control @error('pmku_company') is-invalid @enderror" name="pmku_company" value="{{ $company->pmku_company}}"  required autocomplete="off" autofocus>
									@error('pmku_company')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- file_pmku_company -->
							<div class="form-group row">
								<div class="col-md-10">
									<label> Upload PKMU Pernyataan </label>
									<input id="file_pmku_company" type="file" class="form-control @error('file_pmku_company') is-invalid @enderror" name="file_pmku_company" value="{{ $company->file_pmku_company}}">
									@error('file_pmku_company')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-info"> upload format pdf,jpg | ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$company->getfile_pmku_company()}}" width="100%"></embed>
								</div>
							</div>

							<!-- pic_nama -->
							<div class="form-group row">
								<div class="col-md-12">
									<label> Nama PIC </label>
									<input id="pic_nama" type="text" class="form-control @error('pic_nama') is-invalid @enderror" name="pic_nama" value="{{ $company->pic_nama}}"  required autocomplete="off" autofocus>
									@error('pic_nama')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- pic_contact -->
							<div class="form-group row">
								<div class="col-md-12">
									<label> Nomor Seluler PIC (WA) </label>
									<input id="pic_contact" type="number" class="form-control @error('pic_contact') is-invalid @enderror" name="pic_contact" value="{{ $company->pic_contact}}"  required autocomplete="off" autofocus>
									@error('pic_contact')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- statement_form -->
							<div class="form-group row">
								<div class="col-md-10">
									<label> Upload Form Pernyataan </label>
									<input id="statement_form" type="file" class="form-control @error('statement_form') is-invalid @enderror" name="statement_form" value="{{ $company->statement_form}}">
									@error('statement_form')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-info"> upload format pdf,jpg | ukuran maksimal 4 mb</span><br>
									<a href="{{url('/tamplate/?file=Formulir Pernyataan.docx')}}">
						              Download Template Form Pernyataan disini
						            </a>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$company->getstatement_form()}}" width="100%"></embed>
								</div>
							</div>

				            <div class="form-group row">
				            	<!-- tombol -->    
				            	<div class="col-md-12">
				            		<br>
				            		<button type="submit" class="btn btn-primary btn-sm" name="hasil">
				            			Perbarui
				            		</button>
				            		<a href="{{url('/master_user')}}/{{$company->id}}/{{('detail')}}" class="btn btn-default btn-sm float-right">Kembali</a>
				            	</div>
				            </div>


				        </form>
				    </div>

				</div>
			</div>
			<!-- /.card -->

		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->



@stop




@section('footer')
<!-- ____________________ NPWP ______________________ -->
<!-- InputMask -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

<!-- Page specific script -->
<script>
	$(function () {
    //Money Euro
    $('[data-mask]').inputmask()
})
</script>
@stop


