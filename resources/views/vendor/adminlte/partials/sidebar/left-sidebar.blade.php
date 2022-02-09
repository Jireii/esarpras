<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if (config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu" @if (config('adminlte.sidebar_nav_animation_speed') != 300)
                data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if (!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}

                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars"></i>
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                </li>



            </ul>


            <ul class="navbar-nav ml-auto">



                <li class="nav-item">


                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>


                    <div class="navbar-search-block">
                        <form class="form-inline" action="#" method="get">
                            <input type="hidden" name="_token" value="NjbFQ08F2fHRDRY0clFNp2wGIXhaiKnh8xS8Rm3o">

                            <div class="input-group">


                                <input class="form-control form-control-navbar" type="search" name="adminlteSearch"
                                    placeholder="search" aria-label="search">


                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>



                <li class="nav-item dropdown user-menu">


                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span>

                        </span>
                    </a>


                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">








                        <li class="user-footer">
                            <a class="btn btn-default btn-flat float-right  btn-block " href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off text-red"></i>
                                Log Out
                            </a>
                            <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST"
                                style="display: none;">
                                <input type="hidden" name="_token" value="NjbFQ08F2fHRDRY0clFNp2wGIXhaiKnh8xS8Rm3o">
                            </form>
                        </li>

                    </ul>

                </li>


            </ul>

        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">


            <a href="http://127.0.0.1:8000/home" class="brand-link ">


                <img src="https://eprakerin.smkn2-bjm.sch.id/vendor/adminlte/dist/img/smkn2.png" alt="e-Sarpras"
                    class="brand-image img-circle elevation-3" style="opacity:.8">


                <span class="brand-text font-weight-light ">
                    e-<b>Sarpas</b>
                </span>

            </a>


            <div class="sidebar">
                <nav class="pt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">

                        <li class="nav-item">

                            <a class="nav-link  " href="http://127.0.0.1:8000">

                                <i class="fas fa-fw fa-tachometer-alt "></i>

                                <p>
                                    Beranda

                                </p>

                            </a>

                        </li>

                        <li class="nav-header ">

                            MENU UTAMA

                        </li>

                        <li class="nav-item">

                            <a class="nav-link active " href="http://127.0.0.1:8000/sarpras">

                                <i class="fas fa-fw fa-box "></i>

                                <p>
                                    Sarpras

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link  " href="http://127.0.0.1:8000/buku">

                                <i class="fas fa-fw fa-book "></i>

                                <p>
                                    Buku

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link  " href="http://127.0.0.1:8000/ruangan">

                                <i class="fas fa-fw fa-home "></i>

                                <p>
                                    Ruangan

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link  " href="http://127.0.0.1:8000/pengguna">

                                <i class="fas fa-fw fa-user "></i>

                                <p>
                                    Pengguna

                                </p>

                            </a>

                        </li>

                        <li class="nav-header ">

                            PENGATURAN

                        </li>

                        <li class="nav-item">

                            <a class="nav-link  " href="http://127.0.0.1:8000/pemberitahuan">

                                <i class="fas fa-fw fa-comment "></i>

                                <p>
                                    Pemberitahuan

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link  " href="http://127.0.0.1:8000/pengaturanpdf">

                                <i class="fas fa-fw fa-cog "></i>

                                <p>
                                    Pengaturan PDF

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link  " href="http://127.0.0.1:8000/riwayatpengguna">

                                <i class="fas fa-fw fa-history "></i>
                                <p>
                                    Riwayat Pengguna
                                </p>

                            </a>

                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a class="nav-link" href="http://127.0.0.1:8000/logout"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-fw fa-sign-out-alt "></i>
                                    <p>Keluar</p>
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>

        </aside>
