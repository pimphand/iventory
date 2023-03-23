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
                    <a class="side-menu__item has-link" href="{{ route('unloading') }}" ><i
                            class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Bongkar Muat</span></a>
                </li>
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
                                            <li><a href="profile.html" class="slide-item"> Produksi</a></li>
                                            <li><a href="editprofile.html" class="slide-item">Sampingan</a></li>
                                        </ul>
                                        <div class="menutabs-content mt-5 p-0">
                                            <div class="Annoucement_card">
                                                <div class="text-center">
                                                    <div>
                                                        <h5 class="title mt-0 mb-1 ms-2 font-weight-bold tx-12">
                                                            Go for Premium Account </h5>
                                                        <div class="bg-layer">
                                                            <img src="{{ asset('admin') }}/{{ asset('admin') }}/images/media/37.png"
                                                                alt="img" class="text-center mx-auto">
                                                        </div>
                                                        <p class="subtext mt-0 mb-0 ms-2 fs-13 text-center my-2">
                                                            $399.9 /Monthly</p>
                                                    </div>
                                                </div>
                                                <button class="btn btn-block btn-primary mt-4 fs-14">
                                                    Upgrade</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="side10">
                                        <h5 class="mt-3 fw-600 mb-4">Recent Chats</h5>
                                        <div class="main-chat-list tab-pane">
                                            <div class="media border-0 px-1 new border-top-0">
                                                <div class="main-img-user online">
                                                    <img alt="" src="{{ asset('admin') }}/images/users/5.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Raymart Santiago</span> <span>10 min</span>
                                                    </div>
                                                    <p> Hey! there I'm available </p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="main-img-user">
                                                    <img alt="" src="{{ asset('admin') }}/images/users/6.jpg">
                                                    <span>3</span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Ariana Monino</span> <span>30 min</span>
                                                    </div>
                                                    <p>Good Morning</p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="main-img-user online"><img alt=""
                                                        src="{{ asset('admin') }}/images/users/9.jpg"></div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Reynante Labares</span> <span>9.40 am</span>
                                                    </div>
                                                    <p> Nice to meet you </p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <span
                                                    class="avatar avatar-md brround bg-danger-transparent text-danger">J</span>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Joyce Chua</span> <span>11.20 am</span>
                                                    </div>
                                                    <p> Hi, How are you? </p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="main-img-user"><img alt=""
                                                        src="{{ asset('admin') }}/images/users/4.jpg"></div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Rolando Paloso</span> <span>1.38 pm</span>
                                                    </div>
                                                    <p> Hey! there I'm available </p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="main-img-user">
                                                    <div
                                                        class="avatar avatar-md brround bg-primary-transparent text-primary">
                                                        D</div><span>1</span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Dexter dela Cruz</span> <span>4.08 pm</span>
                                                    </div>
                                                    <p>Typing...</p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="main-img-user"><img alt=""
                                                        src="{{ asset('admin') }}/images/users/21.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Maricel Villalon</span> <span>8.09 pm</span>
                                                    </div>
                                                    <p> Hey! there I'm available </p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <span
                                                    class="avatar avatar-md brround bg-success-transparent text-success">M</span>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Maryjane Pechon</span> <span>1 day ago</span>
                                                    </div>
                                                    <p>I have some work</p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="main-img-user"><img alt=""
                                                        src="{{ asset('admin') }}/images/users/5.jpg"></div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Lovely Dela Cruz</span> <span>3 days
                                                            ago</span>
                                                    </div>
                                                    <p>I have some work</p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="avatar avatar-md brround bg-secondary-transparent">
                                                    <i class="fe fe-user text-secondary"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Daniel Padilla</span> <span>5 days ago</span>
                                                    </div>
                                                    <p>I have some work</p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="main-img-user"><img alt=""
                                                        src="{{ asset('admin') }}/images/users/3.jpg"></div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>John Pratts</span> <span>20/06/2021</span>
                                                    </div>
                                                    <p>I have some work</p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new">
                                                <div class="main-img-user"><img alt=""
                                                        src="{{ asset('admin') }}/images/users/7.jpg"></div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Socrates Itumay</span> <span>18/07/2021</span>
                                                    </div>
                                                    <p> Hey! there I'm available </p>
                                                </div>
                                            </div>
                                            <div class="media border-0 px-1 new border-bottom-0">
                                                <div class="main-img-user"><img alt=""
                                                        src="{{ asset('admin') }}/images/users/6.jpg"></div>
                                                <div class="media-body">
                                                    <div class="media-contact-name">
                                                        <span>Samuel Lerin</span> <span>29/07/2021</span>
                                                    </div>
                                                    <p> Hey! there I'm available </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="landing-page.html" ><i
                            class="side-menu__icon fe fe-list"></i><span class="side-menu__label">Stok</span></a>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="landing-page.html" ><i
                            class="side-menu__icon fe fe-truck"></i><span class="side-menu__label">Pengiriman</span></a>
                </li>
                <li class="sub-category">
                    <h3>USER ACCOUNT</h3>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="landing-page.html" ><i
                            class="side-menu__icon fe fe-users"></i><span class="side-menu__label">User</span></a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
