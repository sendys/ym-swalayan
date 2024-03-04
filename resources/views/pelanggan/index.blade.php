@extends('template.template')

@section('isi')
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black">Data Pelanggan</h1>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="info-box">
            <div class="box-header with-border col-md-2">
                <a href="{{ route('admin.pelanggan.create') }}" class="btn btn-block btn-primary btn-lg">Tambah</a>
            </div>

            @include('partials.notification')

            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pelanggan</th>
                            <th>No Telpon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Pelanggan</th>
                            <th>No Telpon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.content -->
    <?php
    $currentUrl = url()->current();
    echo $currentUrl;
    ?>
    <script>
        $(document).ready(function() {
            var dataTable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url()->current() }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'pelanggan',
                        name: 'pelanggan'
                    },
                    {
                        data: 'telp',
                        name: 'telp',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            dataTable.on('draw.dt', function() {
                var info = dataTable.page.info();
                dataTable.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
            });
        });
    </script>
@endsection
