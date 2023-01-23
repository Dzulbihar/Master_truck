<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title> Cetak Data Truck - Master Truck </title>
  <link rel="shortcut icon" href="{{asset('logo/logo_tpks.png')}}">
  <style type="text/css">
    <!--
    .style1 {color: #FFFFFF}
    -->
  </style>
</head>

<body>
  <p><img src="{{asset('logo/logo_asli.jpeg')}}" alt="Data Truck" width="100%"  /></p>
  <hr><hr>

  <table width="100%" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td> Nama Perusahaan &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->owner_name}} &nbsp;</td>
    </tr>
    <tr>
      <td> Nama PIC &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->pic_nama}} &nbsp;</td>
    </tr>
    <tr>
      <td> Email &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->email}} &nbsp;</td>
    </tr>
    <tr>
      <td> Site Id &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->site_id}} &nbsp;</td>
    </tr>

    <tr>
      <td> Nomor Polisi &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->police_no}} &nbsp;</td>
    </tr>
    <tr>
      <td> Kode Truck &nbsp; </td>
      <td>  : </td>
      <td> 
        <?php
        $kalimat = "$truck->police_no";
        $sub_kalimat = substr($kalimat,-5);
        echo $sub_kalimat;
        ?> 
      </td>
    </tr>
    <tr>
      <td> Nomor STNK &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->stnk_no}} &nbsp;</td>
    </tr>
    <tr>
      <td> Nomor Mesin &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->machine_no}} &nbsp;</td>
    </tr>
    <tr>
      <td> Nomor Rangka &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->design_no}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tanggal berlaku STNK &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->get_expired_lisence()}} &nbsp;</td>
      <!-- <td> {{ date('d F Y', strtotime($truck->expired_lisence)) }} &nbsp;</td> -->
    </tr>

    <tr>
      <td> Merk &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->trade_mark}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tahun &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->year_made}} &nbsp;</td>
    </tr>
    <tr>
      <td> Kota &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->state}} &nbsp;</td>
    </tr>

    <tr>
      <td> Berat Head Truck &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->truck_weight}}&nbsp;kg</td>
    </tr>
    <tr>
      <td> Kode Chasis Truck &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->chassis_code}} &nbsp;</td>
    </tr>
    <tr>
      <td> Jenis Chasis Truck &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->jenis_chassis}} &nbsp;</td>
    </tr>
    <tr>
      <td> Berat Chasis Truck &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->chassis_weight}}&nbsp;kg</td>
    </tr>
    <tr>
      <td> Total Berat Truck &nbsp; </td>
      <td>  : </td>
      <td>
        <?php
        $berat_truck = "$truck->truck_weight";
        $kode_parameter_chasis = "$truck->chassis_weight";
        $total_berat = $berat_truck+$kode_parameter_chasis;
        echo $total_berat;
        echo '&nbsp;kg';
        ?>
      </td>
    </tr>

    <tr>
      <td> Nomor Gerbang &nbsp; </td>
      <td>  : </td>
      @empty ($truck->gate_no)
      <td>  - </td>
      @else
      <td>  {{$truck->gate_no}} </td>
      @endempty
    </tr>
    <tr>
      <td> Bahan Bakar Gas ? &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->bbg_yn}} &nbsp;</td>
    </tr>
    <tr>
      <td> Truck Internal ? &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->otl_yn}} &nbsp;</td>
    </tr>
    <tr>
      <td> RFID &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->id_rfid}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tanggal Pengajuan &nbsp; </td>
      <td>  : </td>
      <td> {{$truck->get_tanggal_pengajuan()}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tanggal Disetujui &nbsp; </td>
      <td>  : </td>
      @empty ($truck->tanggal_setujui)
      <td>  Belum disetujui </td>
      @else
      <td>  {{$truck->get_tanggal_setujui()}} </td>
      @endempty
    </tr>
    <tr>
      <td> Disetujui Oleh &nbsp; </td>
      <td>  : </td>
      @empty ($truck->nama_setujui)
      <td>  Belum disetujui </td>
      @else
      <td>  {{$truck->nama_setujui}} </td>
      @endempty
    </tr>
  </table>

  <hr><hr>
  <br><br>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><span class="style1">TanggalTanggalTanggalTanggalTanggal</span></td>
      <td>Dikeluarkan di</td>
      <td> : </td>
      <td>Semarang</td>
    </tr>
    <tr>
      <td><span class="style1">TanggalTanggalTanggalTanggalTanggal</span></td>
      <td>Tanggal</td>
      <td> : </td>
      <td> {{$truck->tanggal}} </td>
    </tr>
  </table>



</body>
</html>
