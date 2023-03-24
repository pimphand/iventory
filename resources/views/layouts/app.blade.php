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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet">

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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
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

                create(data,url,errorFunction) {
                    // Mengirim data ke backend untuk melakukan create
                    // Setelah berhasil, melakukan refresh pada tabel
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: data,
                        success: () => {
                            $(`#${this.tableId}`).DataTable().ajax.reload();
                            $('#modal-form').modal('hide');
                            // menghapus class 'is-invalid' pada inputan
                            $('.is-invalid').removeClass('is-invalid');
                            // menghapus elemen <span> dengan class 'error'
                            $('.error').remove();
                            toast('Data berhasil di tambahkan','success','Tambah data')
                        },
                        error: (xhr, status, error) => {
                            toast('Telah terjadi kesalahan','error','Tambah data')
                            $('.is-invalid').removeClass('is-invalid');
                            // menghapus elemen <span> dengan class 'error'
                            $('.error').remove();
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                let escapedKey = key.replace(/\./g, '\\.');
                                let inputan = $(`input#${escapedKey}`);
                                inputan.addClass("is-invalid");
                                inputan.parent().append("<span class='error text-danger'>" + value[0] + "</span>");
                            });
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
                            // menghapus class 'is-invalid' pada inputan
                            $('.is-invalid').removeClass('is-invalid');
                            // menghapus elemen <span> dengan class 'error'
                            $('.error').remove();
                            toast('Data berhasil di perbarui','success','Update data')
                        },
                        error: (xhr, status, error) => {
                            toast('Telah terjadi kesalahan','error','Update data')
                        }
                    });
                }

                delete(url) {
                    // Mengirim data ke backend untuk melakukan delete
                    // Setelah berhasil, melakukan refresh pada tabel
                    Swal.fire({
                        title: 'Apa kamu yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: url,
                                method: 'DELETE',
                                success: () => {
                                    $(`#${this.tableId}`).DataTable().ajax.reload();
                                    Swal.fire(
                                        'Dihapus!',
                                        'Data Anda telah dihapus.',
                                        'success'
                                    )
                                },
                                error: (xhr, status, error) => {
                                    toast('Telah terjadi kesalahan','error','Hapus data')
                                }
                            });
                            
                        }
                    })
                    
                }
            }
            function toast(text,icon,note){
                $.toast({
                    text: text, // Text that is to be shown in the toast
                    heading: note, // Optional heading to be shown on the toast
                    icon: icon, // Type of toast icon
                    showHideTransition: 'fade', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    
                    textAlign: 'left',  // Text alignment i.e. left, right or center
                    loader: true,  // Whether to show loader or not. True by default
                    loaderBg: '#9EC600',  // Background color of the toast loader
                    beforeShow: function () {}, // will be triggered before the toast is shown
                    afterShown: function () {}, // will be triggered after the toat has been shown
                    beforeHide: function () {}, // will be triggered before the toast gets hidden
                    afterHidden: function () {}  // will be triggered after the toast has been hidden
                });
            }
        </script>
        @yield('js')
</body>

</html>