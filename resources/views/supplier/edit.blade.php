@extends('template.template')

@section('isi')
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black">Data Supplier</h1>
    </div>

    @include('partials.eror')

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-blue">
                        <h5 class="m-b-0">Form {{ $tombol }} Supplier</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.supplier.update', $supplier->id) }}" id="frmuser"
                            class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Supplier
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('supplier') is-invalid @enderror"
                                            id="supplier" name="supplier"
                                            value="{{ old('supplier', $supplier->supplier) }}"
                                            placeholder="Masukan Nama Supplier ....">
                                        @error('supplier')
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
                                            id="alamat" name="alamat" value="{{ old('alamat', $supplier->alamat) }}"
                                            placeholder="Masukan Alamat Supplier....">
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
                                            id="email" name="email" value="{{ old('email', $supplier->email) }}"
                                            placeholder="Masukan Email Supplier....">
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
                                            id="telp" name="telp" value="{{ old('telp', $supplier->telp) }}"
                                            placeholder="Masukan No HP Supplier....">
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
                                                <a href="{{ route('admin.supplier.index') }}"
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
