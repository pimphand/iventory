<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{ asset('admin') }}/images/brand/logo-white.png" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ asset('admin') }}/images/brand/icon-white.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset('admin') }}/images/brand/icon-dark.png" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ asset('admin') }}/images/brand/logo-dark.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3>MAIN</h3>
                </li>

                <li>
                    <a class="side-menu__item has-link" href="{{ route('customer') }}"><i
                            class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Customer</span></a>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="{{ route('unloading') }}"><i
                            class="side-menu__icon fe fe-package"></i><span class="side-menu__label">Bongkar
                            Muat</span></a>
                </li>
                {{-- <li>
                    <a class="side-menu__item has-link" href="{{ route('proses') }}"><i
                            class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label">Proses</span></a>
                </li> --}}
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label">Proses</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side9">
                                        <ul class="sidemenu-list">
                                            <li><a href="{{ route('produksi') }}" class="slide-item">Hasil Produksi</a></li>
                                            <li><a href="editprofile.html" class="slide-item">Sampingan</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="landing-page.html"><i
                            class="side-menu__icon fe fe-list"></i><span class="side-menu__label">Stok</span></a>
                </li>
                <li class="sub-category">
                    <h3>PENGIRIMAN</h3>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="{{ route('kendaraan') }}"><i
                            class="side-menu__icon fe fe-truck"></i><span class="side-menu__label">Kendaraan</span></a>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="{{route('pengiriman')}}"><i
                            class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Pengiriman</span></a>
                </li>
                <li class="sub-category">
                    <h3>USER ACCOUNT</h3>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="{{ route('users') }}"><i
                            class="side-menu__icon fe fe-user"></i><span class="side-menu__label">User</span></a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
