@extends('layout.navmenu')
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Masuk</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                <a href="{{ url('/stuffin/formin') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Barang Masuk</a>
    </div>

        <!-- DataTales Example -->
    <div class="card shadow mb-4 border-left-success">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Semua Barang</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Barang</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Barang</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($Stuffins as $Stuffin)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $Stuffin->kode }} - {{ $Stuffin->nama }}</th>
                            <th>{{ $Stuffin->jumlah }}</th>
                            <th>{{ $Stuffin->tanggal }}</th>
                            <th>{{ $Stuffin->keterangan }}</th>
                            <th>
                                <a href="{{ url('/stuffin/1') }}" class="btn btn-warning btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ url('/stuffin/del/1') }}" class="btn btn-danger btn-circle">
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