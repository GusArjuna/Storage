@extends('layout.navmenu')
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Code Stuff</h1>
    </div>

        <!-- DataTales Example -->
    <div class="card shadow mb-4 border-left-info">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form for Code Stuff</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input class="form-control" type="text" placeholder="Nama Barang" name="nama" id="nama">
                    </div>
                </div>
                <a href="#" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Submit</span>
                </a>
              </form>
        </div>
    </div>
@endsection