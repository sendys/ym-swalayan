@extends('template.template')

@section('isi')
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <div class="header-content">
            <h1 class="text-black">Selamat Datang di <span class="highlight">Panel Utama</span></h1>
            <p class="sub-text">Aplikasi <span class="highlight">Penjualan Sales Kanvas</span></p>
        </div>
        <div class="header-decoration"></div>
    </div>
    <!-- Main content -->
    <div class="content">
        @if (session('success'))
            <div id="notification" class="notification success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="notification" class="notification error">
                {{ session('error') }}
            </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="row">
            {{-- Tambahkan grafik atau widget lainnya di sini --}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
@endsection
