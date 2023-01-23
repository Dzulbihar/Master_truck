<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> ID Card Truck - Master Truck </title>
  <link rel="shortcut icon" href="{{asset('logo/logo_tpks.png')}}">
  <style>
    .container {
      position: relative;
    }

    .bottomright {
      position: absolute;
      bottom: 8px;
      right: 16px;
      font-size: 18px;
    }

    img { 
      width: 100%;
      height: auto;
      opacity: 0.3;
    }
  </style>
</head>
<body>

  <div class="container">
    <img src="{{asset('logo/logo_asli.jpeg')}}" alt="RFID Truck" width="1000" height="300">
    <div class="bottomright">
     {{$truck->owner_name}} 
     <br> 
     @if ($truck->status == 'Proses Pengajuan')
      Belum Disetujui
     @elseif ($truck->status == 'Sudah Disetujui')
      {{$truck->id_rfid}}
     @else ($truck->status == 'Diblokir')
      Diblokir
     @endif
   </div>
 </div>

</body>
</html>


