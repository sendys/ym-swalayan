@extends('template.template')

@section('isi')

    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black">Data Pelanggan</h1>
    </div>

    @include('partials.eror')

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-blue">
                        <h5 class="m-b-0">Form {{ $tombol }} Pelanggan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pelanggan.store') }}" id="frmuser"
                            class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Pelanggan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('pelanggan') is-invalid @enderror"
                                            id="pelanggan" name="pelanggan" value="{{ old('pelanggan') }}"
                                            placeholder="Masukan Nama Pelanggan ....">
                                        @error('pelanggan')
                                            <div class="invalid-feedback" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Alamat
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" name="alamat" value="{{ old('alamat') }}"
                                            placeholder="Masukan Alamat Pelanggan....">
                                        @error('alamat')
                                            <div class="invalid-feedback" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="Masukan Email Pelanggan....">
                                        @error('email')
                                            <div class="invalid-feedback" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">No HP
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                            id="telp" name="telp" value="{{ old('telp') }}"
                                            placeholder="Masukan No HP Pelanggan....">
                                        @error('telp')
                                            <div class="invalid-feedback" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-9">
                                                <button type="submit" class="btn btn-success">
                                                    {{ $tombol }}</button>
                                                <a href="{{ route('admin.pelanggan.index') }}"
                                                    class="btn btn-danger btn-xs">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->

@endsection
