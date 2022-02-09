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
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')

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
