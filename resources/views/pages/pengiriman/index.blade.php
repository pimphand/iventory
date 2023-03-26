@extends('layouts.app')
@section('title', 'pengiriman - RPU')
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
                                                <th class="">unloading</th>
                                                <th class="">prosess</th>
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
                                            <label class="form-label">unloading id</label>
                                            <input type="text" class="form-control" id="text" placeholder=""
                                                name="unloading_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">proses id</label>
                                            <input type="text" class="form-control" id="proses_id" placeholder=""
                                                name="proses_id">
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
@endsection
@section('js')
<script>
    const table = new DataTable('pengiriman', "{{ route('api.pengiriman.index') }}", [
        // { data: 'index' },
        { data: 'customer_id' },
        { data: 'unloading_id' },
        { data: 'proses_id' },
        { data: 'waktu_kirim' },
        { data: 'berat_kirim' },
        { data: 'jumlah_kirim' },
        {
            name: 'id',
            data: 'id',
            render: (id, type, row, meta) => {

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
                    html: [button_edit,button_delete]
                })
                return button_group.prop('outerHTML')
            }
        },
    ]);

    table.init();

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
