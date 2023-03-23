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
                                <button class="modal-effect btn btn-success" id="btn-tambah"
                                    data-bs-effect="effect-scale" data-bs-toggle="modal">Tambah Data</button>
                            </div><br>
                            <div class="table-responsive">
                                <table id="customer" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            {{-- <th class="border-bottom-0">#</th> --}}
                                            <th class="">nama</th>
                                            <th class="">email</th>
                                            <th class="">telepon</th>
                                            <th class="">alamat</th>
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

    </div>
</div>
<div class="modal fade" id="modal-form">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"><strong>Add Data</strong></h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post">
                @csrf
                <div class="method"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="masukan nama"
                                    name="nama">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Masukan Email"
                                    name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telepon" placeholder="Masukkan Telepon"
                                    name="telepon">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" style="height: 137px;"
                                    placeholder="Masukkan Alamat" name="alamat"></textarea>
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
    const table = new DataTable('customer', "{{ route('api.customer.index') }}", [
        // { data: 'index' },
        { data: 'nama' },
        { data: 'email' },
        { data: 'telepon' },
        { data: 'alamat' },
        { data: 'id',
            render: (data, type, row, meta) => {
                const rowData = JSON.stringify(row);
                return '<button class="btn btn-sm btn-primary btn-edit" data-data='
                + rowData +'>Edit</button>';
            }
        },
    ]);
    
    table.init();

    $("#customer").on('click',' .btn-edit', (e) => {
        const data = $(e.currentTarget).data("data"); // Mengambil nilai atribut data dengan menggunakan jQuery
        let url = "{{ route('api.customer.update',':id') }}".replace(':id', data.id);

        // ganti url
        $("form").attr('action', url);
        $('.method').html('@method("put")');

        $("#nama").val(data.nama);
        $("#email").val(data.email);
        $("#telepon").val(data.telepon);
        $("#alamat").val(data.alamat);
        $('#modal-form').modal('show'); 
        $('.modal-title').text('Edit Data')
    });

    $("#btn-tambah").on('click', (e) => {
        let url = "{{ route('api.customer.store') }}";
        
        // ganti url
        $("form").attr('action', url);
        $('.method').html(' ');
        $("#nama").val("");
        $("#email").val("");
        $("#telepon").val("");
        $("#alamat").val("");
        $('#modal-form').modal('show'); 
        $('.modal-title').text('Tambah Data')
    });

    $('.simpan').click((e) => { 
        e.preventDefault();
        let data = $('form').serialize()
        let url = $("form").attr('action');

        let type = $('.modal-title').text();
        if (type == "Tambah Data") {
            table.create(data,url);
        } else {
            table.update(data,url);
        }
    });
</script>
@endsection