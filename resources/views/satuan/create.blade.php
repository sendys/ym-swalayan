@extends('template.template')

@section('isi')
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black">Data Satuan</h1>
    </div>

    @include('partials.eror')

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-blue">
                        <h5 class="m-b-0">Form {{ $tombol }} Satuan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.satuan.store') }}" id="frmuser" class="form-horizontal form-bordered"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Satuan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                            id="satuan" name="satuan" value="{{ old('satuan') }}"
                                            placeholder="Masukan Nama Satuan ....">
                                        @error('satuan')
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
                                                <a href="{{ route('admin.satuan.index') }}"
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
