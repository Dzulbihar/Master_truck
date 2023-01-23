<?php 

use App\Models\Truck;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Support\Facades\DB;

////////////////////////////////////

function totalTruck()
{
  return 
  Truck::whereIn('status',["Proses Pengajuan","Sudah Disetujui","Diblokir"])->count();
}

function pengajuanTruck()
{
  return 
  Truck::where('status',"Proses Pengajuan")->count();
}

function disetujuiTruck()
{
  return 
  Truck::where('status',"Sudah Disetujui")->count();
}

function diblokirTruck()
{
  return 
  Truck::where('status',"Diblokir")->count();
}

function totalDriver()
{
  return 
  Driver::whereIn('status',["Proses Pengajuan","Sudah Disetujui","Diblokir"])->count();
}

function pengajuanDriver()
{
  return 
  Driver::where('status',"Proses Pengajuan")->count();
}

function disetujuiDriver()
{
  return 
  Driver::where('status',"Sudah Disetujui")->count();
}

function diblokirDriver()
{
  return 
  Driver::where('status',"Diblokir")->count();
}

function totalUser()
{
  return 
  User::where('role',"user")->count();
}

function totalUserTidakAKtif()
{
  return 
  User::where('role',"user")->
  where('status',"Tidak Aktif")->count();
}

function totalUserAKtif()
{
  return 
  User::where('role',"user")->
  where('status',"Aktif")->count();
}

function totalUserBlokir()
{
  return 
  User::where('role',"user")->
  where('status',"Blokir")->count();
}

?>