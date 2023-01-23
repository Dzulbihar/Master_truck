@section('heading', 'Edit Blokir User')

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
						<h3 class="card-title">  <b> Beri alasan kenapa Akun {{ $user->owner_name}} di blokir </b> </h3>
					</div>

					<!-- form start -->
					<form action="{{ url('master_user') }}/{{$user->id}}/{{('update_blokir')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">
							<!-- alasan_blokir -->                        
							<div class="form-group row">
								<div class="col-md-3">
									<label> Alasan Blokir </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control @error('alasan_blokir') is-invalid @enderror" name="alasan_blokir" value="{{ $user->alasan_blokir}}" required autocomplete="off" autofocus>
									@error('alasan_blokir')
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
									<a href="{{url('master_user')}}/{{$user->id}}/{{('detail')}}" class="btn btn-default btn-sm float-right">Kembali</a>
								</div>
							</div>
						</div>
					</form>

				</div>
				<!-- /.card -->

			</div>
			<!-- /.row -->
		</div>
	</div>
</section>
<!-- /.content -->



@stop