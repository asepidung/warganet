<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title', 'AdminLTE')</title>

   <!-- Include CSS AdminLTE -->
   <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
   @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Navbar -->
      @include('layouts.partials.navbar')

      <!-- Sidebar -->
      @include('layouts.partials.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Main content -->
         @yield('content')
      </div>
      <!-- /.content-wrapper -->

      <!-- Footer -->
      @include('layouts.partials.footer')
   </div>

   <!-- Include JS AdminLTE -->
   <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
   @stack('scripts')
</body>

</html>