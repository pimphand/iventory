@extends('layouts.app')
@section('title', 'Proses - RPU')
@include('vendor.datatable')
@section('content')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Proses</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Proses</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Data Table</li> --}}
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Proses</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <button class="modal-effect btn btn-success" id="btn-tambah"
                                    data-bs-effect="effect-scale" data-bs-toggle="modal">Tambah Data</button>
                            </div><br>
                            {{-- <div>
                                <a class="modal-effect btn btn-success" data-bs-effect="effect-scale"
                                    data-bs-toggle="modal" href="#tambahdata">Add Data</a>
                            </div><br> --}}
                            <div class="table-responsive">
                                <table id="proses" class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">No
                                            </th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                Customer</th>
                                            <th class="border-bottom-0" colspan="2">Waktu</th>
                                            <th class="border-bottom-0" colspan="4">Produk</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">Action
                                                </th>
                                        </tr>
                                        <tr class="text-center">
                                            <th class="border-bottom-0">Mulai</th>
                                            <th class="border-bottom-0">Selesai</th>
                                            <th class="border-bottom-0">Tipe</th>
                                            <th class="border-bottom-0">Grade</th>
                                            <th class="border-bottom-0">Berat</th>
                                            <th class="border-bottom-0">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->

<!-- MODAL ADD DATA -->
<div class="modal fade" id="modal-form">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"><strong>Add Data</strong></h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label"> Customer</label>
                            <input type="text" class="form-control" id="customer_id" placeholder="Masukkan Customer"
                                name="customer_id">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Unloading</label>
                            <input type="text" class="form-control" id="unloading_id" placeholder="Masukkan Unloading"
                                name="unloading_id">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="waktu_mulai" placeholder="Waktu Mulai"
                                name="waktu_mulai">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Waktu Selesai</label>
                            <input type="time" class="form-control" id="waktu_selesai" placeholder="Waktu Selesai"
                                name="waktu_selesai">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Tipe Produk</label>
                            <input type="text" class="form-control" id="tipe_produk" placeholder="Masukkan Tipe Produk"
                                name="tipe_produk">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Grade</label>
                            <input type="text" class="form-control" id="grade" placeholder="Masukkan Grade"
                                name="grade">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Berat Produk</label>
                            <input type="text" class="form-control" id="berat_produk" placeholder="Masukkan Berat Produk"
                                name="berat_produk">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Jumlah Produk</label>
                            <input type="text" class="form-control" id="jumlah_produk" placeholder="Masukkan Jumlah Produk"
                                name="jumlah_produk">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Randemen</label>
                            <input type="text" class="form-control" id="randemen" placeholder="Masukkan Randemen"
                                name="randemen">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Berat Gagal</label>
                            <input type="text" class="form-control" id="berat_gagal" placeholder="Masukkan Berat Gagal"
                                name="berat_gagal">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Jumlah Gagal</label>
                            <input type="text" class="form-control" id="jumlah_gagal" placeholder="Masukkan Jumlah Gagal"
                                name="jumlah_gagal">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const table = new DataTable('proses', "{{ route('api.proses.index') }}", [
        // { data: 'index' },
        { data: 'customer' },
        { data: 'waktu_mulai' },
        { data: 'waktu_selesai' },
        { data: 'tipe_produk' },
        { data: 'grade' },
        { data: 'berat_produk' },
        { data: 'jumlah_produk' },
    ]);

    table.init();
</script>
@endsection
