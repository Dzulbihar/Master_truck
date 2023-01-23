<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script>

<!-- https://getbootstrap.com/docs/4.0/getting-started/introduction/ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js
"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $("#truck").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#truck_wrapper .col-md-6:eq(0)');
    $("#driver").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#driver_wrapper .col-md-6:eq(0)');

    $("#user_daftar").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#user_aktif").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#user_tidak_aktif").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#user_block").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#user_unblock").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });

    $("#truck_daftar").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#truck_approve").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#truck_reject").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#truck_delete").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#truck_block").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#truck_unblock").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });

    $("#driver_daftar").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#driver_approve").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#driver_reject").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#driver_delete").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#driver_block").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
    $("#driver_unblock").DataTable({
      "paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": false,"responsive": true,
    });
  });
</script>


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

<!-- ____________________ Galery Truck ______________________ -->
<!-- Ekko Lightbox -->
<script src="{{asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<!-- Filterizr-->
<script src="{{asset('adminlte/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

<!-- Select2 -->
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
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

<!-- delete_chassis -->
<script>
  $('.delete_chassis').click( function(){
    var dataidchassis = $(this).attr('data-id-chassis');
    var datachassis = $(this).attr('data-chassis');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+datachassis+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{ url('chasis_code') }}/"+dataidchassis+"/{{('deletechasis_code')}}"
        swal("Data "+datachassis+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+datachassis+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- delete_merk -->
<script>
  $('.delete_merk').click( function(){
    var dataidmerk = $(this).attr('data-id-merk');
    var datamerk = $(this).attr('data-merk');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+datamerk+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{ url('merk') }}/"+dataidmerk+"/{{('deletemerk')}}"
        swal("Data "+datamerk+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+datamerk+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- delete_kota -->
<script>
  $('.delete_kota').click( function(){
    var dataidkota = $(this).attr('data-id-kota');
    var datakota = $(this).attr('data-kota');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+datakota+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{ url('kota') }}/"+dataidkota+"/{{('deletekota')}}"
        swal("Data "+datakota+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+datakota+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- delete_materi_ujian -->
<script>
  $('.delete_materi_ujian').click( function(){
    var dataidmateri_ujian = $(this).attr('data-id-materi_ujian');
    var datamateri_ujian = $(this).attr('data-materi_ujian');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+datamateri_ujian+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{ url('materi_ujian') }}/"+dataidmateri_ujian+"/{{('deletemateri_ujian')}}"
        swal("Data "+datamateri_ujian+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+datamateri_ujian+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- delete_jenis_pelanggaran -->
<script>
  $('.delete_jenis_pelanggaran').click( function(){
    var datajenis_pelanggaran = $(this).attr('data-jenis_pelanggaran');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+datajenis_pelanggaran+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{ url('jenis_pelanggaran') }}/"+datajenis_pelanggaran+"/{{('deletejenis_pelanggaran')}}"
        swal("Data "+datajenis_pelanggaran+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+datajenis_pelanggaran+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- delete_bentuk_pelanggaran -->
<script>
  $('.delete_bentuk_pelanggaran').click( function(){
    var databentuk_pelanggaran = $(this).attr('data-bentuk_pelanggaran');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+databentuk_pelanggaran+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{ url('bentuk_pelanggaran') }}/"+databentuk_pelanggaran+"/{{('deletebentuk_pelanggaran')}}"
        swal("Data "+databentuk_pelanggaran+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+databentuk_pelanggaran+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- approve_user -->
<script>
  $('.approve_user').click( function(){
    var dataiduser = $(this).attr('data-id-user');
    var datauser = $(this).attr('data-user');
    swal({
      title: "Yakin?",
      text: "Kamu akan memberikan persetujuan User",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_user')}}/{{('status')}}/"+dataiduser+" "
      } else {
        swal("Persetujuan User tidak jadi diberikan!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- reject_user -->
<script>
  $('.reject_user').click( function(){
    var dataiduser = $(this).attr('data-id-user');
    var datauser = $(this).attr('data-user');
    swal({
      title: "Yakin?",
      text: "Kamu akan membatalkan persetujuan User",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_user')}}/{{('status')}}/"+dataiduser+" "
      } else {
        swal("Persetujuan User tidak jadi dibatalkan!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- unblock_user -->
<script>
  $('.unblock_user').click( function(){
    var dataiduser = $(this).attr('data-id-user');
    var datauser = $(this).attr('data-user');
    swal({
      title: "Yakin?",
      text: "Kamu akan membatalkan pemblokiran User",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_user')}}/{{('status')}}/"+dataiduser+" "
      } else {
        swal("Pemblokiran User tidak jadi dibatalkan!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- reject_truck -->
<script>
  $('.reject_truck').click( function(){
    var dataidtruck = $(this).attr('data-id-truck');
    var datatruck = $(this).attr('data-truck');
    swal({
      title: "Yakin?",
      text: "Kamu akan membatalkan persetujuan RFID Truck",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_truck')}}/{{('status_reject_master_truck')}}/"+dataidtruck+" "
      } else {
        swal("Persetujuan RFID Truck tidak jadi dibatalkan!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- unblock_truck -->
<script>
  $('.unblock_truck').click( function(){
    var dataidtruck = $(this).attr('data-id-truck');
    var datatruck = $(this).attr('data-truck');
    swal({
      title: "Yakin?",
      text: "Kamu akan membatalkan pemblokiran RFID Truck",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_truck')}}/{{('status_unblock_master_truck')}}/"+dataidtruck+" "
      } else {
        swal("Pemblokiran RFID Truck tidak jadi dibatalkan!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- jadwal_ambil_rfid -->
<script>
  $('.jadwal_ambil_rfid').click( function(){
    var dataidjadwal = $(this).attr('data-id-jadwal');
    var datajadwal = $(this).attr('data-jadwal');
    swal({
      title: "Yakin?",
      text: "Kamu akan mengambil RFID Truck",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_truck')}}/{{('status_pengambilan_rfid_tag')}}/"+dataidjadwal+" "
      } else {
        swal("RFID Truck tidak jadi diambil!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- jadwal_kembali_rfid -->
<script>
  $('.jadwal_kembali_rfid').click( function(){
    var dataidjadwal = $(this).attr('data-id-jadwal');
    var datajadwal = $(this).attr('data-jadwal');
    swal({
      title: "Yakin?",
      text: "Kamu akan mengembalikan RFID Truck",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_truck')}}/{{('status_pengambilan_rfid_tag')}}/"+dataidjadwal+" "
      } else {
        swal("RFID Truck tidak jadi dikembalikan!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- approve_driver -->
<script>
  $('.approve_driver').click( function(){
    var dataiddriver = $(this).attr('data-id-driver');
    var datadriver = $(this).attr('data-driver');
    swal({
      title: "Yakin?",
      text: "Kamu akan memberikan persetujuan Driver",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_driver')}}/{{('status_approve_master_driver')}}/"+dataiddriver+" "
      } else {
        swal("Persetujuan Driver tidak jadi diberikan!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- reject_driver -->
<script>
  $('.reject_driver').click( function(){
    var dataiddriver = $(this).attr('data-id-driver');
    var datadriver = $(this).attr('data-driver');
    swal({
      title: "Yakin?",
      text: "Kamu akan membatalkan persetujuan Driver",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_driver')}}/{{('status_reject_master_driver')}}/"+dataiddriver+" "
      } else {
        swal("Persetujuan Driver tidak jadi dibatalkan!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- unblock_driver -->
<script>
  $('.unblock_driver').click( function(){
    var dataiddriver = $(this).attr('data-id-driver');
    var datadriver = $(this).attr('data-driver');
    swal({
      title: "Yakin?",
      text: "Kamu akan membatalkan pemblokiran Driver",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_driver')}}/{{('status_unblock_master_driver')}}/"+dataiddriver+" "
      } else {
        swal("Pemblokiran Driver tidak jadi dibatalkan!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- ujian_driver -->
<script>
  $('.ujian_driver').click( function(){
    var dataidjadwal = $(this).attr('data-id-jadwal');
    var datajadwal = $(this).attr('data-jadwal');
    swal({
      title: "Yakin?",
      text: "Kamu akan mengerjakan Ujian Driver",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_driver')}}/{{('status_jadwal_ujian')}}/"+dataidjadwal+" "
      } else {
        swal("Ujian Driver tidak jadi dikerjakan!", {
          icon: "error",
        });
      }
    });
  });
</script>
<!-- ujian_ulang_driver -->
<script>
  $('.ujian_ulang_driver').click( function(){
    var dataidjadwal = $(this).attr('data-id-jadwal');
    var datajadwal = $(this).attr('data-jadwal');
    swal({
      title: "Yakin?",
      text: "Kamu akan mengulangi Ujian Driver",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_driver')}}/{{('status_jadwal_ujian')}}/"+dataidjadwal+" "
      } else {
        swal("Ujian Driver tidak jadi diulangi!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- delete_violation -->
<script>
  $('.delete_violation').click( function(){
    var dataiddriver = $(this).attr('data-id-driver');
    var dataidviolation = $(this).attr('data-id-violation');
    var dataviolation = $(this).attr('data-violation');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+dataviolation+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('violation')}}/"+dataiddriver+"/"+dataidviolation+"/{{('delete')}}"
        swal("Data "+dataviolation+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+dataviolation+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>


<!-- delete_truck_user -->
<script>
  $('.delete_truck_user').click( function(){
    var dataidcompany = $(this).attr('data-id-company');
    var dataidtruck = $(this).attr('data-id-truck');
    var datatruck = $(this).attr('data-truck');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+datatruck+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('truck')}}/"+dataidcompany+"/"+dataidtruck+"/{{('delete')}}"
        swal("Data "+datatruck+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+datatruck+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- delete_driver_user -->
<script>
  $('.delete_driver_user').click( function(){
    var dataidcompany = $(this).attr('data-id-company');
    var dataiddriver = $(this).attr('data-id-driver');
    var datadriver = $(this).attr('data-driver');
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data "+datadriver+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('driver')}}/"+dataidcompany+"/"+dataiddriver+"/{{('delete')}}"
        swal("Data "+datadriver+" berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data "+datadriver+" tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- restore_master_truck -->
<script>
  $('.restore_truck').click( function(){
    var dataidtruck = $(this).attr('data-id-truck');
    var datatruck = $(this).attr('data-truck');
    swal({
      title: "Yakin?",
      text: "Kamu akan memulihkan data "+datatruck+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_truck')}}/"+dataidtruck+"/{{('restore')}}"
      } else {
        swal("Data "+datatruck+" tidak jadi dipulihkan!", {
          icon: "error",
        });
      }
    });
  });
</script>

<!-- bersihkan_master_truck -->
<script>
  $('.bersihkan_truck').click( function(){
    swal({
      title: "Yakin?",
      text: "Kamu akan menghapus semua data",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "{{url('master_truck')}}/{{('recycle_bin')}}/{{('clear')}}"
      } else {
        swal("Semua data tidak jadi dihapus!", {
          icon: "error",
        });
      }
    });
  });
</script>