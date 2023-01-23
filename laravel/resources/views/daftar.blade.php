<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register - Master Truck </title>
    <link rel="shortcut icon" href="{{asset('logo/logo_tpks.png')}}">
    <style type="text/css">
		body {
		    padding: 0;
		    margin: 0;
		    background-image: url("{{asset('logo/truk.jpg')}}");
		    background-size: cover;
		    font-family: 'Montserrat', sans-serif;
		}

		.overlay {
		    position: absolute;
		    top: 0;
		    width: 100%;
		    height: 100%;
		    background-color: rgba(0, 0, 0, 0.5);
		}

		.box {
		    position: absolute;
		    width: 400px;
		    background-color: white;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    border-radius: 15px;
		    box-shadow: 0 10px 10px 10px rgb(0, 0, 0, .2);
		}

		.header {
		    /*background-image: url("{{asset('logo/truk.jpg')}}");*/
		    background-color: rgba(55, 10, 114, 1);
		    background-size: cover;
		    padding: 0px 0px;
		    color: white;
		    border-radius: 15px 15px 0 0;
		}

		.header p {
		    font-size: x-small;
		}

		.login-area {
		    text-align: center;
		    padding: 50px 50px 30px 50px;
		}

		.username,
		.kata_sandi,
		.password {
		    width: 100%;
		    text-align: center;
		    padding: 13px 0;
		    border-radius: 20px;
		    outline: none;
		    border: none;
		    color: white;
		    background-color: rgba(55, 10, 114, .5);
		    margin-bottom: 15px;
		    transition: ,5s;
		}

		.username::placeholder,
		.kata_sandi::placeholder,
		.password::placeholder {
		    color: rgba(255, 255, 255, .7);
		}

		.username:focus,
		.kata_sandi:focus,
		.password:focus {
		    background-color: rgba(55, 10, 114, .7);
		}

		.submit {
		    width: 150px;
		    padding: 10px;
		    background-color: rgba(55, 10, 114, 1);
		    border-radius: 10px;
		    font-weight: bold;
		    color: white;
		    border: none;
		    outline: none;
		    margin: 10px;
		    transition: .2s;
		    cursor: pointer;
		}

		.submit:hover {
		    background-color: #1f0344;
		}

		a {
		    display: block;
		    font-size: x-small;
		    text-decoration: none;
		    color: rgba(55, 10, 114, 1);
		    margin-top: 10px;
		}
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
</head>
<body>
   <div class="overlay"></div>
   <form action="{{url('/simpandaftar')}}" method="post" class="box">
   	{{csrf_field()}}
       <div class="header">
           <h2 align="center"> 
           	Register <br>
           	Trucking Managemen System
           </h2>
       </div>
       <div class="login-area">
		<!-- owner_name --> 
            <input name="owner_name" type="text" class="username  @error('owner_name') is-invalid @enderror" placeholder="Nama Perusahaan" value="{{ old('owner_name') }}" required autocomplete="off">
            @error('owner_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
		<!-- addr_company --> 
            <input name="addr_company" type="text" class="username  @error('addr_company') is-invalid @enderror" placeholder="Alamat Perusahaan" value="{{ old('addr_company') }}" required autocomplete="off">
            @error('addr_company')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        <!-- pic_nama --> 
            <input name="pic_nama" type="text" class="username  @error('pic_nama') is-invalid @enderror" placeholder="Nama PIC (sebagai penanggung jawab)" value="{{ old('pic_nama') }}" required autocomplete="off">
            @error('pic_nama')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        <!-- pic_contact --> 
            <input name="pic_contact" type="number" class="username  @error('pic_contact') is-invalid @enderror" placeholder="Nomor Seluler PIC (WA)" value="{{ old('pic_contact') }}" required autocomplete="off">
            @error('pic_contact')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        <!-- email --> 
            <input name="email" type="email" class="username  @error('email') is-invalid @enderror" placeholder="Email PIC (Username)" value="{{ old('email') }}" required autocomplete="off">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        <!-- password --> 
            <input name="password" type="password" class="kata_sandi @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}" required autocomplete="off">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        <!-- password2 --> 
            <input name="password2" type="password" class="kata_sandi  @error('password2') is-invalid @enderror" placeholder="Ulangi Password" value="{{ old('password2') }}" required autocomplete="off">
            @error('password2')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="checkbox" class="form-checkbox"> Show password
	       	@if(session('sukses'))
	       	<div class="alert alert-danger" role="alert">
	       		{{session('sukses')}}
	       	</div>
	       	@endif
       	<input type="submit" value="Register" class="submit">
       	<a href="{{url('/login')}}"> Sudah punya akun </a>
       </div>
   </form> 

</body>

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.kata_sandi').attr('type','text');
			}else{
				$('.kata_sandi').attr('type','password');
			}
		});
	});
</script>

<!-- CDN sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>    
  @if (Session::has('success'))
    swal("Berhasil!", "{{Session::get('success')}}", "success");
  @endif
</script>    
<script>    
  @if (Session::has('warning'))
    swal("Gagal!", "{{Session::get('warning')}}", "warning");
  @endif
</script>

</html>
