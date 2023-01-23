
<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

@include('layouts.navbar')

@include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

@yield('content')

  </div>
  <!-- /.content-wrapper -->

<!-- @include('layouts.footer') -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.script')

</body>
</html>
