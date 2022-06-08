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
            <form>
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama & Kode Barang</label>
                        <select class="form-control" aria-label=".form-select-sm example" name="nama" id="nama">
                          <option selected>- none -</option>
                          <option value="1">01 - Borax</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-3 mb-3">
                        <label for="Jumlah" class="form-label">Jumlah</label>
                        <input class="form-control" type="text" placeholder="Ketikkan Jumlah..." name="Jumlah" id="Jumlah">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="tanggal" class="form-label">Tanggal Keluar</label>
                        <input class="form-control" type="datetime-local" name="tanggal" id="tanggal">
                      </div>
                </div>
                <a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Submit</span>
                </a>
              </form>
        </div>
    </div>
@endsection