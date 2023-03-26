@extends('layouts.app')
@section('title', 'Pengiriman - RPU')
@include('vendor.datatable')
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Pengiriman</h1>
                    <div>
                        <ol class="breadcrumb">

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
                                <h3 class="card-title">Pengiriman</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a class="modal-effect btn btn-success" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" id="btn-tambah">Add Data</a>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="pengiriman" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                {{-- <th class="border-bottom-0">#</th> --}}
                                                <th class="">Customer</th>

                                                <th class="">waktu kirim</th>
                                                <th class="">berat kirim</th>
                                                <th class="">jumlah kirim</th>
                                                <th class="">aksi</th>
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
            <div class="modal fade" id="modal-form">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title"><strong>Add Data</strong></h6><button aria-label="Close" class="btn-close"
                                data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form method="post">
                            <div class="method"></div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <x-customer-component></x-customer-component>
                                            </div>
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
                                            <label class="form-label">proses id</label>
                                            <select class="form-control select2-show-search form-select" id="proses_id"
                                                name="proses_id" data-placeholder="- Pilih grade | tipe -">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">waktu kirim</label>
                                            <input type="time" class="form-control" id="waktu_kirim" placeholder=""
                                                name="waktu_kirim">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">berat kirim</label>
                                            <input type="text" class="form-control" id="berat_kirim" placeholder=""
                                                name="berat_kirim">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                         <div class="form-group">
                                            <label class="form-label">jumlah kirim</label>
                                            <input type="text" class="form-control" id="jumlah_kirim" placeholder=""
                                                name="jumlah_kirim">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary simpan" type="button">Submit</button>
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
                            <h5 class="modal-1">
                                <strong id="customer">PT. GLOBAL FARMINDO LESTARI</strong><br><br>
                                {{-- <strong id="tanggal_pengiriman" class="mt-2">SABTU,10 DESEMBER 2022</strong> --}}
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
    $(document).ready(function() {
            $('#customer_id').change(function() {
                var customer_id = $(this).val();
                $.ajax({
                    url: '{{ route("api.getUnloading") }}',
                    type: 'get',
                    data: {
                        customer_id: customer_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var len = response.length;
                        $("#unloading_id").empty();
                        $("#unloading_id").append("<option value=''>Pilih tanggal bongkar</option>");
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var tanggal_datang = response[i]['tanggal_datang'];
                            $("#unloading_id").append("<option value='" + id + "'>" + tanggal_datang +
                                "</option>");
                        }

                    }
                });

                 $.ajax({
                    url:'{{route("api.getProses")}}',
                    type:'get',
                    data:{
                        customer_id:customer_id
                    },
                    dataType: 'json',
                    success:function(respone){
                        let option_processid = $('#proses_id');
                        let html = "<option value=''>Pilih grade | tipe</option>";
                        for(let x in respone){
                            html += "<option value='"+respone[x].id+"'>" + respone[x].grade + " | " + respone[x].tipe_produk +"</option>";
                        }
                        option_processid.html(html);
                    }
                });
            });
        });

        // $(document).ready(function(){
        //     $('#customer_id').change(function(){
        //         $.ajax({
        //             url:"{{route('api.getProses')}}",
        //             type:'get',
        //             data:{
        //                 customer_id:customer_id
        //             },
        //             dataType: 'json',
        //             success:function(response){
        //                 console.log(response);
        //             }
        //         });
        //     });
        // });
</script>
<script>
    const table = new DataTable('pengiriman', "{{ route('api.pengiriman.index') }}", [
        // { data: 'index' },
        { data: 'customer_id' },
        { data: 'waktu_kirim' },
        { data: 'berat_kirim' },
        { data: 'jumlah_kirim' },
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
    $("#pengiriman").on('click', ' .btn-detail', (e) => {
            const id = $(e.currentTarget).data("id"); // Mengambil nilai atribut data dengan menggunakan jQuery
            let url = "{{ route('api.pengiriman.show', ':id') }}".replace(':id', id);
             $.ajax({
                type: "get",
                url: url,
                success: function (data) {
                    $('#modal-detail').modal('show');
                    $('#show-detail').html('');
                    $('#customer').text(data.nama)
                    let content =`
                        <div class="col-6 mt-2 mb-2">
                                <div class="example">
                                    <dl class="row">
                                        <dt class="col-sm-5">tanggal bongkar</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.tanggal_bongkar}</span>
                                        </dd>
                                        <dt class="col-sm-5">grade | tipe produk</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.grade} | ${data.tipe_produk}</span>
                                        </dd>
                                        <dt class="col-sm-5">waktu kirim</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.waktu_kirim} WIB</span>
                                        </dd>
                                        <dt class="col-sm-5">waktu mulai</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.waktu_mulai} WIB</span>
                                        </dd>
                                        <dt class="col-sm-5">berat kirim</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.berat_kirim} Kg</span>
                                        </dd>
                                        <dt class="col-sm-5">jumlah kirim</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.jumlah_kirim} Kg</span>
                                        </dd>
                                    </dl>
                                </div>
                        </div>
                    `;
                    $('#show-detail').html(content);
                }
            });
    })
    $("#pengiriman").on('click',' .btn-edit', (e) => {
        const id = $(e.currentTarget).data("id"); // Mengambil nilai atribut data dengan menggunakan jQuery
        let url = "{{ route('api.pengiriman.update',':id') }}".replace(':id', id);

        // ganti url
        $("form").attr('action', url);
        $('.method').html('@method("put")');
        $("form")[0].reset();
        $('#modal-form').modal('show');
        $('.modal-title').text('Edit Data');
    });
    $("#pengiriman").on('click', ' .btn-delete', (e) => {
        const id = $(e.currentTarget).data("data");
        let url = "{{ route('api.pengiriman.destroy', ':id') }}".replace(':id', id);
        table.delete(url);
    });
    $("#btn-tambah").on('click', (e) => {
        let url = "{{ route('api.pengiriman.store') }}";
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
            table.create(data, url);
        } else {
            table.update(data, url);
        }
    });

</script>
@endsection
