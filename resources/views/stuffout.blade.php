@extends('layout.navmenu')
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Keluar</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-share fa-sm text-white-50"></i> Laporan Keluar</a>
    </div>

        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Semua Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Keluar</th>
                            <th>Status Barang</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Keluar</th>
                            <th>Status Barang</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <th>1.</th>
                            <th>Sempak</th>
                            <th>7</th>
                            <th>1/2/2022</th>
                            <th>Semua Bagus</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection