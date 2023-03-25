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
                                    <a class="modal-effect btn btn-success" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" id="btn-tambah">Add Data</a>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="proses" class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                {{-- <th style="vertical-align: middle; text-align: center;" rowspan="2">No
                                                </th> --}}
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                    Customer</th>
                                                <th class="border-bottom-0" colspan="2">Waktu</th>
                                                <th class="border-bottom-0" colspan="4">Produk</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                    Action
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
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <x-customer-component></x-customer-component>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Bongkar</label>
                                    <select class="form-control select2-show-search form-select" id="unloading_id"
                                        name="unloading_id" data-placeholder="- Pilih Tanggal Bongkar -">
                                    </select>
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
                                    <input type="time" class="form-control" id="waktu_selesai"
                                        placeholder="Waktu Selesai" name="waktu_selesai">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Tipe Produk</label>
                                    <input type="text" class="form-control" id="tipe_produk"
                                        placeholder="Masukkan Tipe Produk" name="tipe_produk">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Grade</label>
                                    {{-- <input type="number" class="form-control" id="grade" placeholder="Masukkan Grade"
                                        name="grade"> --}}
                                    <select class="form-control form-select" id="grade" name="grade"
                                        data-placeholder="- Pilih Grade -">
                                        <option hidden selected value="">- Pilih Grade -</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Berat Produk</label>
                                    <input type="number" class="form-control" id="berat_produk"
                                        placeholder="Masukkan Berat Produk" name="berat_produk">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Produk</label>
                                    <input type="number" class="form-control" id="jumlah_produk"
                                        placeholder="Masukkan Jumlah Produk" name="jumlah_produk">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Randemen</label>
                                    <input type="number" class="form-control" id="randemen"
                                        placeholder="Masukkan Randemen" name="randemen">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Berat Gagal</label>
                                    <input type="number" class="form-control" id="berat_gagal"
                                        placeholder="Masukkan Berat Gagal" name="berat_gagal">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Gagal</label>
                                    <input type="number" class="form-control" id="jumlah_gagal"
                                        placeholder="Masukkan Jumlah Gagal" name="jumlah_gagal">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-primary simpan" type="submit">Submit</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- DETAIL -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong id="customer">PT. GLOBAL FARMINDO LESTARI</strong><br>
                    <strong id="tanggal_pengiriman">SABTU,10 DESEMBER 2022</strong>
                </h5>

            </div>
            <div class="modal-body">
                <div class="row" id="show-detail">
                    <div class="col-6">
                        <div class="example">
                            {{-- <label for="">Mobile Ke-1</label> --}}
                            {{-- HASIL PRODUKSI
                                Grade A: 1.265 ekor/2.508,92 kg
                                Randemen: 77,40 %
                                Grade B: ekor/kg
                                Randemen: %
                                Total Hasil Karkas: 1.265 ekor/2.508,92 kg
                                Randemen: 77,40 %
                                Gagal Proses: ekor/ kg
                                Rendemen: % --}}
                            <dl class="row">
                                <dt class="col-sm-3">Customer</dt>
                                <dd class="col-sm-9">
                                    <span id="customer_id">dummy</span>
                                </dd>

                                <dt class="col-sm-3">Tanggal Bongkar</dt>
                                <dd class="col-sm-9">
                                    <span id="unloading_id">06:45</span>
                                </dd>

                                <dt class="col-sm-3">Waktu Mulai</dt>
                                <dd class="col-sm-9" id="waktu_mulai">17:07</dd>

                                <dt class="col-sm-3">Waktu Selesai</dt>
                                <dd class="col-sm-9" id="waktu_selesai">17:07</dd>

                                <dt class="col-sm-3">Tipe Produk</dt>
                                <dd class="col-sm-9" id="tipe_produk">Dummy</dd>

                                <dt class="col-sm-3">Grade</dt>
                                <dd class="col-sm-9" id="grade">B</dd>

                                <dt class="col-sm-3">Berat Produk</dt>
                                <dd class="col-sm-9" id="berat_produk">177</dd>Kg

                                <dt class="col-sm-3">Jumlah Produk</dt>
                                <dd class="col-sm-9" id="jumlah_produk">17:07</dd>

                                <dt class="col-sm-3">Randemen</dt>
                                <dd class="col-sm-9" id="randemen">17</dd> %

                                <dt class="col-sm-3">Berat Gagal</dt>
                                <dd class="col-sm-9" id="berat_gagal">17</dd>Kg

                                <dt class="col-sm-3">Jumlah Gagal</dt>
                                <dd class="col-sm-9" id="jumah_gagal">17</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#customer_id').change(function() {
                var customer_id = $(this).val();
                $.ajax({
                    url: '{{ route('getUnloading') }}',
                    type: 'get',
                    data: {
                        customer_id: customer_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var len = response.length;
                        $("#unloading_id").empty();
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var tanggal_datang = response[i]['tanggal_datang'];
                            $("#unloading_id").append("<option value='" + id + "'>" +
                                tanggal_datang +
                                "</option>");
                        }
                    }
                });
            });
        });
    </script>

    <script>

        const table = new DataTable('proses', "{{ route('api.proses.index') }}", [{
                data: 'customer_id',
                // render: (data, type, row, meta) => {
                //     // cari index customer dengan id yang sesuai
                //     const index = customers.findIndex(customer => customer.id == data);
                //     if (index !== -1) {
                //         return customers[index].nama;
                //     } else {
                //         return data;
                //     }
                // }
            },
            {
                data: 'waktu_mulai'
            },
            {
                data: 'waktu_selesai'
            },
            {
                data: 'tipe_produk'
            },
            {
                data: 'grade'
            },
            {
                data: 'berat_produk'
            },
            {
                data: 'jumlah_produk'
            },

            {
                name: 'id',
                data: 'id',
                render: (id, type, row, meta) => {
                    console.log(row);
                    const button_detail = $('<button>', {
                        html: $('<i>', {
                            class: 'fa fa-info-circle'
                        }).prop('outerHTML'),
                        class: 'btn btn-warning btn-detail',
                        'data-id': id,
                        title: `Detail Data`,
                    })
                    const button_edit = $('<button>', {
                        html: $('<i>', {
                            class: 'fa fa-pencil'
                        }).prop('outerHTML'),
                        class: 'btn btn-secondary btn-edit',
                        'data-id': id,
                        title: `Edit Data`,
                    })

                    const button_delete = $('<button>', {
                        html: $('<i>', {
                            class: 'fa fa-trash'
                        }).prop('outerHTML'),
                        class: 'btn btn-danger btn-delete',
                        'data-data': id,
                        title: `Hapus Data`,
                    })

                    const button_group = $('<div>', {
                        class: 'btn-group btn-group-sm',
                        role: 'group',
                        html: [button_detail, button_edit, button_delete]
                    })
                    return button_group.prop('outerHTML')
                }
            },
        ]);

        table.init();

        $("#proses").on('click', ' .btn-delete', (e) => {
            const id = $(e.currentTarget).data("data");
            let url = "{{ route('api.proses.destroy', ':id') }}".replace(':id', id);
            table.delete(url);
        });
        $("#proses").on('click', ' .btn-detail', (e) => {
            $('#modal-detail').modal('show');
            const data = table.row($(this).closest('tr')).data();
            console.log(data);
        });
        $("#proses").on('click', ' .btn-edit', (e) => {
            const id = $(e.currentTarget).data("id"); // Mengambil nilai atribut data dengan menggunakan jQuery
            let url = "{{ route('api.proses.update', ':id') }}".replace(':id', id);
            // ganti url
            $("form").attr('action', url);
            $('.method').html('@method('put')');
            $("form")[0].reset();
            $.ajax({
                type: "get",
                url: url,
                success: function(data) {
                    $("#customer_id").val(data.customer_id);
                    $("#unloading_id").val(data.unloading_id);
                    $("#waktu_mulai").val(data.waktu_mulai);
                    $("#waktu_selesai").val(data.waktu_selesai);
                    $("#tipe_produk").val(data.tipe_produk);
                    $("#grade").val(data.grade);
                    $("#berat_produk").val(data.berat_produk);
                    $("#jumlah_produk").val(data.jumlah_produk);
                    $("#randemen").val(data.randemen);
                    $("#berat_gagal").val(data.berat_gagal);
                    $("#jumlah_gagal").val(data.jumlah_gagal);
                }
            });

            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Data')
        });

        $("#btn-tambah").on('click', (e) => {
            let url = "{{ route('api.proses.store') }}";
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

            let type = $('#modal-form .modal-title').text();
            if (type == "Tambah Data") {
                table.create(data, url)
            } else {
                table.update(data, url);
            }
        });


        function errorFunction() {
            alert("Error")
        }
    </script>
@endsection
