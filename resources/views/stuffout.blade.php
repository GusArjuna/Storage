@extends('layout.navmenu')
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Keluar</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                <a href="{{ url('/stuffout/formout') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-share fa-sm text-white-50"></i> Laporan Keluar</a>
    </div>

        <!-- DataTales Example -->
    <div class="card shadow mb-4 border-left-danger">
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
                            <th>Tanggal Keluar</th>
                            <th>Status Barang</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Keluar</th>
                            <th>Status Barang</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($Stuffouts as $stuffout)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>
                                @foreach ($stuffs as $stuff)
                                    {{ 
                                    ($stuff->kode==$stuffout->kode)? $stuff->kode." - ".$stuff->nama :""
                                     }}
                                @endforeach
                            <th>{{ $stuffout->jumlah }}</th>
                            <th>{{ $stuffout->tanggal }}</th>
                            <th>{{ $stuffout->keterangan }}</th>
                            <th>
                                <a href="stuffout/{{ $stuffout->id }}/edit" class="btn btn-warning btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="stuffout/{{ $stuffout->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection