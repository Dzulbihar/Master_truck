<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> ID Card Driver - Master Truck </title>
    <link rel="shortcut icon" href="{{asset('logo/logo_tpks.png')}}">
</head>

<style>

    .body {
    font-family: Times New Roman;
    /*    background-color: rgba(255,0,0,0.3);*/
    }

    .header img{
        width: 100%;
    /*        opacity: .3;*/
        position: absolute;
        top: -10%;
    /*        left: 1%;*/
    }

    .foto img {

        display: block;
    margin-left: auto;
      margin-right: auto;
      width: 80%;
    /*      height: auto;*/
      border-radius: 8px;
    /*        opacity: .3;*/
        position: absolute;
    /*        top: 10%;*/
    /*        left: 1%;*/
    }

  div.polaroid {
    display: block;
    margin-left: auto;
    margin-right: auto;
      width: 70%;
      background-color: white;
      margin-bottom: -10px;
  }

  div.kontak {
    margin-bottom: -50px;
    margin-top: -10px;
      text-align: center;
  /*  padding: 10px 10px;*/
  }

  div.rfid {
    margin-bottom: -30px;
    margin-top: -20px;
      text-align: center;
  /*  padding: 10px 10px;*/
  }

</style>

<header class="header">
  <div class="kop">
    <img src="{{asset('logo/logo_asli.jpeg')}}" width="">
    <br><br>
    </div>
</header>

<body>
<!--  <div class="foto">
    <img src="{{asset('cetak/dzul.JPG')}}" width="">
  </div> -->
  <div class="polaroid">
    <br>
    <div class="rfid"> <h3> RFID Driver </h3>  </div> <hr>
    <img src="{{$driver->get_file_foto()}}" alt="rfid" style="width:100%">
  </div>
  <div class="kontak">
    <p> 
      {{$driver->owner_name}} 
      <br> 
       @if ($driver->status == 'Proses Pengajuan')
        Belum Disetujui
       @elseif ($driver->status == 'Sudah Disetujui')
        {{$driver->drive_license}}
       @else ($driver->status == 'Diblokir')
        Diblokir
       @endif
    </p>
  </div>

</body>
</html>



