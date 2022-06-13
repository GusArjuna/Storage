@extends('layout.navmenu')
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Incoming Stuff Data</h1>
    </div>

        <!-- DataTales Example -->
    <div class="card shadow mb-4 border-left-success">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Incoming Form</h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/stuffin/formin">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="kode" class="form-label">Nama & Kode Barang</label>
                        <select class="form-control" aria-label=".form-select-sm example" name="kode" id="kode">
                          <option selected value="">- none -</option>
                          <option value="1">1 - Meja</option>
                          <option value="2">2 - Kursi</option>
                          <option value="3">3 - Almari</option>
                        </select>
                      </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-3 mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input class="form-control" type="text" placeholder="Ketikkan Jumlah..." name="jumlah" id="jumlah">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="tanggal" class="form-label">Tanggal Masuk</label>
                        <input class="form-control" type="date" name="tanggal" id="tanggal">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input class="form-control" type="text" placeholder="Bagus / Rusak ..." name="keterangan" id="keterangan">
                      </div>
                </div>
                <button class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Submit</span>
                </button>
              </form>
        </div>
    </div>
@endsection