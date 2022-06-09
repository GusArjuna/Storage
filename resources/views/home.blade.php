@extends('layout.navmenu')
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inventory</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        <a href="{{ url('/codestuff') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Pendaftaran Barang </a>
    </div>

        <!-- DataTales Example -->
    <div class="card shadow mb-4 border-left-info">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Semua Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($Stuffs as $Stuf)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $Stuf->kode }}</th>
                            <th>{{ $Stuf->nama }}</th>
                            <th>{{ $Stuf->jumlah }}</th>
                            <th>{{ ($Stuf->jumlah>0)? "Tersedia":"Kosong" }}</th>
                            <th>
                                <a href="/1" class="btn btn-warning btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection