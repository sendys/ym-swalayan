<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    {{-- logo --}}
    <link rel="shortcut icon" href="{{ url('assets/img/logo.png') }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

    <!-- v4.0.0-alpha.6 -->
    <link rel="stylesheet" href="{{ url('theme/dist/bootstrap/css/bootstrap.min.css') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('theme/dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('theme/dist/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('theme/dist/css/et-line-font/et-line-font.css') }}">
    <link rel="stylesheet" href="{{ url('theme/dist/css/themify-icons/themify-icons.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('theme/dist/plugins/datatables/css/dataTables.bootstrap.min.css') }}">

    <!-- Tambahan Notif tambah berhasil dan gagal -->
    <link rel="stylesheet" href="{{ url('theme/dist/css/notif.css') }}">

    <link rel="stylesheet" href="{{ url('theme/dist/css/upload.css') }}">
    <link rel="stylesheet" href="{{ url('theme/dist/css/tabeldata.css') }}">

    <!-- Libraries -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet"
        href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/css/dataTables.checkboxes.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    @include('partials.script')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">

        @include('partials.topbar')

        @include('partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('isi')
        </div>
        <!-- /.content-wrapper -->

        @include('partials.footer')

    </div>
    <!-- ./wrapper -->

</body>

</html>
