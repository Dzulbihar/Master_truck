<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reset Password - Master Truck </title>
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
            background-image: url("{{asset('logo/truk.jpg')}}");
            background-size: cover;
            padding: 90px 30px;
            color: black;
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
        .password::placeholder {
            color: rgba(255, 255, 255, .7);
        }

        .username:focus,
        .password:focus {
            background-color: rgba(55, 10, 114, .7);
        }

        .submit {
            width: 200px;
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
   <form action="{{ route('password.update') }}" method="post" class="box">
    @csrf
       <div class="header">

       </div>
           <h2 align="center">              
            <b>Reset Password</b><hr>
           </h2>
       <div class="login-area">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
            <input type="hidden" name="token" value="{{ $token }}">

            <input id="email" type="email" class="username @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="password" type="password" class="password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="password-confirm" type="password" class="password" name="password_confirmation" required autocomplete="new-password" placeholder="Password confirmation">

            <input type="checkbox" class="form-checkbox"> Show password

           <input type="submit" value="Reset Password" class="submit">
       </div>
   </form> 
</body>

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){       
        $('.form-checkbox').click(function(){
            if($(this).is(':checked')){
                $('.password').attr('type','text');
            }else{
                $('.password').attr('type','password');
            }
        });
    });
</script>

</html>