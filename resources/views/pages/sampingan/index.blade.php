@extends('layouts.app')
@section('title', 'Sampingan - RPU')
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
                    <h1 class="page-title">Sampingan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Sampingan</a></li>
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
                                <h3 class="card-title">Sampingan</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a class="modal-effect btn btn-success" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" id="btn-tambah">Add Data</a>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="sampingan" class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                {{-- <th style="vertical-align: middle; text-align: center;" rowspan="2">No
                                            </th> --}}
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                    Customer
                                                </th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                    Tanggal Bongkar(?)
                                                </th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">Tipe
                                                    Produk(?)
                                                </th>
                                                <th class="border-bottom-0" colspan="2">Kepala Leher</th>
                                                <th class="border-bottom-0" colspan="2">Kepala Tanpa Leher</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">
                                                    Action
                                                </th>
                                            </tr>
                                            <tr class="text-center">
                                                <th class="border-bottom-0">Berat</th>
                                                <th class="border-bottom-0">Prosentase</th>
                                                <th class="border-bottom-0">Berat</th>
                                                <th class="border-bottom-0">Prosentase</th>
                                                {{-- <th class="border-bottom-0">Berat</th>
                                            <th class="border-bottom-0">Jumlah</th> --}}
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
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <x-customer-component></x-customer-component>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Bongkar</label>
                                    <select class="form-control select2-show-search form-select @error('unloading_id') is-invalid @enderror" id="unloading_id"
                                        data-minimum-input-length="0" name="unloading_id"
                                        data-placeholder="- Pilih Tanggal Bongkar -">
                                    </select>
                                    @error('unloading_id')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Tipe Produk(?)</label>
                                    <select class="form-control select2-show-search form-select @error('proses_id') is-invalid @enderror" id="proses_id"
                                        data-minimum-input-length="0" name="proses_id"
                                        data-placeholder="- Pilih Tipe Produk -">
                                    </select>
                                    @error('proses_id')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Berat Kepala Leher</label>
                                    <input type="number" class="form-control @error('berat_kepala_leher') is-invalid @enderror" id="berat_kepala_leher"
                                        placeholder="Masukkan Berat Kepala Leher" name="berat_kepala_leher">
                                    @error('berat_kepala_leher')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Prosentase Kepala Leher</label>
                                    <input type="number" class="form-control @error('prosentase_kepala_leher') is-invalid @enderror" id="prosentase_kepala_leher"
                                        placeholder="Masukkan Prosentase Kepala Leher" name="prosentase_kepala_leher">
                                    @error('prosentase_kepala_leher')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Berat Kepala Tanpa Leher</label>
                                    <input type="number" class="form-control @error('berat_kepala_tanpa_leher') is-invalid @enderror" id="berat_kepala_tanpa_leher"
                                        placeholder="Masukkan Berat Kepala Tanpa Leher" name="berat_kepala_tanpa_leher">
                                    @error('berat_kepala_tanpa_leher')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Prosentase Kepala Tanpa Leher</label>
                                    <input type="number" class="form-control @error('prosentase_kepala_tanpa_leher') is-invalid @enderror" id="prosentase_kepala_tanpa_leher"
                                        placeholder="Masukkan Prosentase Kepala Tanpa Leher"
                                        name="prosentase_kepala_tanpa_leher">
                                    @error('prosentase_kepala_tanpa_leher')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Berat Usus</label>
                                    <input type="number" class="form-control @error('berat_usus') is-invalid @enderror" id="berat_usus"
                                        placeholder="Masukkan Berat Usus" name="berat_usus">
                                    @error('berat_usus')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Prosentase Usus</label>
                                    <input type="number" class="form-control @error('prosentase_usus') is-invalid @enderror" id="prosentase_usus"
                                        placeholder="Masukkan Prosentase Usus" name="prosentase_usus">
                                    @error('prosentase_usus')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Berat HJA</label>
                                    <input type="number" class="form-control @error('berat_hja') is-invalid @enderror" id="berat_hja"
                                        placeholder="Masukkan Berat HJA" name="berat_hja">
                                    @error('berat_hja')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Prosentase HJA</label>
                                    <input type="number" class="form-control @error('prosentase_hja') is-invalid @enderror" id="prosentase_hja"
                                        placeholder="Masukkan Prosentase HJA" name="prosentase_hja">
                                    @error('prosentase_hja')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Berat Ceker</label>
                                    <input type="number" class="form-control @error('berat_ceker') is-invalid @enderror" id="berat_ceker"
                                        placeholder="Masukkan Berat Ceker" name="berat_ceker">
                                    @error('berat_ceker')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Prosentase Ceker</label>
                                    <input type="number" class="form-control @error('prosentase_ceker') is-invalid @enderror" id="prosentase_ceker"
                                        placeholder="Masukkan Prosentase Ceker" name="prosentase_ceker">
                                    @error('prosentase_ceker')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Berat Tembolok</label>
                                    <input type="number" class="form-control @error('berat_tembolok') is-invalid @enderror" id="berat_tembolok"
                                        placeholder="Masukkan Berat Tembolok" name="berat_tembolok">
                                    @error('berat_tembolok')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Prosentase Tembolok</label>
                                    <input type="number" class="form-control @error('prosentase_tembolok') is-invalid @enderror" id="prosentase_tembolok"
                                        placeholder="Masukkan Prosentase Tembolok" name="prosentase_tembolok">
                                    @error('prosentase_tembolok')
                                        <small>{{ $message }}</small>
                                    @enderror
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
    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-1">
                        <strong id="customer">PT. GLOBAL FARMINDO LESTARI</strong><br><br>
                        <strong id="tanggal_pengiriman" class="mt-2">SABTU,10 DESEMBER 2022</strong>
                    </h5>

                </div>
                <div class="modal-body">
                    <div class="row" id="show-detail"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        /** tanggal_bongkar */
        $(document).ready(function() {
            $('#customer_id').change(function() {
                var customer_id = $(this).val();
                $.ajax({
                    url: '{{ route('api.getUnloading') }}',
                    type: 'get',
                    data: {
                        customer_id: customer_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var len = response.length;
                        $("#unloading_id").empty();
                        $("#unloading_id").append("<option value='" + id +
                            "'>Pilih tanggal bongkar</option>");
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var tanggal_bongkar = response[i]['tanggal_bongkar'];
                            console.log(tanggal_bongkar);
                            $("#unloading_id").append("<option value='" + id + "'>" +
                                tanggal_bongkar +
                                "</option>");
                        }

                    }
                });
            });
        });
        /** tipe_produk */
        $(document).ready(function() {
            $('#unloading_id').change(function() {
                var unloading_id = $(this).val();
                $.ajax({
                    url: '{{ route('api.getProses') }}',
                    type: 'get',
                    data: {
                        unloading_id: unloading_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var len = response.length;
                        $("#proses_id").empty();
                        // $("#proses_id").append("<option value='" + id + "'>" + tipe_produk + "</option>");
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var tipe_produk = response[i]['tipe_produk'];
                            $("#proses_id").append("<option value='" + id + "'>" +
                                tipe_produk +
                                "</option>");
                        }

                    }
                });
            });
        });
    </script>

    <script>
        const table = new DataTable('sampingan', "{{ route('api.sampingan.index') }}", [{
                data: 'customer_id'
            },
            {
                data: 'unloading_id'
            },
            {
                data: 'proses_id'
            },
            {
                data: 'berat_kepala_leher'
            },
            {
                data: 'prosentase_kepala_leher'
            },
            {
                data: 'berat_kepala_tanpa_leher'
            },
            {
                data: 'prosentase_kepala_tanpa_leher'
            },

            {
                name: 'id',
                data: 'id',
                render: (id, type, row, meta) => {

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
                        'data-id': id,
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

        $("#sampingan").on('click', ' .btn-delete', (e) => {
            const id = $(e.currentTarget).data("data");
            let url = "{{ route('api.sampingan.destroy', ':id') }}".replace(':id', id);
            table.delete(url);
        });
        $("#sampingan").on('click', ' .btn-detail', (e) => {
            const id = $(e.currentTarget).data("id"); // Mengambil nilai atribut data dengan menggunakan jQuery
            let url = "{{ route('api.sampingan.show', ':id') }}".replace(':id', id);
            $.ajax({
                type: "get",
                url: url,
                success: function(data) {
                    $('#modal-detail').modal('show');
                    $('#show-detail').html('');
                    $('#show-detail').append(`
                        <div class="col-md-6">
                            <p>Nama Customer: ${data.nama}</p>
                            <p>Tanggal Bongkar: ${data.tanggal_bongkar}</p>
                            <p>Tipe Produk: ${data.tipe_produk}</p>
                            <p>Grade: ${data.grade}</p>
                            <p>Berat Kepala Leher: ${data.berat_kepala_leher}</p>
                            <p>Prosentase Kepala Leher: ${data.prosentase_kepala_leher}</p>
                            <p>Berat Kepala Tanpa Leher: ${data.berat_kepala_tanpa_leher}</p>
                            <p>Prosentase Kepala Tanpa Leher: ${data.prosentase_kepala_tanpa_leher}</p>
                        </div>
                        <div class="col-md-6">
                            <p>Berat Usus: ${data.berat_usus}</p>
                            <p>Prosentase Usus: ${data.prosentase_usus}</p>
                            <p>Berat HJA: ${data.berat_hja}</p>
                            <p>Prosentase HJA: ${data.prosentase_hja}</p>
                            <p>Berat Ceker: ${data.berat_ceker}</p>
                            <p>Prosentase Ceker: ${data.prosentase_ceker}</p>
                            <p>Berat Tembolok: ${data.berat_tembolok}</p>
                            <p>Prosentase Tembolok: ${data.prosentase_tembolok}</p>
                        </div>
                    `);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
        $("#sampingan").on('click', ' .btn-edit', (e) => {
            const id = $(e.currentTarget).data("id"); // Mengambil nilai atribut data dengan menggunakan jQuery
            let url = "{{ route('api.sampingan.update', ':id') }}".replace(':id', id);
            // ganti url
            $("form").attr('action', url);
            $('.method').html('@method('put')');
            $("form")[0].reset();
            $.ajax({
                type: "get",
                url: url,
                success: function(data) {
                    $("#customer_id").val(data.customer_id).trigger('change');
                    $("#unloading_id").val(data.unloading_id).trigger('change');
                    $("#proses_id").val(data.proses_id).trigger('change');
                    $("#grade").val(data.grade).trigger('change');
                    $("#berat_kepala_leher").val(data.berat_kepala_leher);
                    $("#prosentase_kepala_leher").val(data.prosentase_kepala_leher);
                    $("#berat_kepala_tanpa_leher").val(data.berat_kepala_tanpa_leher);
                    $("#prosentase_kepala_tanpa_leher").val(data.prosentase_kepala_tanpa_leher);
                    $("#berat_usus").val(data.berat_usus);
                    $("#prosentase_usus").val(data.prosentase_usus);
                    $("#berat_hja").val(data.berat_hja);
                    $("#prosentase_hja").val(data.prosentase_hja);
                    $("#berat_ceker").val(data.berat_ceker);
                    $("#prosentase_ceker").val(data.prosentase_ceker);
                    $("#berat_tembolok").val(data.berat_tembolok);
                    $("#prosentase_tembolok").val(data.prosentase_tembolok);
                }
            });

            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Data')
        });
        $('#btn-edit').on('submit', function(e) {
            e.preventDefault();
            let url = $(this).attr('action');
            let data = $(this).serialize();
            $.ajax({
                type: "post",
                url: url,
                data: data,
                success: function(response) {
                    $('#modal-form').modal('hide');
                    $('#sampingan').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    let err = eval("(" + xhr.responseText + ")");
                    alert(err.message);
                }
            });
        });
        $("#btn-tambah").on('click', (e) => {
            let url = "{{ route('api.sampingan.store') }}";
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
