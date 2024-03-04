@extends('template.template')

@section('isi')

    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black">Data Kategori Produk</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-blue">
                        <h5 class="m-b-0">Form {{ $tombol }} Kategori Produk</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.kategori.store') }}" id="frmuser"
                            class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kategori</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                            id="kategori" name="kategori" value="{{ old('kategori') }}"
                                            placeholder="Masukan Nama Kategori Produk ....">
                                        @error('kategori')
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
                                                <button type="submit" class="btn btn-success"> {{ $tombol }}</button>
                                                <a href="{{ route('admin.kategori.index') }}"
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
