@extends('layouts.app')
@section('title', 'Bongkar Muat - RPU')
@include('vendor.datatable')
@include('vendor.select2')
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
                                    data-bs-toggle="modal" id="btn-tambah">Add Data</a>
                            </div><br>
                            <div class="table-responsive">

                                <!--  -->
                                <table id="unloading" class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                Customer
                                            </th>
                                            <th class="" colspan="2">Waktu</th>
                                            <th class="" colspan="2">Delivery Order</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                Berat Timbangan
                                            </th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                Jumlah Diterima</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                Action</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th class="">Datang</th>
                                            <th class="">Bongkar</th>
                                            <th class="">Berat</th>
                                            <th class="">Jumlah Ayam</th>
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
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <x-customer-component></x-customer-component>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="error-message"></div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Bongkar</label>
                                <input type="date" class="form-control" id="tanggal_bongkar" placeholder="Waktu Datang"
                                    name="bongkar[tanggal_bongkar]">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Waktu Datang</label>
                                <input type="time" class="form-control" id="bongkar.waktu_datang"
                                    placeholder="Waktu Datang" name="bongkar[waktu_datang]">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Waktu Bongkar</label>
                                <input type="time" class="form-control" id="waktu_bongkar" placeholder="Waktu Bongkar"
                                    name="bongkar[waktu_bongkar]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div id="muatan">
                        <label class="form-label" id="kendaraan"><strong>Data Kendaraan</strong></label>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Ayam Delivery Order</label>
                                    <input type="number" class="form-control" id="muatan.0.jumlah_ayam_do"
                                        placeholder="Masukkan Jumlah Ayam DO" name="muatan[0][jumlah_ayam_do]">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Berat Delivery Order</label>
                                    <input type="number" class="form-control" id="muatan.0.berat_do"
                                        placeholder="Masukkan Berat DO" name="muatan[0][berat_do]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Berat Timbangan</label>
                                    <input type="number" class="form-control" id="muatan.0.berat_timbangan"
                                        placeholder="Masukkan Berat Timbangan" name="muatan[0][berat_timbangan]">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Diterima</label>
                                    <input type="number" class="form-control" id="muatan.0.jumlah_diterima"
                                        placeholder="Masukkan Jumlah Diterima" name="muatan[0][jumlah_diterima]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Berat Mati</label>
                                    <input type="number" class="form-control" id="muatan.0.berat_mati"
                                        placeholder="Masukkan Berat Mati" name="muatan[0][berat_mati]">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Mati</label>
                                    <input type="number" class="form-control" id="muatan.0.jumlah_mati"
                                        placeholder="Masukkan Jumlah Mati" name="muatan[0][jumlah_mati]">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Berat Ditolak</label>
                                    <input type="number" class="form-control" id="muatan.0.berat_ditolak"
                                        placeholder="Masukkan Berat Ditolak" name="muatan[0][berat_ditolak]">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Ditolak</label>
                                    <input type="number" class="form-control" id="muatan.0.jumlah_ditolak"
                                        placeholder="Masukkan Jumlah Ditolak" name="muatan[0][jumlah_ditolak]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Berat Keranjang</label>
                                    <input type="number" class="form-control" id="muatan.0.berat_keranjang"
                                        placeholder="Masukkan Berat Keranjang" name="muatan[0][berat_keranjang]">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Berat Rata-rata</label>
                                    <input type="number" class="form-control" id="muatan.0.berat_ratarata"
                                        placeholder="Masukkan Berat Rata-rata" name="muatan[0][berat_ratarata]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="container"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success " type="button" id="add">Tambah Mobil</button>
                    <button class="btn btn-primary simpan" type="submit">Submit</button>
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const table = new DataTable('unloading', "{{ route('api.unloading.index') }}", [{
                data: 'customer_id'
            },
            {
                data: 'waktu_datang'
            },
            {
                data: 'waktu_bongkar'
            },
            {
                data: 'berat_do'
            },
            {
                data: 'jumlah_ayam_do'
            },
            {
                data: 'berat_timbangan'
            },
            {
                data: 'jumlah_diterima'
            },
            {
                data: 'id',
                render: (data, type, row, meta) => {
                    return '<button class="btn btn-sm btn-primary btn-edit mr-2" data-id=' + data + '>Edit</button><button class="btn btn-sm btn-danger ml-2 btn-delete" data-data=' + data + '>Hapus</button>';
                }
            },
        ]);

        table.init();

        $("#unloading").on('click', ' .btn-delete', (e) => {
            const id = $(e.currentTarget).data("data");
            let url = "{{ route('api.unloading.destroy', ':id') }}".replace(':id', id);
            table.delete(url);
        });
        $("#unloading").on('click', ' .btn-edit', (e) => {
            const id = $(e.currentTarget).data("id"); // Mengambil nilai atribut data dengan menggunakan jQuery
            let url = "{{ route('api.unloading.update', ':id') }}".replace(':id', id);
            // ganti url
            $("form").attr('action', url);
            $('.method').html('@method('put')');
            $("form")[0].reset();
            $.ajax({
                type: "get",
                url: url,
                success: function (data) {
                    $("#waktu_datang").val(data.waktu_datang);
                    $("#waktu_bongkar").val(data.waktu_bongkar);
                    $("#berat_do").val(data.berat_do);
                    $("#jumlah_ayam_do").val(data.jumlah_ayam_do);
                    $("#berat_timbangan").val(data.berat_timbangan);
                    $("#jumlah_diterima").val(data.jumlah_diterima);
                    $("#berat_mati").val(data.berat_mati);
                    $("#jumlah_mati").val(data.jumlah_mati);
                    $("#berat_ditolak").val(data.berat_ditolak);
                    $("#jumlah_ditolak").val(data.jumlah_ditolak);
                    $("#berat_keranjang").val(data.berat_keranjang);
                    $("#berat_ratarata").val(data.berat_ratarata);
                }
            });
            
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Data')
        });

        $("#btn-tambah").on('click', (e) => {
            let url = "{{ route('api.unloading.store') }}";
            $("form")[0].reset();
            // ganti url
            $("form").attr('action', url);
            $('.method').html(' ');
            $("#nama").val("");
            $('#modal-form').modal('show');
            $('.modal-title').text('Tambah Data')
        });


        $('.simpan').click((e) => {
            e.preventDefault();
            let data = $('form').serialize()
            let url = $("form").attr('action');

            let type = $('.modal-title').text();
            if (type == "Tambah Data") {
                table.create(data, url,errorFunction)
            } else {
                table.update(data, url);
            }
        });

        $(document).ready(function() {
            var i = 1;
            $("#add").click(function() {
                $("#muatan").clone().appendTo("#container").attr("id", "muatan" + i);
                $("#muatan" + i + " :input").each(function() {
                    var newID = this.id + i;
                    $(this).removeClass("is-invalid");
                    $(this).parent().find(".error").remove();
                    $(this).attr("name", $(this).attr("name").replace(/\[[0-9]+\]/, "[" + i + "]"));
                    $(this).attr('id', $(this).attr("name").replace(/\[[0-9]+\]/, "."+ i + ".").replace(/\[|\]/g, ""));
                    $(this).val('');
                });
                
                var deleteBtn = $("<button/>", {
                    text: "Hapus",
                    class: "btn btn-danger btn-sm mb-3",
                    click: function() {
                        $(this).parent().remove();
                    }
                });
                $("#muatan" + i).append(deleteBtn);
                i++;
            });
        });
        
        function errorFunction() {
            alert("Error")
        }
</script>
@endsection