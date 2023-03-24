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
                                        <tr>
                                            <th>Customer</th>
                                            <th>Tanggal Datang</th>
                                            <th>Jumlah Mobil</th>
                                            <th>Aksi</th>
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
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Tanggal Bongkar</label>
                                <input type="date" class="form-control" id="tanggal_bongkar" placeholder="Waktu Datang"
                                    name="tanggal_bongkar">
                            </div>
                        </div>
                    </div>
                    <div id="muatan">
                        <label class="form-label" id="kendaraan"><strong>Data Kendaraan</strong></label>
                        <div class="row">
                            <div id="error-message"></div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Waktu Datang</label>
                                    <input type="time" class="form-control" id="muatan.0.waktu_datang"
                                        placeholder="Waktu Datang" name="muatan[0][waktu_datang]">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Waktu Bongkar</label>
                                    <input type="time" class="form-control" id="muatan.0.waktu_bongkar"
                                        placeholder="Waktu Bongkar" name="muatan[0][waktu_bongkar]">
                                </div>
                            </div>
                        </div>
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
                            <label for="">Mobile Ke-1</label>
                            <dl class="row">
                                <dt class="col-sm-3">Jam Tiba</dt>
                                <dd class="col-sm-9">
                                    <span id="waktu_datang">06:45</span> WIB
                                </dd>

                                <dt class="col-sm-3">Jam Bongkar</dt>
                                <dd class="col-sm-9">
                                    <span id="waktu_bongkar">06:45</span> WIB
                                </dd>

                                <dt class="col-sm-3">Durasi Waktu Tiba-Selesai</dt>
                                <dd class="col-sm-9" id="waktu_selesai">1 jam 15 menit</dd>

                                <dt class="col-sm-3 text-truncate">Berat Kotor DO</dt>
                                <dd class="col-sm-9"><span id="jumlah_do">1.560</span> ekor/<span
                                        id="berat_do">4.689,60</span>kg</dd>
                                <dt class="col-sm-3">Mati</dt>
                                <dd class="col-sm-9"><span id="jumlah_mati">1.560</span> ekor/<span
                                        id="berat_mati">4.689,60</span>kg</dd>
                                <dt class="col-sm-3">Keranjang</dt>
                                <dd class="col-sm-9"><span id="keranjang">1.560</span> kg</dd>
                                <dt class="col-sm-3">Ayam Kembali</dt>
                                <dd class="col-sm-9"><span id="jumlah_ditolak">1.560</span> ekor/<span
                                        id="berat_ditolak">4.689,60</span>kg</dd>
                                <dt class="col-sm-3">Timbang Ulang LB RPA</dt>
                                <dd class="col-sm-9"><span id="jumlah_ditolak">1.560</span> ekor/<span
                                        id="berat_ditolak">4.689,60</span>kg</dd>
                                <dt class="col-sm-3">Berat Rata-rata</dt>
                                <dd class="col-sm-9"><span id="berat_ratarata"></span> Kg</dd>
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
    const table = new DataTable('unloading', "{{ route('api.unloading.index') }}", [
            {
                data: 'customer_id'
            },
            {
                data: 'tanggal_datang'
            },
            {
                data: 'jumlah_mobil'
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
                        html: [button_detail,button_edit,button_delete]
                    })
                    return button_group.prop('outerHTML')
                }
            },
        ]);

        table.init();
     
        $("#unloading").on('click', ' .btn-delete', (e) => {
            const id = $(e.currentTarget).data("data");
            let url = "{{ route('api.unloading.destroy', ':id') }}".replace(':id', id);
            table.delete(url);
        });
        $("#unloading").on('click', ' .btn-detail', (e) => {
            $('#modal-detail').modal('show');
            const data = table.row($(this).closest('tr')).data();
            console.log(data);
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

            let type = $('#modal-form .modal-title').text();
            if (type == "Tambah Data") {
                table.create(data, url)
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