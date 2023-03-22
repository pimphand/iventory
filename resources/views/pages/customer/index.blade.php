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
                                <table id="customer" class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            {{-- <th class="border-bottom-0">#</th> --}}
                                            <th class="border-bottom-0">nama</th>
                                            <th class="border-bottom-0">email</th>
                                            <th class="border-bottom-0">telepon</th>
                                            <th class="border-bottom-0">alamat</th>
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
@endsection

@section('js')
<script>
    const table = new DataTable('customer', "{{ route('api.customer.index') }}", [
        // { data: 'index' },
        { data: 'nama' },
        { data: 'email' },
        { data: 'telepon' },
        { data: 'alamat' },
    ]);
    
    table.init();
</script>
@endsection