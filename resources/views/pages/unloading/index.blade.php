@extends('layouts.app')
@section('title', 'Bongkar Muat - RPU')
@include('vendor.datatable')
@section('content')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Bongkar Muat</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Bongkar Muat</a></li>
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
                            <h3 class="card-title">Bongkar Muat</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <a class="modal-effect btn btn-success" data-bs-effect="effect-scale"
                                    data-bs-toggle="modal" href="#tambahdata">Add Data</a>
                            </div><br>
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">No
                                            </th>
                                            <th class="border-bottom-0" colspan="2">Waktu</th>
                                            <th class="border-bottom-0" colspan="2">Delivery Order</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Berat
                                                Timbangan</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                Jumlah Diterima</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                Action</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th class="border-bottom-0">Datang</th>
                                            <th class="border-bottom-0">Bongkar</th>
                                            <th class="border-bottom-0">Berat</th>
                                            <th class="border-bottom-0">Jumlah Ayam</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action=""
                                                    method="POST">
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-id="">
                                                        <i class="fe fe-info"></i>
                                                    </button>
                                                    <a href="" class="btn btn-sm btn-outline-warning"><i
                                                            class="fe fe-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                            class="fe fe-trash"></i></button>
                                                </form>
                                        </tr>
                                    </tbody> --}}
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
<div class="modal fade" id="tambahdata">
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
                            <label class="form-label">Waktu Datang</label>
                            <input type="time" class="form-control" id="name1" placeholder="Waktu Datang"
                                name="waktu_datang">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Waktu Bongkar</label>
                            <input type="time" class="form-control" id="name2" placeholder="Waktu Bongkar"
                                name="waktu_bongkar">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Berat Delivery Order</label>
                            <input type="text" class="form-control" id="name1" placeholder="Masukkan Berat DO"
                                name="berat_do">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Jumlah Ayam Delivery Order</label>
                            <input type="text" class="form-control" id="name2" placeholder="Masukkan Jumlah Ayam DO"
                                name="jumlah_ayam_do">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Berat Timbangan</label>
                            <input type="text" class="form-control" id="name2" placeholder="Masukkan Berat Timbangan"
                                name="berat_timbangan">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Jumlah Diterima</label>
                            <input type="text" class="form-control" id="name2" placeholder="Masukkan Jumlah Diterima"
                                name="jumlah_diterima">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Berat Mati</label>
                            <input type="text" class="form-control" id="name1" placeholder="Masukkan Berat Mati"
                                name="berat_mati">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Jumlah Mati</label>
                            <input type="text" class="form-control" id="name2" placeholder="Masukkan Jumlah Mati"
                                name="jumlah_mati">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Berat Ditolak</label>
                            <input type="text" class="form-control" id="name1" placeholder="Masukkan Berat Ditolak"
                                name="berat_ditolak">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Jumlah Ditolak</label>
                            <input type="text" class="form-control" id="name2" placeholder="Masukkan Jumlah Ditolak"
                                name="jumlah_ditolak">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Berat Keranjang</label>
                            <input type="text" class="form-control" id="name2" placeholder="Masukkan Berat Keranjang"
                                name="berat_keranjang">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Berat Rata-rata</label>
                            <input type="text" class="form-control" id="name2" placeholder="Masukkan Berat Rata-rata"
                                name="berat_ratarata">
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
    const table = new DataTable('customer', "{{ route('api.customer.index') }}", [
        // { data: 'index' },
        { data: 'waktu_datang' },
        { data: 'waktu_bongkar' },
        { data: 'berat_do' },
        { data: 'jumlah_ayam_do' },
        { data: 'berat_timbangan' },
        { data: 'jumlah_diterima' },
    ]);

    table.init();
</script>
@endsection
