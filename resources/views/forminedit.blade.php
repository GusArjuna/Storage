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
            <form method="POST" action="/stuffin/{{ $instuff->id }}">
                @method('patch')
                @csrf
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="kode" class="form-label">Nama & Kode Barang</label>
                        <select class="form-control @error('kode') is-invalid @enderror" aria-label=".form-select-sm example" name="kode" id="kode">
                            <option value="">- none -</option>
                          @foreach ($stuffs as $stuff)
                            <option {{ ($instuff->kode==$stuff->kode)?"selected":"" }} value="{{ $stuff->kode }}">{{ $stuff->kode }} - {{ $stuff->nama }}</option>
                          @endforeach
                        </select>
                        @error('kode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-3 mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input class="form-control @error('jumlah') is-invalid @enderror" type="text" placeholder="Ketikkan Jumlah..." name="jumlah" id="jumlah" value="{{ $instuff->kode }}">
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="tanggal" class="form-label">Tanggal Masuk</label>
                        <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" id="tanggal" value="{{ $instuff->tanggal }}">
                        @error('tanggal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input class="form-control @error('keterangan') is-invalid @enderror" type="text" placeholder="Bagus / Rusak ..." name="keterangan" id="keterangan" value="{{ $instuff->keterangan }}">
                        @error('keterangan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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