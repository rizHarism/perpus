<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="#" class="brand-link">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ asset('assets/image/logo/logo-kab.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-rounded " style="opacity: .8">
            </div>
            <div class="col-sm-4">
                <p class="brand-text font-weight-light">Dinas Perumahan dan Kawasan Permukiman </p>
            </div>
        </div>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 ">
            <div class="row">
                <div class="col-2 ml-0">
                    {{-- <div class="image"> --}}
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Lambang_Kota_Blitar.png"
                        class="img-rounded mt-1" alt="User Image">
                    {{-- </div> --}}
                </div>
                <div class="col-10 ">
                    <a class="d-block h7 font-italic mt-0">Dinas Perpustakaan</a>
                    <a class="d-block h7 font-italic mb-0">Kota Blitar</a>
                </div>
            </div>
            {{-- <div class="info">
            </div> --}}
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">Perpustakaan Binaan</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Data Input
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="{{ route('binaanKondisiUmum') }}" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Kondisi Umum</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="{{ route('binaanBahanPustaka') }}" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Bahan Pustaka</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="{{ route('binaanAdministrasi') }}" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Administrasi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="{{ route('binaanPemberdayaan') }}" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Pemberdayaan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="{{ route('binaanTenagapustaka') }}" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Tenaga Pustaka</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="{{ route('binaanSarana') }}" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Sarana/Prasarana</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="{{ route('binaanKoleksi') }}" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Koleksi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="{{ route('binaanLayanan') }}" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Layanan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Data Statistik
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Statistik Koleksi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Statistik Layanan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="far fa-file nav-icon ml-3"></i>
                                <p>Statistik Sirkulasi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- admin menu --}}
                <li class="nav-header">Administrator</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users-cog nav-icon "></i>
                        <p>
                            Administrator
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-5">
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-tag nav-icon ml-3"></i>
                                <p>Hak Akses</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users nav-icon ml-3"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">KDR With Love</li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
