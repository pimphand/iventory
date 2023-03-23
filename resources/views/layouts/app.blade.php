<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Aplikasi Produksi dan Stok Rumah Potong Unggas (RPU)">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="Aplikasi Produksi dan Stok Rumah Potong Unggas (RPU)">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin') }}/images/brand/favicon.ico">

    <!-- TITLE -->
    {{-- <title>Rumah Potong Unggas – RPU</title> --}}
    <title>@yield('title')</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('admin') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('admin') }}/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('admin') }}/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('admin') }}/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/switcher/demo.css" rel="stylesheet">

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('admin') }}/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <x-header></x-header>
            {{-- @include('components.header') --}}

            <!--APP-SIDEBAR-->
            <x-sidebar></x-sidebar>
            {{-- @include('components.sidebar') --}}
            <!--/APP-SIDEBAR-->

            <!-- Page Content-->
            @yield('content')

            <!-- FOOTER -->
            <x-footer></x-footer>
            <!-- FOOTER CLOSED -->
        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{ asset('admin') }}/js/jquery.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('admin') }}/plugins/bootstrap/js/popper.min.js"></script>
        <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- INPUT MASK JS-->
        <script src="{{ asset('admin') }}/plugins/input-mask/jquery.mask.min.js"></script>

        <!-- TypeHead js -->
        <script src="{{ asset('admin') }}/plugins/bootstrap5-typehead/autocomplete.js"></script>
        <script src="{{ asset('admin') }}/js/typehead.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{ asset('admin') }}/plugins/p-scroll/perfect-scrollbar.js"></script>
        <script src="{{ asset('admin') }}/plugins/p-scroll/pscroll.js"></script>
        <script src="{{ asset('admin') }}/plugins/p-scroll/pscroll-1.js"></script>

        <!-- SIDE-MENU JS -->
        <script src="{{ asset('admin') }}/plugins/sidemenu/sidemenu.js"></script>

        @stack('js-vendor')

        <!-- SIDEBAR JS -->
        <script src="{{ asset('admin') }}/plugins/sidebar/sidebar.js"></script>

        <!-- Color Theme js -->
        <script src="{{ asset('admin') }}/js/themeColors.js"></script>

        <!-- Sticky js -->
        <script src="{{ asset('admin') }}/js/sticky.js"></script>

        <!-- CUSTOM JS -->
        <script src="{{ asset('admin') }}/js/custom.js"></script>

        <!-- Custom-switcher -->
        <script src="{{ asset('admin') }}/js/custom-swicher.js"></script>

        <!-- Switcher js -->
        <script src="{{ asset('admin') }}/switcher/js/switcher.js"></script>
        <script>
            class DataTable {
                constructor(tableId, url, columns) {
                    this.tableId = tableId;
                    this.url = url;
                    this.columns = columns;
                }

                init() {
                    let row = $(`#${this.tableId}`).DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: this.url,
                        columns: this.columns
                    });
                }

                create(data,url) {
                    // Mengirim data ke backend untuk melakukan create
                    // Setelah berhasil, melakukan refresh pada tabel
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: data,
                        success: () => {
                            $(`#${this.tableId}`).DataTable().ajax.reload();
                            $('#modal-form').modal('hide');
                        }
                    });
                }

                read(id) {
                    // Mengambil data dari backend berdasarkan ID
                    $.ajax({
                        url: '',
                        method: 'GET',
                        data: { id: id },
                        success: (data) => {
                            // Menampilkan data pada modal atau form
                            $('#modal').modal('show');
                            $('#name').val(data.name);
                            // ...
                        }
                    });
                }

                update(data,url) {
                    // Mengirim data ke backend untuk melakukan update
                    // Setelah berhasil, melakukan refresh pada tabel
                    $.ajax({
                        url: url,
                        method: 'PUT',
                        data: data,
                        success: () => {
                            $(`#${this.tableId}`).DataTable().ajax.reload();
                            $('#modal-form').modal('hide');
                        }
                    });
                }

                delete(id) {
                    // Mengirim data ke backend untuk melakukan delete
                    // Setelah berhasil, melakukan refresh pada tabel
                    $.ajax({
                        url: '',
                        method: 'DELETE',
                        data: { id: id },
                        success: () => {
                            $(`#${this.tableId}`).DataTable().ajax.reload();
                        }
                    });
                }
            }
        </script>
        @yield('js')
</body>

</html>