@extends('layout.navmenu')
@section('searchb')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/stuffin">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2" name="search">
        <div class="input-group-append">
            <button class="btn btn-success">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
@endsection
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Masuk</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printModal">
            Generate Report
        </button>
        <a href="{{ url('/stuffin/formin') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Barang Masuk</a>
    </div>

        <!-- DataTales Example -->
    <div class="card shadow mb-4 border-left-success">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary ">Data Semua Barang</h6>
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
                            <th>@foreach ($stuffs as $stuff)
                                {{ 
                                ($stuff->kode==$Stuffin->kode)? $stuff->kode." - ".$stuff->nama :""
                                 }}
                            @endforeach</th>
                            <th>{{ $Stuffin->jumlah }}</th>
                            <th>{{ $Stuffin->tanggal }}</th>
                            <th>{{ $Stuffin->keterangan }}</th>
                            <th>
                                <a href="stuffin/{{ $Stuffin->id }}/edit" class="btn btn-warning btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="stuffin/{{ $Stuffin->id }}" method="POST" class="d-inline">
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
            {{ $Stuffins->links() }}
        </div>
    </div>
    <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Report (PDF)</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/stuffin/print">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">From</span>
                            <input type="date" class="form-control"name="tgldari">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Until</span>
                            <input type="date" class="form-control" name="tglsampai">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection