<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title> Cetak Data Driver - Master Truck </title>
  <link rel="shortcut icon" href="{{asset('logo/logo_tpks.png')}}">
  <style type="text/css">
    <!--
    .style1 {color: #FFFFFF}
  -->
</style>
</head>

<body>
  <p><img src="{{asset('logo/logo_asli.jpeg')}}" width="100%"  /></p>
  <hr><hr>

  <table width="100%" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td> Nama Perusahaan &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->owner_name}} &nbsp;</td>
    </tr>
    <tr>
      <td> Nama PIC &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->pic_nama}} &nbsp;</td>
    </tr>
    <tr>
      <td> Email &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->email}} &nbsp;</td>
    </tr>  
    <tr>
      <td> Site Id &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->site_id}} &nbsp;</td>
    </tr>
    <tr>
      <td> Nama &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->name}} &nbsp;</td>
    </tr>
    <tr>
      <td> NIK &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->nik}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tanggal lahir &nbsp; </td>
      <td>  : </td>
      @empty ($driver->birthday)
      <td> - </td>
      @else
      <td>  {{$driver->birthday()}} </td>
      @endempty
    </tr>
    <tr>
      <td> Jenis kelamin &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->gender}} &nbsp;</td>
    </tr>
    <tr>
      <td> Alamat &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->addr}} &nbsp;</td>
    </tr>
    <tr>
      <td> Phone &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->phone}} &nbsp;</td>
    </tr>
    <tr>
      <td> Fax &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->fax}} &nbsp;</td>
    </tr>
    <tr>
      <td> Mobile &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->mobile}} &nbsp;</td>
    </tr>
    <tr>
      <td> HP 1 &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->hp1}} &nbsp;</td>
    </tr>
    <tr>
      <td> HP 2 &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->hp2}} &nbsp;</td>
    </tr>
    <tr>
      <td> Nomor SIM &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->drive_license}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tanggal berlaku SIM &nbsp; </td>
      <td>  : </td>
      @empty ($driver->valid_date)
      <td>  - </td>
      @else
      <td>  {{$driver->valid_date()}} </td>
      @endempty
    </tr>
    <tr>
      <td> Display Cust &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->display_cust}} &nbsp;</td>
    </tr>
    <tr>
      <td> done &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->done}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tanggal daftar &nbsp; </td>
      <td>  : </td>
      @empty ($driver->created_at)
      <td>  - </td>
      @else
      <td>  {{$driver->created_at()}} </td>
      @endempty
    </tr>
    <tr>
      <td> Keterangan &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->remaks}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tanggal Pengajuan &nbsp; </td>
      <td>  : </td>
      <td> {{$driver->get_tanggal_pengajuan()}} &nbsp;</td>
    </tr>
    <tr>
      <td> Tanggal Disetujui &nbsp; </td>
      <td>  : </td>
      @empty ($driver->tanggal_setujui)
      <td>  Belum disetujui </td>
      @else
      <td>  {{$driver->get_tanggal_setujui()}} </td>
      @endempty
    </tr>
    <tr>
      <td> Disetujui Oleh &nbsp; </td>
      <td>  : </td>
      @empty ($driver->nama_setujui)
      <td>  Belum disetujui </td>
      @else
      <td>  {{$driver->nama_setujui}} </td>
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
      <td> {{ $driver->tanggal}} </td>
    </tr>
  </table>



</body>
</html>
