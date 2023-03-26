@extends('layouts.app')
@section('title', 'User - RPU')
@include('vendor.datatable')
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">User</h1>
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
                                <h3 class="card-title">User</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a class="modal-effect btn btn-success" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" id="btn-tambah">Add Data</a>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="user" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="">Nama</th>
                                                <th class="">telepon</th>
                                                <th class="">jabatan</th>
                                                <th class="">email</th>
                                                <th class="">Aksi</th>
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
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" placeholder="masukan nama"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="masukkan email"
                                                name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">telepon</label>
                                            <input type="text" class="form-control" id="telepon" placeholder="masukan telepon"
                                                name="telepon">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">username</label>
                                            <input type="text" class="form-control" id="username" placeholder="masukkan username"
                                                name="username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">jabatan</label>
                                            <input type="text" class="form-control" id="jabatan" placeholder="masukan jabatan"
                                                name="jabatan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">password</label>
                                            <input type="password" class="form-control" id="password" placeholder="masukkan password"
                                                name="password">
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
    // $(document).ready(function() {
    //         $('#customer_id').change(function() {
    //             var customer_id = $(this).val();
    //             $.ajax({
    //                 url: '{{ route("api.getUnloading") }}',
    //                 type: 'get',
    //                 data: {
    //                     customer_id: customer_id
    //                 },
    //                 dataType: 'json',
    //                 success: function(response) {
    //                     var len = response.length;
    //                     $("#unloading_id").empty();
    //                     $("#unloading_id").append("<option value=''>Pilih tanggal bongkar</option>");
    //                     for (var i = 0; i < len; i++) {
    //                         var id = response[i]['id'];
    //                         var tanggal_datang = response[i]['tanggal_datang'];
    //                         $("#unloading_id").append("<option value='" + id + "'>" + tanggal_datang +
    //                             "</option>");
    //                     }

    //                 }
    //             });

    //              $.ajax({
    //                 url:'{{route("api.getProses")}}',
    //                 type:'get',
    //                 data:{
    //                     customer_id:customer_id
    //                 },
    //                 dataType: 'json',
    //                 success:function(respone){
    //                     let option_processid = $('#proses_id');
    //                     let html = "<option value=''>Pilih grade | tipe</option>";
    //                     for(let x in respone){
    //                         html += "<option value='"+respone[x].id+"'>" + respone[x].grade + " | " + respone[x].tipe_produk +"</option>";
    //                     }
    //                     option_processid.html(html);
    //                 }
    //             });
    //         });
    //     });

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
    const table = new DataTable('user', "{{ route('api.users.index') }}", [
        { data: 'name' },
        { data: 'telepon' },
        { data: 'jabatan' },
        { data: 'email' },
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

                // const button_delete = $('<button>', {
                //     html: $('<i>', {
                //         class: 'fa fa-trash'
                //     }).prop('outerHTML'),
                //     class: 'btn btn-danger btn-delete',
                //     'data-data': id,
                //     title: `Hapus Data`,
                // })

                const button_group = $('<div>', {
                    class: 'btn-group btn-group-sm',
                    role: 'group',
                    html: [button_detail,button_edit]
                })
                return button_group.prop('outerHTML')
            }
        },
    ]);

    table.init();
    $("#user").on('click', ' .btn-detail', (e) => {
            const id = $(e.currentTarget).data("id"); // Mengambil nilai atribut data dengan menggunakan jQuery
            let url = "{{ route('api.users.show', ':id') }}".replace(':id', id);
             $.ajax({
                type: "get",
                url: url,
                success: function (data) {
                    $('#modal-detail').modal('show');
                    $('#show-detail').html('');
                    $('#customer').text(data.name)
                    let content =`
                        <div class="col-8 mt-2 mb-2">
                                <div class="example">
                                    <dl class="row">
                                        <dt class="col-sm-5">Nama</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.name}</span>
                                        </dd>
                                        <dt class="col-sm-5">email</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.email}</span>
                                        </dd>
                                        <dt class="col-sm-5">username</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.username}</span>
                                        </dd>
                                        <dt class="col-sm-5">role id</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.role_id}</span>
                                        </dd>
                                        <dt class="col-sm-5">jabatan</dt>
                                        <dd class="col-sm-7">
                                            <span id="">${data.jabatan}</span>
                                        </dd>
                                    </dl>
                                </div>
                        </div>
                    `;
                    $('#show-detail').html(content);
                }
            });
    })
    $("#user").on('click',' .btn-edit', (e) => {
        const id = $(e.currentTarget).data("id"); // Mengambil nilai atribut data dengan menggunakan jQuery
        let url = "{{ route('api.users.update',':id') }}".replace(':id', id);

        // ganti url
        $("form").attr('action', url);
        $('.method').html('@method("put")');
        $("form")[0].reset();
        $('#modal-form').modal('show');
        $('.modal-title').text('Edit Data');
    });
    // $("#pengiriman").on('click', ' .btn-delete', (e) => {
    //     const id = $(e.currentTarget).data("data");
    //     let url = "{{ route('api.pengiriman.destroy', ':id') }}".replace(':id', id);
    //     table.delete(url);
    // });
    $("#btn-tambah").on('click', (e) => {
        let url = "{{ route('api.users.store') }}";
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
        console.log(e);
        let type = $('#modal-form .modal-title').text();
        if (type == "Tambah Data") {
            table.create(data, url);
        } else {
            table.update(data, url);
        }
    });

</script>
@endsection
